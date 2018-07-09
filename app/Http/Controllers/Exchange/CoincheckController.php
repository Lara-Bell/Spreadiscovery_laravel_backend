<?php

namespace App\Http\Controllers\Exchange;

use App\Coincheck;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Coincheck as CoincheckResources;

class CoincheckController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $coinchecks = Coincheck::limit(600)->latest()->get();
        return CoincheckResources::collection($coinchecks);
        // $coincheck = DB::table('coinchecks')->latest()->first();
        // return response()->json([
        //     'name' => 'CoinCheck',
        //     'symbol' => $coincheck->symbol,
        //     'datetime'=> $coincheck->datetime,
        //     'bid'=> $coincheck->bid,
        //     'ask'=> $coincheck->ask,
        //     'baseVolume'=> $coincheck->baseVolume,
        // ]);
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

        $coincheck = Coincheck::create($request->all());

        return response()->json($coincheck, 201);

        // $coincheck = new Coincheck();
        // $coincheck->symbol = $request->symbol;
        // $coincheck->timestamp = $request->timestamp;

        // $date = date_create($request->datetime);
        // $coincheck->datetime = date_format($date , 'Y-m-d H:i:s');

        // $coincheck->high = $request->high;
        // $coincheck->low = $request->low;
        // $coincheck->bid = $request->bid;
        // $coincheck->ask = $request->ask;
        // $coincheck->last = $request->last;
        // $coincheck->baseVolume = $request->baseVolume;

        // $coincheck->info_last = $request->info['last'];
        // $coincheck->info_bid = $request->info['bid'];
        // $coincheck->info_ask = $request->info['ask'];
        // $coincheck->info_high = $request->info['high'];
        // $coincheck->info_low = $request->info['low'];
        // $coincheck->info_volume = $request->info['volume'];
        // $coincheck->info_timestamp = $request->info['timestamp'];

        // $coincheck->save();
        // return response()
        //     ->json([
        //         'saved' => true,
        //         'message' => 'You have successfully created coincheck!'
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
        $tickers = Coincheck::limit(600)->latest()->get();
        $ticker = $tickers->last();

        Coincheck::where('datetime', '<', $ticker->datetime)->delete();

        return response()->json(null, 204);
    }
}
