<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Unit;
use App\Models\Product;
use App\Models\Customer;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */

    public function run()
    {
        //for units
        Unit::create(['unit_name' => 'Kg', 'formal_name' => 'Kilogram']);
        Unit::create(['unit_name' => 'm', 'formal_name' => 'meter']);
        Unit::create(['unit_name' => 'ft', 'formal_name' => 'feet']);
        Unit::create(['unit_name' => 'pics', 'formal_name' => 'pieces']);

        //for products
        Product::create(['product_name' => 'Keyboard', 'unit_id' => '4']);
        Product::create(['product_name' => 'LAN Cable', 'unit_id' => '2']);
        Product::create(['product_name' => 'Mouse', 'unit_id' => '4']);
        Product::create(['product_name' => 'Monitor', 'unit_id' => '4']);
        Product::create(['product_name' => 'Hard disk', 'unit_id' => '4']);
        Product::create(['product_name' => 'RAM', 'unit_id' => '4']);

        //for customers
        Customer::create(['customer_name' => 'Rahul Singh', 'mobile' => '431234123', 'address' => 'Barrackpore']);
        Customer::create(['customer_name' => 'Sanjay Dutta', 'mobile' => '342234123', 'address' => 'Naihati']);
        Customer::create(['customer_name' => 'Nikhil Kumar', 'mobile' => '789084123', 'address' => 'Dum dum']);
        Customer::create(['customer_name' => 'Sagnik Ghosh', 'mobile' => '431235435', 'address' => 'Sodpur']);

        // \App\Models\User::factory(10)->create();
    }
}
