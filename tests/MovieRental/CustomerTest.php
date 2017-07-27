<?php

namespace MovieRental;

class CustomerTest extends \PHPUnit_Framework_TestCase {

    private $statement;


    public function testWithoutRentals()
    {
		$customer = new Customer('alex');

		$this->statement = $customer->statement();

		$this->then_it_should_have_name('alex');
		$this->then_it_should_owe_rental_record(0);
		$this->then_it_should_earn_frequent_renter_points(0);
	}

    public function then_it_should_have_name($name)
    {
        $statement = explode(PHP_EOL, $this->statement);
        $this->assertContains("Rental Record for $name", $statement[0]);
    }

    public function then_it_should_owe_rental_record($amount)
    {
        $statement = explode(PHP_EOL, $this->statement);
        $this->assertContains("Amount owed is $amount", $statement[1]);
	}

    public function then_it_should_earn_frequent_renter_points($amount)
    {
        $statement = explode(PHP_EOL, $this->statement);
        $this->assertContains("You earned $amount frequent renter points", $statement[2]);
    }
}