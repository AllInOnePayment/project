<?php

namespace App\Transaction;

interface PaymentGatewayContract
{
	public function withdraw();
	public function deposite();
}