<?php

namespace App\Http\Controllers\Exchange;

use App\Bitbank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Bitbank as BitbankResources;

class BitbankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bitbanks = Bitbank::limit(600)->latest()->get();
        return BitbankResources::collection($bitbanks);

        // $bitbank = DB::table('bitbanks')->latest()->first();
        // return response()->json([
        //     'name' => 'BitBank',
        //     'symbol' => $bitbank->symbol,
        //     'datetime'=> $bitbank->datetime,
        //     'bid'=> $bitbank->bid,
        //     'ask'=> $bitbank->ask,
        //     'baseVolume'=> $bitbank->baseVolume,
        // ], 200, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

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
            'high' => 'required',
            'low' => 'required',
            'bid' => 'required',
            'ask' => 'required',
            'last' => 'required',
            'baseVolume' => 'required',
        ]);

        $bitbank = Bitbank::create($request->all());

        return response()->json($bitbank, 201);

        // $bitbank = new Bitbank();
        // $bitbank->symbol = 'BTC/JPY';
        // $bitbank->timestamp = $request->timestamp;
        // $bitbank->datetime = date('Y-m-d H:i:s', $request->timestamp / 1000);
        // $bitbank->high = floatval($request->high);
        // $bitbank->low = floatval($request->low);
        // $bitbank->bid = floatval($request->buy);
        // $bitbank->ask = floatval($request->sell);
        // $bitbank->last = floatval($request->last);
        // $bitbank->baseVolume = floatval($request->vol);

        // $bitbank->info_sell = floatval($request->sell);
        // $bitbank->info_buy = floatval($request->buy);
        // $bitbank->info_high = floatval($request->high);
        // $bitbank->info_low = floatval($request->low);
        // $bitbank->info_last = floatval($request->last);
        // $bitbank->info_vol = floatval($request->vol);
        // $bitbank->info_timestamp = $request->timestamp;

        // $bitbank->save();
        // return response()
        //     ->json([
        //         'saved' => true,
        //         'message' => 'You have successfully created bitbank!'
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
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy()
    {
        $tickers = Bitbank::limit(600)->latest()->get();
        $ticker = $tickers->last();

        Bitbank::where('datetime', '<', $ticker->datetime)->delete();

        return response()->json(null, 204);
    }
}
