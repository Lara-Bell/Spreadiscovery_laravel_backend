<?php

namespace App\Http\Controllers\Exchange;

use App\Bitflyer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Bitflyer as BitflyerResources;

class BitflyerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // 600 => 5h * 60m * 2/m
        $bitflyers = Bitflyer::limit(600)->latest()->get();
        return BitflyerResources::collection($bitflyers);
        // $bitflyer = DB::table('bitflyers')->latest()->first();
        // return response()->json([
        //     'name' => 'BitFlyer',
        //     'symbol' => $bitflyer->symbol,
        //     'datetime'=> $bitflyer->datetime,
        //     'bid'=> $bitflyer->bid,
        //     'ask'=> $bitflyer->ask,
        //     'baseVolume'=> $bitflyer->baseVolume,
        //     ], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    // public function create()
    // {
    //     //
    // }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'symbol' => 'required',
            'datetime' => 'required',
            'bid' => 'required',
            'ask' => 'required',
            'last' => 'required',
            'baseVolume' => 'required',
        ]);


        $bitflyer = Bitflyer::create($request->all());

        return response()->json($bitflyer, 201);


        // $bitflyer = new Bitflyer();
        // $bitflyer->symbol = $request->symbol;
        // $bitflyer->timestamp = $request->timestamp;

        // $date = date_create($request->datetime);
        // $bitflyer->datetime = date_format($date , 'Y-m-d H:i:s');

        // $bitflyer->bid = $request->bid;
        // $bitflyer->ask = $request->ask;
        // $bitflyer->last = $request->last;
        // $bitflyer->baseVolume = $request->baseVolume;

        // $bitflyer->info_product_code = $request->info['product_code'];
        // $bitflyer->info_timestamp = $request->info['timestamp'];
        // $bitflyer->info_tick_id = $request->info['tick_id'];
        // $bitflyer->info_best_bid = $request->info['best_bid'];
        // $bitflyer->info_best_ask = $request->info['best_ask'];
        // $bitflyer->info_best_bid_size = $request->info['best_bid_size'];
        // $bitflyer->info_best_ask_size = $request->info['best_ask_size'];
        // $bitflyer->info_total_bid_depth = $request->info['total_bid_depth'];
        // $bitflyer->info_total_ask_depth = $request->info['total_ask_depth'];
        // $bitflyer->info_ltp = $request->info['ltp'];
        // $bitflyer->info_volume = $request->info['volume'];
        // $bitflyer->info_volume_by_product = $request->info['volume_by_product'];

        // $bitflyer->save();
        // return response()
        //     ->json([
        //         'saved' => true,
        //         'message' => 'You have successfully created bitflyer!'
        //     ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function edit($id)
    // {
    //     //
    // }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request, $id)
    // {
    //     //
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $tickers = Bitflyer::limit(600)->latest()->get();
        $ticker = $tickers->last();

        Bitflyer::where('datetime', '<', $ticker->datetime)->delete();

        return response()->json(null, 204);
    }
}
