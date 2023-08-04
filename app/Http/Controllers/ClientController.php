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
        $clients = Clients::whereHas('loan', function ($query) {
            $query->whereIn('status', ['ONGOING', 'PAID', 'PAST DUE']);
        })
            ->with('latest_loan')
            ->orderBy('account_name', 'asc')
            ->get();

        return DataTables::of($clients)
            ->addIndexColumn()
            ->make(true);
    }
}
