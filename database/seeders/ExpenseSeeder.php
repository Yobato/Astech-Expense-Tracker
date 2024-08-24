<?php

namespace Database\Seeders;
use App\Models\Expense;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;

class ExpenseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $expense = [
            [
                'type' => 'income',
                'category' => 'Business',
                'amount' => '200000',
                'date'=>Carbon::parse('2024-08-24')
            ],
            [
                'type' => 'expense',
                'category' => 'Bills',
                'amount' => '370000',
                'date'=>Carbon::parse('2024-08-24')
            ],
        ];

        foreach($expense as $expen){
            Expense::create($expen);
        }
    }
}
