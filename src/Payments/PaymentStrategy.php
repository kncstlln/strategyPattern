<?php

namespace Pattern\Payments;

interface PaymentStrategy
{
	public function pay($amount);
}