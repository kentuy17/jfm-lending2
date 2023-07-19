<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Clients;
use App\Models\Loan;
use DataTables;

class ClientController extends Controller
{
    public function index()
    {
        return view('pages.client-loan');
    }

    public function getLoans()
    {
        $clients = Clients::with(['loan' => function($query) {
                $query->where('status','active')->first();
            }])
            ->orderBy('account_name', 'asc')
            ->get();

        // $clients = Clients::with('loan')->get();

        return DataTables::of($clients)
            ->addIndexColumn()
            ->make(true);
    }
}
