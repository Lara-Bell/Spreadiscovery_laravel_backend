<?php

namespace App\Http\Controllers\Exchange;

use App\Btcbox;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Btcbox as BtcboxResources;

class BtcboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $btcboxs = Btcbox::limit(600)->latest()->get();
        return BtcboxResources::collection($btcboxs);
        // $btcbox = DB::table('btcboxes')->latest()->first();
        // return response()->json([
        //     'name' => 'BtcBox',
        //     'symbol' => $btcbox->symbol,
        //     'datetime'=> $btcbox->datetime,
        //     'bid'=> $btcbox->bid,
        //     'ask'=> $btcbox->ask,
        //     'baseVolume'=> $btcbox->baseVolume,
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

        $btcbox = Btcbox::create($request->all());

        return response()->json($btcbox, 201);

        // $btcbox = new Btcbox();
        // $btcbox->symbol = $request->symbol;
        // $btcbox->timestamp = $request->timestamp;

        // $date = date_create($request->datetime);
        // $btcbox->datetime = date_format($date , 'Y-m-d H:i:s');

        // $btcbox->high = $request->high;
        // $btcbox->low = $request->low;
        // $btcbox->bid = $request->bid;
        // $btcbox->ask = $request->ask;
        // $btcbox->last = $request->last;
        // $btcbox->baseVolume = $request->baseVolume;

        // $btcbox->info_high = $request->info['high'];
        // $btcbox->info_low = $request->info['low'];
        // $btcbox->info_buy = $request->info['buy'];
        // $btcbox->info_sell = $request->info['sell'];
        // $btcbox->info_last = $request->info['last'];
        // $btcbox->info_vol = $request->info['vol'];

        // $btcbox->save();
        // return response()
        //     ->json([
        //         'saved' => true,
        //         'message' => 'You have successfully created btcbox!'
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
        $tickers = Btcbox::limit(600)->latest()->get();
        $ticker = $tickers->last();

        Btcbox::where('datetime', '<', $ticker->datetime)->delete();

        return response()->json(null, 204);
    }
}
