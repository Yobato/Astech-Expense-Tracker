<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Expense;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\QueryException;


class ExpenseController extends Controller
{
    //
    public function index(){
        $incomes = DB::table('expense')
            ->where('type', 'income')
            ->select('category', DB::raw('SUM(amount) as total'))
            ->groupBy('category')
            ->get();

        $expenses = DB::table('expense')
            ->where('type', 'expense')
            ->select('category', DB::raw('SUM(amount) as total'))
            ->groupBy('category')
            ->get();

        $totalIncomesChart = DB::table('expense')
            ->where('type', 'income')
            ->sum('amount');

        $totalExpensesChart = DB::table('expense')
            ->where('type', 'expense')
            ->select('amount', DB::raw('SUM(amount) as total'))
            ->sum('amount');

        $initialAmount = 0;

        // Jumlah uang yang tersisa
        if($totalIncomesChart == 0 && $totalExpensesChart >0){
            $remainingAmount = - $totalExpensesChart;
        } else if ($totalIncomesChart >0){
            $remainingAmount = $initialAmount + $totalIncomesChart - $totalExpensesChart;
        } else {
            $remainingAmount = $initialAmount;
        }

        return view('expense',[
            "expense" => Expense::all(),
            "title" => "Expense and Income",
            'incomes' => $incomes,
            'expenses' => $expenses,
            'totalIncomesChart' => $totalIncomesChart,
            'totalExpensesChart' => $totalExpensesChart,
            'remainingAmount' => $remainingAmount
        ]);
    }

    public function storeExpense(Request $request)
    {
        // Pesan kustom untuk validasi
        $messages = [
            'required' => "Harus diisi",
            'numeric' => "Harus berupa angka",
            'date' => "Harus berupa tanggal yang valid",
        ];

        // Aturan validasi
        $validatedData = $request->validate([
            'type' => 'required',
            'category' => 'required',
            'amount' => 'required|numeric',
            'date' => 'required|date',
        ], $messages);
        
        Expense::insert([
            "type" => $request->type,
            "category" => $request->category,
            "amount" => $request->amount,
            "date" => $request->date,

        ]);
        return redirect()->intended(route('expense'))->with("success", "Berhasil menambahkan Data");
    }

    public function deleteExpense($id)
    {
        
            DB::beginTransaction();

            $expense = Expense::find($id);

            $expense->delete();

            DB::commit();

            return redirect()->intended(route('expense'))->with("success", "Berhasil menghapus Data");
    }
}
