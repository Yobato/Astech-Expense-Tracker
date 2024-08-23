<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Expense;


class ExpenseController extends Controller
{
    //
    public function index(){
        return view('expense',[
            "expense" => Expense::all(),
            "title" => "Expense and Income" 
        ]);
    }
}
