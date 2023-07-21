<?php

namespace App\Http\Controllers;

use App\Models\DailyCollection;
use App\Models\Clients;
use App\Models\Loan;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Classes\KtDatatable;

class CollectionController extends Controller
{
    public function index()
    {
        return view('pages.collection');
    }

    public function getCollections(Request $request)
    {
        try {
            //code...
            $collection = DailyCollection::where('created_at', Carbon::today())
                ->get();
        } catch (\Exception $e) {
            //throw $th;
            return response()->json([
                'error' => $e->getMessage(),
                'status' => 'error',
            ], 500);
        }

        return response()->json([
            'data' => $collection,
        ]);
    }

    public function ktCollections(Request $request)
    {
        $clients = Clients::with(['loan' => function($query) {
                $query->where('status','active')->first();
            }]);

        if(request('columns')[4]['search']['value']) {
            $clients->where('status', request('columns')[4]['search']['value']);
        }

        $clients->orderBy('account_name', 'asc')->get();

        return DataTables::of($clients)
            ->addIndexColumn()
            ->make(true);
    }

    public function posting(Request $request)
    {
        try {
            //code...
            $clients = Loan::where('remaining_balance', '>', 0)->get();

            $daily_collection = [];
            foreach ($clients as $key => $client) {

            }

        } catch (\Exception $e) {
            //throw $th;
        }
    }
}
