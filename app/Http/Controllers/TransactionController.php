<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Support\Facades\Response;
use Ramsey\Uuid\Uuid;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $transactions = Transaction::all();
        return Response::json($transactions, 200);

    }


    public function import(Transaction $transaction)
    {
        $path = storage_path() . "/json/transactions.json";
        $transactions = json_decode(file_get_contents($path), true);
        foreach ($transactions['transactions'] as $transaction) {
            $id = Uuid::uuid4()->toString();
            $transaction['id'] =  $id;
            Transaction::create($transaction);
        }
        return Response::json("transactions imported successfully", 200);
    }
}
