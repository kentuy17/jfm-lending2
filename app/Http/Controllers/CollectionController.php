<?php

namespace App\Http\Controllers;

use App\Models\DailyCollection;
use App\Models\Clients;
use App\Models\Loan;
use App\Models\Collector;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;

use App\Classes\KtDatatable;

class CollectionController extends Controller
{
    public function index()
    {
        $collectors = Collector::get();
        return view('pages.collection', compact('collectors'));
    }

    public function getCollections(Request $request)
    {
        $collection = DailyCollection::with('loans','clients');

        if(!request('columns')[0]['search']['value']) {
            $collection->where('collection_date', Carbon::today());
        } else {
            $collection->where('collection_date', request('columns')[0]['search']['value']);
        }

        if(request('columns')[3]['search']['value']) {
            $collection->whereHas('clients', function($query) {
                $query->where('status', request('columns')[3]['search']['value']);
            });
        }

        if(request('columns')[4]['search']['value']) {
            $collection->whereHas('clients', function($query) {
                $query->where('collector_id', request('columns')[4]['search']['value']);
            });
        }

        $collection->get();

        return DataTables::of($collection)
            ->addIndexColumn()
            ->addColumn('bal', function ($collection) {
                return number_format($collection->remaining_balance, 2);
            })
            ->addColumn('amount_to_pay', function ($collection) {
                return number_format($collection->daily_principal + $collection->daily_interest, 2);
            })

            ->addColumn('collector', function ($collection) {
                $koliktor = Collector::find($collection->collector_id);
                return $koliktor->name;
            })

            ->addColumn('client_status', function ($row) {
                $status = [
                    'INACTIVE' => ['title' => 'Inactive', 'state'=> 'danger'],
                    'PENDING' =>  ['title' => 'Pending', 'state'=> 'primary'],
                    'GOOD' => ['title' => 'Active', 'state'=> 'success'],
                    'PASSED DUE' => ['title' => 'Inactive', 'state'=> 'danger'],
                    'PAID' =>  ['title' => 'Pending', 'state'=> 'primary'],
                    'ONGOING' => ['title' => 'Active', 'state'=> 'success'],
                ];
                return '<span class="label label-' . $status[$row->clients->status]['state'] . ' label-dot mr-2"></span><span class="font-weight-bold text-' . $status[$row->clients->status]['state'] . '">' . $status[$row->clients->status]['title'] . '</span>';
            })
            ->rawColumns(['client_status'])
            ->with('collection_date', request('collection_date') ?? Carbon::today())
            ->toJson();
    }

    public function getExcelCollection(Request $request)
    {
        if($request->date === null) {
            $collect = DailyCollection::with('clients','loans')
                ->where('collection_date', Carbon::now()->format('Y-m-d'))
                ->get();
        }
        else {
            $date = explode('/', $request->date);
            $collect = DailyCollection::with('clients','loans')
                ->where('collection_date', Carbon::createFromDate($date[2], $date[0], $date[1], 'Asia/Singapore')->format('Y-m-d'))
                ->get();
        }

        return response()->json([
            'data' => $collect,
            'collection_date' => Carbon::today(),
            'request_date' => $request->date,
        ]);
    }

    public function ktCollections(Request $request)
    {
        $clients = Clients::with(['loan' => function($query) {
                $query->where('status','active')->first();
            }])
            ->with('collector');

        if(!request('columns')[1]['search']['value']) {
            $clients->where('created_at', Carbon::today());
        }

        if(request('columns')[4]['search']['value']) {
            $clients->where('status', request('columns')[4]['search']['value']);
        }

        if(request('order')[0]['column'] == 1) {
            $clients->orderBy('balance', request('order')[0]['dir']);
        }

        if(request('order')[0]['column'] == 4) {
            $clients->orderBy('status', request('order')[0]['dir']);
        }

        $clients->get();

        return DataTables::of($clients)
            ->addIndexColumn()
            ->addColumn('bal', function ($client) {
                return number_format($client->balance, 2);
            })
            ->addColumn('status', function ($row) {
                $status = [
                    'INACTIVE' => ['title' => 'Inactive', 'state'=> 'danger'],
                    'PENDING' =>  ['title' => 'Pending', 'state'=> 'primary'],
                    'GOOD' => ['title' => 'Active', 'state'=> 'success'],
                    'PAST DUE' => ['title' => 'Inactive', 'state'=> 'danger'],
                    'PAID' =>  ['title' => 'Pending', 'state'=> 'primary'],
                    'ONGOING' => ['title' => 'Active', 'state'=> 'success'],
                ];
                return '<span class="label label-' . $status[$row->status]['state'] . ' label-dot mr-2"></span><span class="font-weight-bold text-' . $status[$row->status]['state'] . '">' . $status[$row->status]['title'] . '</span>';
            })
            ->rawColumns(['status'])
            ->toJson();
    }

    public function posting(Request $request)
    {
        try {
            $date = $request->collection_date ?? Carbon::today();

            // Delete old posting data
            $old_collection = DailyCollection::where('collection_date', $date);
            if($old_collection->count() > 0) {
                $old_collection->delete();
            }

            $loans = Loan::where('remaining_balance', '>', 0)
                ->whereNot('status','PAID')->get();

            $daily_collection = [];
            foreach ($loans as $loan) {
                $daily_collection[] = [
                    'loan_id' => $loan->id,
                    'client_id' => $loan->client_id,
                    'interest_amount' => $loan->total_interest,
                    'daily_principal' => $loan->daily_payable - $loan->daily_interest,
                    'daily_interest' => $loan->daily_interest,
                    'daily_paid' => 0,
                    'status' => 'UNPAID',
                    'remaining_balance' => $loan->remaining_balance,
                    'collection_date' => $date,
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),
                ];
            }

            DailyCollection::insert($daily_collection);

        } catch (\Exception $e) {
            return response()->json(array('error' => $e->getMessage()), 500);
        }

        return response()->json(array(
            'success' => true,
            'message' => 'Data has been Posted!'
        ), 200);
    }

    public function updateCollectionItem(Request $request)
    {
        try {
            $item = DailyCollection::find($request->id);
            $item->daily_paid = $request->amount_paid;
            $item->status = 'PAID';
            $item->save();

            $total_paid = DailyCollection::where('loan_id', $item->loan_id)->sum('daily_paid');
            $loan = Loan::find($item->loan_id);
            $loan->remaining_balance = $loan->total_payable - $total_paid;
            $loan->save();

            $item->remaining_balance = $loan->remaining_balance;
            $item->save();
        }
        catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
            ], 500);
        }

        return response()->json(['success' => true], 200);
    }
}
