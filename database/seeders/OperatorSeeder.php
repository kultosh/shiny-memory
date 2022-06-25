<?php

namespace Database\Seeders;

use App\Models\Operator;
use Illuminate\Database\Seeder;

class OperatorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $operators = [
            [
                'type' => '+',
                'name' => 'Add (+)',
                'status' => 1
            ],
            [
                'type' => '-',
                'name' => 'Subtract (-)',
                'status' => 1
            ],
            [
                'type' => '*',
                'name' => 'Multiply (*)',
                'status' => 1
            ],
            [
                'type' => '/',
                'name' => 'Divide (/)',
                'status' => 1
            ],
        ];

        foreach($operators as $operator)
        {
            Operator::create($operator);
        }
    }
}
