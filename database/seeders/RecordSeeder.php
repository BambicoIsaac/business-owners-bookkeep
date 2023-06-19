<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Record;
use Carbon\Carbon;

class RecordSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-05-01')->format('F d Y'),
            'date' => Carbon::parse('2023-05-01'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-05-02')->format('F d Y'),
            'date' => Carbon::parse('2023-05-02'),
            'amount' => 4000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-05-03')->format('F d Y'),
            'date' => Carbon::parse('2023-05-03'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-05-04')->format('F d Y'),
            'date' => Carbon::parse('2023-05-04'),
            'amount' => 4000
        ]);
        
        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-05-05')->format('F d Y'),
            'date' => Carbon::parse('2023-05-05'),
            'amount' => 9000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-06-01')->format('F d Y'),
            'date' => Carbon::parse('2023-06-01'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-06-02')->format('F d Y'),
            'date' => Carbon::parse('2023-06-02'),
            'amount' => 9000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-06-05')->format('F d Y'),
            'date' => Carbon::parse('2023-06-05'),
            'amount' => 3000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-06-06')->format('F d Y'),
            'date' => Carbon::parse('2023-06-06'),
            'amount' => 4000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-06-07')->format('F d Y'),
            'date' => Carbon::parse('2023-06-07'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Sales',
            'description' => 'Sales on '.Carbon::parse('2023-06-08')->format('F d Y'),
            'date' => Carbon::parse('2023-06-08'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-01'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-02'),
            'amount' => 7000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-03'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-04'),
            'amount' => 9000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-05'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-06'),
            'amount' => 7000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-07'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-08'),
            'amount' => 9000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-09'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-10'),
            'amount' => 7000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-11'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-12'),
            'amount' => 9000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-01'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-02'),
            'amount' => 7000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-03'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-04'),
            'amount' => 9000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-05'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-06'),
            'amount' => 7000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-07'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-08'),
            'amount' => 9000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-09'),
            'amount' => 5000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-10'),
            'amount' => 7000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Water Bill',
            'date' => Carbon::parse('2023-06-11'),
            'amount' => 6000
        ]);

        Record::create([
            'category' => 'Expenses',
            'description' => 'Electric Bill',
            'date' => Carbon::parse('2023-06-12'),
            'amount' => 9000
        ]);
    }
}
