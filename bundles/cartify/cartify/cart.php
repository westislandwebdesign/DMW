<?php
/**
 * --------------------------------------------------------------------------
 * Cartify
 * --------------------------------------------------------------------------
 *
 * Cartify, a shopping cart bundle for use with the Laravel Framework.
 *
 * @package  Cartify
 * @version  2.1.1
 * @author   Bruno Gaspar <brunofgaspar1@gmail.com>
 * @link     https://github.com/bruno-g/cartify
 */

namespace Cartify;

/**
 * Libraries we can use.
 */
use Laravel\Config;
use Laravel\Session;

/**
 * Cartify Cart Exceptions.
 */
class CartException extends CartifyException {}
class CartInvalidDataException extends CartException {}
class CartRequiredIndexException extends CartException {}
class CartItemNotFoundException extends CartException {}
class CartInvalidItemRowIdException extends CartException {}
class CartInvalidItemQuantityException extends CartException {}
class CartInvalidItemPriceException extends CartException {}

/**
 * Cart class.
 */
class Cartify_Cart
{
	/**
	 * Regular expression to validate item ID's.
	 *
	 *  Allowed:
	 *		alpha-numeric
	 *		dashes
	 *		underscores
	 *		periods
	 *
	 * @access   protected
	 * @var      string
	 */
	protected $item_id_rules = '\.a-z0-9_-';

	/**
	 * Holds the cart name.
	 *
	 * @access   protected
	 * @var      string
	 */
	protected $cart_name = null;

	/**
	 * Shopping Cart contents.
	 *
	 * @access   protected
	 * @var      array
	 */
	protected $cart_contents = null;

	/**
	 * Shopping cart initializer.
	 *
	 * @access   public
	 * @return   void
	 */
	public function __construct($cart_name = null)
	{
		// Store the cart name.
		//
		$this->cart_name = (is_null($cart_name) ? Config::get('cartify::cart.cart_name') : $cart_name);

		// Grab the shopping cart array from the session.
		//
		array_set($this->cart_contents, $this->cart_name, Session::get($this->cart_name));

		// We don't have any cart session, set some base values.
		//
		if (is_null(array_get($this->cart_contents, $this->cart_name, null)))
		{
			array_set($this->cart_contents, $this->cart_name, array('cart_total' => 0, 'total_items' => 0));
		}
	}

	/**
	 * Returns information about an item.
	 *
	 * @access   public
	 * @param    string
	 * @return   array
	 * @throws   Exception
	 */
	public function item($rowid = null)
	{
		// Check if we have a valid rowid.
		//
		if (is_null($rowid))
		{
			throw new CartInvalidItemRowIdException;
		}

		// Check if this item exists.
		//
		if ( ! $item = array_get($this->cart_contents, $this->cart_name . '.' . $rowid))
		{
			throw new CartItemNotFoundException;
		}

		// Return all the item information.
		//
		return $item;
	}

	/**
	 * Inserts items into the cart.
	 *
	 * @access   public
	 * @param    array
	 * @return   mixed
	 * @throws   Exception
	 */
	public function insert($items = array())
	{
		// Check if we have data.
		//
		if ( ! is_array($items) or count($items) === 0)
		{
			throw new CartInvalidDataException;
		}

		// We only update the cart when we insert data into it.
		//
		$update_cart = false;

		// Single item?
		//
		if ( ! isset($items[0]))
		{
			// Check if the item was added to the cart.
			//
			if ($rowid = $this->_insert($items))
			{
				$update_cart = true;
			}
		}

		// Multiple items.
		//
		else
		{
			// Loop through the items.
			//
			foreach ($items as $item)
			{
				// Check if the item was added to the cart.
				//
				if ($this->_insert($item))
				{
					$update_cart = true;
				}
			}
		}

		// Update the cart if the insert was successful.
		//
		if ($update_cart === true)
		{
			// Update the cart.
			//
			$this->update_cart();

			// See what we want to return.
			//
			return (isset($rowid) ? $rowid : true);
		}

		// Something went wrong.
		//
		throw new CartException;
	}

