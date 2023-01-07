<?php

namespace Pattern\Invoice;

use Pattern\Order\Order;

interface InvoiceStrategy
{
	public function generate(Order $order);
}