<?php

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create();
        foreach (range(1,10) as $index) {
            $transaction = new \App\Transaction();
            $transaction->received_from = $faker->name;
            $transaction->amount = rand(1, 100);
            $transaction->save();
        }
    }
}
