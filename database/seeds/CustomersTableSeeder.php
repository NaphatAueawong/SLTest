<?php

use Illuminate\Database\Seeder;
use App\Customer;

class CustomersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Customer::create([
            'username'          => 'naphat',
            'password'          => Hash::make('1234'),
            'type'              => 'instructor',
            'remember_token'    => str_random(10),
        ]);
    }
}