	/**
	 * Updates an item quantity, or items quantities.
	 *
	 * @access   public
	 * @param    array
	 * @return   boolean
	 * @throws   Exception
	 */
	public function update($items = array())
	{
		// Check if we have data.
		//
		if ( ! is_array($items) or count($items) === 0)
		{
			throw new CartInvalidDataException;
		}

		// We only update the cart when we insert data into it.
		//
		$update_cart = false;

		// Single item.
		//
		if ( ! isset($items[0]))
		{
			// Check if the item was updated.
			//
			if ($this->_update($items) === true)
			{
				$update_cart = true;
			}
		}

		// Multiple items.
		//
		else
		{
			// Loop through the items.
			//
			foreach ($items as $item)
			{
				// Check if the item was updated.
				//
				if ($this->_update($item) === true)
				{
					$update_cart = true;
				}
			}
		}

		// Update the cart if the insert was successful.
		//
		if ($update_cart === true)
		{
			// Update the cart.
			//
			$this->update_cart();

			// We are done here.
			//
			return true;
		}

		// Something went wrong.
		//
		throw new CartException;
	}

	/**
	 * Removes an item from the cart.
	 *
	 * @access   public
	 * @param    integer
	 * @return   boolean
	 * @throws   Exception
	 */
	public function remove($rowid = null)
	{
		// Check if we have an id passed.
		//
		if (is_null($rowid))
		{
			throw new CartInvalidItemRowIdException;
		}

		// Try to remove the item.
		//
		if ($this->update(array('rowid' => $rowid, 'qty' => 0)))
		{
			// Success, item removed.
			//
			return true;
		}

		// Something went wrong.
		//
		throw new CartException;
	}

	/**
	 * Returns the cart total.
	 *
	 * @access   public
	 * @return   integer
	 */
	public function total()
	{
		return array_get($this->cart_contents, $this->cart_name . '.cart_total', 0);
	}

	/**
	 * Returns the total item count.
	 *
	 * @access   public
	 * @return   integer
	 */
	public function total_items()
	{
		return array_get($this->cart_contents, $this->cart_name . '.total_items', 0);
	}

	/**
	 * Returns the cart contents.
	 *
	 * @access   public
	 * @return   array
	 */
	public function contents()
	{
		// Get the cart contents.
		//
		$cart = array_get($this->cart_contents, $this->cart_name);

		// Remove these so they don't create a problem when showing the cart table.
		//
		array_forget($cart, 'total_items');
		array_forget($cart, 'cart_total');

		// Return the cart contents.
		//
		return $cart;
	}

	/**
	 * Checks if an item has options.
	 *
	 * It returns 'true' if the rowid passed to this function correlates to an item
	 * that has options associated with it, otherwise returns 'false'.
	 *
	 * @access   public
	 * @param    integer
	 * @return   boolean
	 */
	public function has_options($rowid = null)
	{
		// Check if this item have options.
		//
		return (array_get($this->cart_contents, $this->cart_name . '.' . $rowid . '.options') ? true : false);
	}

	/**
	 * Returns an array of options, for a particular item row ID.
	 *
	 * @access   public
	 * @param    integer
	 * @return   array
	 */
	public function item_options($rowid = null)
	{
		// Return this item options.
		//
		return array_get($this->cart_contents, $this->cart_name . '.' . $rowid . '.options', array());
	}

	/**
	 * Insert an item into the cart.
	 *
	 * @access   protected
	 * @param    array
	 * @return   string
	 * @throws   Exception
	 */
	protected function _insert($item = array())
	{
		// Check if we have data.
		//
		if ( ! is_array($item) or count($item) == 0)
		{
			throw new CartInvalidDataException;
		}

		// Required indexes.
		//
		$required_indexes = array('id', 'qty', 'price', 'name');

		// Loop through the required indexes.
		//
		foreach ($required_indexes as $index)
		{
			// Make sure the array contains this index.
			//
			if ( ! isset($item[ $index ]))
			{
				throw new CartRequiredIndexException('Required index [' . $index . '] is missing.');
			}
		}

		// Make sure the quantity is a number and remove any leading zeros.
		//
		$item['qty'] = (float) $item['qty'];

		// If the quantity is zero or blank there's nothing for us to do.
		//
		if ( ! is_numeric($item['qty']) or $item['qty'] == 0)
		{
			throw new CartInvalidItemQuantityException;
		}

		// Validate the item id.
		//
		if ( ! preg_match('/^[' . $this->item_id_rules . ']+$/i', $item['id']))
		{
			throw new CartInvalidItemRowIdException;
		}

		// Prepare the price.
		// Remove leading zeros and anything that isn't a number or decimal point.
		//
		$item['price'] = (float) $item['price'];

		// Is the price a valid number?
		//
		if ( ! is_numeric($item['price']))
		{
			throw new CartInvalidItemPriceException;
		}

		// Create a unique identifier.
		//
		if (isset($item['options']) and count($item['options']) > 0)
		{
			$rowid = md5($item['id'] . implode('', $item['options']));
		}
		else
		{
			$rowid = md5($item['id']);
		}

		// Make sure we have the correct data, and incremente the quantity.
		//
		$item['rowid'] = $rowid;
		$item['qty']  += (int) array_get($this->cart_contents, $this->cart_name . '.' . $rowid . '.qty', 0);

		// Store the item in the shopping cart.
		//
		array_set($this->cart_contents, $this->cart_name . '.' . $rowid, $item);

		// Item added with success.
		//
		return $rowid;
	}

