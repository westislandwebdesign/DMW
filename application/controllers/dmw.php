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
            ->with('title','Dalton Musicworks - About Our Philosophy')
            ->with('navbar_itemName', 'top_navbar_about');
    }

    public function get_about_people()
    {
        return View::make('dmw.about_people')
            ->with('title','Dalton Musicworks - About Our People')
            ->with('navbar_itemName', 'top_navbar_about');
    }

    public function get_our_brands()
    {
        return View::make('dmw.our_brands')
            ->with('title','Dalton Musicworks - About Our Brands')
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

        $cart_contents = Cartify::cart()->contents();

        return View::make('dmw.checkout')
            ->with('title','Dalton Musicworks - Checkout')
            ->with('cart_contents', $cart_contents);
    }

    public function post_checkout() {

        // first check the hidden captcha
        // If there IS a value, that means a robot found it and filled it in.
        // A normal user would not be able to fill it in since it is hidden on
        // the page.
        $hidden_captcha = Input::get('hiddenCaptcha');
        if ($hidden_captcha !== '') {
            return Redirect::to('checkout')
                ->with('error', 'Error sending message.')
                ->with('title','Dalton Musicworks - Error: Message Not Sent');
        }

        try {

            $name = e(Input::get('name'));
            $email = e(Input::get('email'));
            $phone = e(Input::get('phone'));
            $message = e(Input::get('message'));

            if ( (!is_null($name) && !empty($name)) &&
                 (!is_null($email) && !empty($email)) &&
                 (!is_null($message) && !empty($message))) {

                    // validate the email address
                    // regex to identify illegal characters in email address
                    $checkEmail = '/^[^@]+@[^\s\r\n\'";,@%]+$/';

                    // reject the email address if it deosn't match
                    if (!preg_match($checkEmail, $email)) {
                        return Redirect::to('checkout')
                            ->with('error', 'Invalid email.')
                            ->with('title','Dalton Musicworks - Checkout');
                    }

                    $order = "Order for:\r\n$name\r\n$email\r\n$phone\r\n\r\n";
                    $order .= $this->format_cart_content_for_email();
                    $order .= "\r\n" . $message;

                    $email_to = Config::get('dmw.order_request_email');
                    $email_name = Config::get('order_request_email_friendly');

                    Message::to($email_to, $email_name)
                        ->cc('tester@westislandwebdesign.com')
                        //>bcc(array('evenmore@address.com' => 'Another name', 'onelast@address.com'))
                        ->from($email)
                        ->subject('DMW Order')
                        ->body($order)
                        ->send();

//                    Message::send(function($message) use ($order, $email_to, $email_name, $email)
//                    {
//                        Log::write('$email_to: ', $email_to);
//                        $message->to(array($email_to, $email_name));
//                        //$message->cc('tester@westislandwebdesign.com');
//                        //$messages->bcc(array('evenmore@address.com' => 'Another name', 'onelast@address.com'));
//
//                        $message->from($email);
//                        $message->subject('DMW Order');
//                        $message->body($order);
//                    });
//                    if(Message::was_sent())
//                    {
//                        // clear the cart
//                        Cartify::cart()->destroy();
//
//                        return Redirect::to('checkout')
//                            ->with('success', 'Your order has been sent.')
//                            ->with('title','Dalton Musicworks - Order Sent');
//                    }
//                    // You can even check if a specific email address received the message.
//                    if(Message::was_sent('tester@westislandwebdesign.com'))
//                    {
//                        echo 'tester@westislandwebdesign.com';
//                    }
            }
            else {
                return Redirect::to('checkout')
                    ->with('error', 'Please fill in the required fields.')
                    ->with('title','Dalton Musicworks - Checkout')
                    ->with_input();
            }

        }
        catch (Exception $e) {
            return Redirect::to_route('error')->with('error', $e->getMessage());
        }

        // clear the cart
        Cartify::cart()->destroy();

        return Redirect::to('checkout')
                ->with('success', 'Your order has been sent.')
                ->with('title','Dalton Musicworks - Order Sent');
    }

    private function format_cart_content_for_email() {

        $order = "--------------------------------------------\r\n" . "Requested products:\r\n";

        $cart_contents = Cartify::cart()->contents();

        foreach ($cart_contents as $item) {
            $order .= "*********\r\n" .
                "Product ID: " . $item['id'] . "\r\n" .
                "Product Name: " . $item['name'] . "\r\n" .
                "Product Quantity: " . $item['qty'] . "\r\n" .
                "Product Price: $" . $item['price'] . "\r\n";
        }

        $order .= "-------------------------\r\n" .
                  "-------------------------\r\n" .
                  "Number of items: " . Cartify::cart()->total_items() . "\r\n" .
                  "Total: " . Cartify::cart()->total() . "\r\n";

        $order .= "--------------------------------------------\r\n";

        // limit line length to 70 characters
        $order = wordwrap($order, 70);

        return $order;
    }
}


