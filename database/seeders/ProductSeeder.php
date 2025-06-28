<?php

namespace Database\Seeders;

use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ProductSeeder extends Seeder
{
    use CsvReadable;

    /**
     * Construct a new GameSeeder
     */
    public function __construct()
    {
        $this->path = "products.csv";
        $this->header_row = 0;
        $this->start_row = 1;
    }

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->readCsvData(function ($data) {
            unset($data['category_id']);
            Product::create($data);
        });
    }
}
