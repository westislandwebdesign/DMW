<?php

class DMW_Controller extends Base_Controller {

    public $restful = true;

	public function get_index()	{

        return View::make('dmw.index')
            ->with('title','Dalton Musicworks - Home')
            ->with('navbar_itemName', ''); // Home page does not have a navbar item
	}

    public function get_amps()
    {
        return View::make('dmw.amps')
            ->with('title','Dalton Musicworks - Amps')
            ->with('navbar_itemName', 'top_navbar_amps');
    }

    public function get_effects()
    {
        return View::make('dmw.effects')
            ->with('title','Dalton Musicworks - Effects')
            ->with('navbar_itemName', 'top_navbar_effects');
    }

    public function get_videos() {

        return View::make('dmw.videos')
            ->with('title','Dalton Musicworks - Videos')
            ->with('navbar_itemName', 'top_navbar_videos');
    }

    public function get_faq()
    {
        return View::make('dmw.faq')
            ->with('title','Dalton Musicworks - FAQ')
            ->with('navbar_itemName', 'top_navbar_faq');
    }

    public function get_how_to_buy()
    {
        return View::make('dmw.howtobuy')
            ->with('title','Dalton Musicworks - How to Buy')
            ->with('navbar_itemName', 'top_navbar_howtobuy');
    }

    public function get_about_philosophy()
    {
        return View::make('dmw.about_philosophy')
            ->with('title','Dalton Musicworks - About our Philosophy')
            ->with('navbar_itemName', 'top_navbar_about');
    }

    public function get_about_people()
    {
        return View::make('dmw.about_people')
            ->with('title','Dalton Musicworks - About our People')
            ->with('navbar_itemName', 'top_navbar_about');
    }

    public function get_contact() {

        return View::make('dmw.contact')
            ->with('title','Dalton Musicworks - Contact')
            ->with('navbar_itemName', 'top_navbar_contact');
    }

    public function post_contact() {
        return 'Contact posted';
    }

    public function get_cart() {

        $cart_contents = Cartify::cart()->contents();

        return View::make('dmw.cart')
            ->with('title','Dalton Musicworks - Your Cart')
            ->with('cart_contents', $cart_contents);

    }

    public function post_cart() {

        // If we are updating the items information.
        //
        if (Input::get('update'))
        {
            try
            {
                // Get the items to be updated.
                //
                $items = array();
                foreach(Input::get('items') as $rowid => $qty)
                {
                    $items[] = array(
                        'rowid' => $rowid,
                        'qty'   => $qty
                    );
                }

                // Update the cart contents.
                //
                Cartify::cart()->update($items);
            }

                // Is the Item Row ID valid?
                //
            catch (Cartify\CartInvalidItemRowIdException $e)
            {
                return Redirect::to('cart')->with('error', 'Invalid Item Row ID!');
            }

                // Does this item exists on the shopping cart?
                //
            catch (Cartify\CartItemNotFoundException $e)
            {
                return Redirect::to('cart')->with('error', 'Item was not found in your shopping cart!');
            }

                // Is the item quantity valid?
                //
            catch (Cartify\CartInvalidItemQuantityException $e)
            {
                return Redirect::to('cart')->with('error', 'Invalid item quantity!');
            }

            return Redirect::to('cart')->with('success', 'Your shopping cart was updated.');
        }

        // If we are emptying the cart.
        //
        elseif (Input::get('empty'))
        {
            // Let's clear the shopping cart!
            //
            Cartify::cart()->destroy();

            return Redirect::to('cart')->with('success', 'Your shopping cart was cleared!');
        }
    }

    public function get_cart_remove($item_id = null) {

        try
        {
            // Remove the item from the cart.
            //
            Cartify::cart()->remove($item_id);
        }

            // Is the Item Row ID valid?
            //
        catch (Cartify\CartInvalidItemRowIdException $e)
        {
            return Redirect::to('cart')->with('error', 'Invalid Item Row ID!');
        }

            // Does this item exists on the shopping cart?
            //
        catch (Cartify\CartItemNotFoundException $e)
        {
            return Redirect::to('cart')->with('error', 'Item was not found in your shopping cart!');
        }

            // Other error.
            //
        catch (Cartify\CartException $e)
        {
            return Redirect::to('cart')->with('error', 'An unexpected error occurred!');
        }

        return Redirect::to('cart')->with('success', 'The item was removed from the shopping cart.');
    }

    public function get_checkout() {

        return View::make('dmw.checkout')
            ->with('title','Dalton Musicworks - Checkout');
    }

}