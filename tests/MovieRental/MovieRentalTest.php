<?php

namespace MovieRental;

use MovieRental\Customer;
use MovieRental\Movie;
use MovieRental\Rental;

class MovieRentalTest extends \PHPUnit_Framework_TestCase {
	
	public function testHello(){

		$movie = new Movie("Transformer", Movie::REGULAR);

		$rental = new Rental($movie, 3);

		$customer = new Customer("jpartogi");
		$customer->addRental($rental);

		$statement = $customer->statement();

		$this->assertContains('Transformer', $statement);
		
	}

}