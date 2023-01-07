<?php

namespace Pattern;

use Pattern\Cart\Item;
use Pattern\Cart\ShoppingCart;
use Pattern\Order\Order;
use Pattern\Invoice\TextInvoice;
use Pattern\Invoice\PDFInvoice;
use Pattern\Customer\Customer;
use Pattern\Payments\CashOnDelivery;
use Pattern\Payments\CreditCardPayment;
use Pattern\Payments\PaypalPayment;

class Application
{
    public static function run()
    {
        $Glorious = new Item('Glorious Model O', 'Glorious Wireless Mouse' , 4000);
        $Logitech = new Item('Logitech G Pro', 'Logitech Wireless 50g Mouse', 2000);

        $cart = new ShoppingCart();
        $cart->addItem($Glorious, 2);
        $cart->addItem($Logitech, 5);

        $customer = new Customer('Kane Castillano', 'Xevera Mabalacat City, Pampanga', 'castillano.kaneerryl@auf.edu.ph');
        
        $order = new Order($customer, $cart);

        $text_invoice = new TextInvoice();
        $order->setInvoiceGenerator($text_invoice);
        $text_invoice->generate($order);

        $cash_on_delivery = new CashOnDelivery($customer);
        $order->setPaymentMethod($cash_on_delivery);
        $order->payInvoice();
        
    }
}

