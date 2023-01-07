<?php

namespace Pattern\Invoice;

use Pattern\Invoice\InvoiceStrategy;
use Pattern\Order\Order;

class PDFInvoice implements InvoiceStrategy
{
	public function generate(Order $order)
	{
		echo "GENERATE A PDF INVOICE\n";
		echo "Customer: {$order->getName()} <{$order->getEmail()}>\n";
		echo "-----------------ORDER ITEMS------------------\n";
		foreach ($order->getItems() as $itemData)
		{
			$item = $itemData['item'];
			$quantity = $itemData['quantity'];

			echo $item->getName() . "\t" . $quantity . "\t" . $item->getPrice() . "\t=\t" . ($quantity * $item->getPrice()) . "\n";
		}
		echo "\t\tTotal\t=\t" . $order->getTotal() . "\n";
	}
}