	/**
	 * Updates the cart items.
	 *
	 * @access   protected
	 * @param    array
	 * @return   boolean
	 * @throws   Exception
	 */
	protected function _update($item = array())
	{
		// Item row id.
		//
		$rowid = array_get($item, 'rowid', null);

		// Make sure the row id is passed.
		//
		if (is_null($rowid))
		{
			throw new CartInvalidItemRowIdException;
		}

		// Check if the item exists in the cart.
		//
		if (is_null(array_get($this->cart_contents, $this->cart_name . '.' . $rowid, null)))
		{
			throw new CartItemNotFoundException;
		}

		// Prepare the quantity.
		//
		$qty = (float) array_get($item, 'qty');

		// Unset the qty and the rowid.
		//
		array_forget($item, 'rowid');
		array_forget($item, 'qty');

		// Is the quantity a number ?
		//
		if ( ! is_numeric($qty))
		{
			throw new CartInvalidItemQuantityException;
		}

		// Check if we have more data, like options or custom data.
		//
		if ( ! empty($item))
		{
			#$item['rowid'] = $rowid;
			#$this->cart_contents[ $this->cart_name ][ $rowid ] = $item;
			// Loop through the item data.
			//
			foreach ($item as $key => $val)
			{
				// Update the item data.
				//
				array_set($this->cart_contents, $this->cart_name . '.' . $rowid . '.' . $key, $val);
			}
		}

		// If the new quantaty is the same the already in the cart, there is nothing more to update.
		//
		if (array_get($this->cart_contents, $this->cart_name . '.' . $rowid . '.qty') == $qty)
		{
			return true;
		}

		// If the quantity is zero or less, we will be removing the item from the cart.
		//
		if ($qty <= 0)
		{
			// Remove the item from the cart.
			//
			array_forget($this->cart_contents, $this->cart_name . '.' . $rowid);
		}

		// Quantity is greater than zero, let's update the item cart.
		//
		else
		{
			// Update the item quantity.
			//
			array_set($this->cart_contents, $this->cart_name . '.' . $rowid . '.qty', $qty);
		}

		// Cart updated with success.
		//
		return true;
	}

	/**
	 * Updates the cart session.
	 *
	 * @access   protected
	 * @return   boolean
	 */
	protected function update_cart()
	{
		//
		//
		array_set($this->cart_contents, $this->cart_name . '.total_items', 0);
		array_set($this->cart_contents, $this->cart_name . '.cart_total', 0);

		// Loop through the cart items.
		//
		foreach (array_get($this->cart_contents, $this->cart_name) as $rowid => $item)
		{
			// Make sure the array contains the proper indexes.
			//
			if ( ! is_array($item) or ! isset($item['price']) or ! isset($item['qty']))
			{
				continue;
			}

			// Calculations...
			//
			$this->cart_contents[ $this->cart_name ]['cart_total'] += ($item['price'] * $item['qty']);
			$this->cart_contents[ $this->cart_name ]['total_items'] += $item['qty'];

			// Calculate the item subtotal.
			//
			$subtotal = (array_get($this->cart_contents, $this->cart_name . '.' . $rowid . '.price') * array_get($this->cart_contents, $this->cart_name . '.' . $rowid . '.qty'));

			// Set the subtotal of this item.
			//
			array_set($this->cart_contents, $this->cart_name . '.' . $rowid . '.subtotal', $subtotal);
		}

		// Is our cart empty?
		//
		if (count(array_get($this->cart_contents, $this->cart_name)) <= 2)
		{
			// If so we delete it from the session.
			//
			$this->destroy();

			// Nothing more to do here...
			//
			return false;
		}

		// Update the cart session data.
		//
		Session::put($this->cart_name, array_get($this->cart_contents, $this->cart_name));

		// Success.
		//
		return true;
	}

	/**
	 * Empties the cart, and removes the session.
	 *
	 * @access   public
	 * @return   void
	 */
	public function destroy()
	{
		// Remove all the data from the cart and set some base values
		//
		array_set($this->cart_contents, $this->cart_name, array('cart_total' => 0, 'total_items' => 0));

		// Remove the session.
		//
		Session::forget($this->cart_name);
	}
}
