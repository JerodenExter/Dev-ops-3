<?php

namespace Database\Seeders;

use App\Models\Supplier;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SupplierSeeder extends Seeder
{
    private $data = [
        [
            'name' => 'Write a love letter to Laravel',
            'address' => 'Main Street',
            'credit_balance' => '5'
        ],
        [
            'name' => 'Have a debate with a coding error',
            'address' => 'GoldenRoad 10',
            'credit_balance' => '50'
        ],
        [
            'name' => 'Conduct a Laravel Bake-Off',
            'address' => 'SesameStreet 5',
            'credit_balance' => '4'
        ],
        [
            'name' => 'Create a Migration for your sock drawer',
            'address' => 'Elmore 5',
            'credit_balance' => '9'
        ],
        [
            'name' => 'Build a Laravel Artisan shrine',
            'address' => 'GiveMePointStreet 5',
            'credit_balance' => '7'
        ],
        [
            'name' => 'Finish exam',
            'address' => 'RandomStreet 9',
            'credit_balance' => '45'
        ],
        [
            'name' => 'Random question',
            'address' => 'AppleTreeStreet 5',
            'credit_balance' => '20'
        ],
        [
            'name' => 'Rare code',
            'address' => 'OrangeJuiceStreet 7',
            'credit_balance' => '66'
        ],
        [
            'name' => 'Idk what im typing',
            'address' => 'HelpStreet 3',
            'credit_balance' => '77'

        ],
        [
            'name' => 'Do I get points for this',
            'address' => 'HeyStreet 6',
            'credit_balance' => '41'
        ]
    ];


    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        foreach ($this->data as $item) {
            Supplier::create($item);
        }
    }
}
