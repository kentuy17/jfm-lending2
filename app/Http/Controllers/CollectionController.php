<?php

namespace App\Http\Controllers;

use App\Models\DailyCollection;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

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
}
