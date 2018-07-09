<?php

namespace App\Http\Controllers\Exchange;

use App\Zaif;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Zaif as ZaifResources;

class ZaifController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zaifs = Zaif::limit(600)->latest()->get();
        return ZaifResources::collection($zaifs);
        // $zaif = DB::table('zaifs')->latest()->first();
        // return response()->json([
        //     'name' => 'Zaif',
        //     'symbol' => $zaif->symbol,
        //     'datetime'=> $zaif->datetime,
        //     'bid'=> $zaif->bid,
        //     'ask'=> $zaif->ask,
        //     'baseVolume'=> $zaif->baseVolume,
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

        $zaif = Zaif::create($request->all());

        return response()->json($zaif, 201);
        // $zaif = new Zaif();
        // $zaif->symbol = $request->symbol;
        // $zaif->timestamp = $request->timestamp;

        // $date = date_create($request->datetime);
        // $zaif->datetime = date_format($date , 'Y-m-d H:i:s');

        // $zaif->high = $request->high;
        // $zaif->low = $request->low;
        // $zaif->bid = $request->bid;
        // $zaif->ask = $request->ask;
        // $zaif->vwap = $request->vwap;
        // $zaif->last = $request->last;
        // $zaif->baseVolume = $request->baseVolume;
        // $zaif->quoteVolume = $request->quoteVolume;

        // $zaif->info_last = $request->info['last'];
        // $zaif->info_high = $request->info['high'];
        // $zaif->info_low = $request->info['low'];
        // $zaif->info_vwap = $request->info['vwap'];
        // $zaif->info_volume = $request->info['volume'];
        // $zaif->info_bid = $request->info['bid'];
        // $zaif->info_ask = $request->info['ask'];

        // $zaif->save();
        // return response()
        //     ->json([
        //         'saved' => true,
        //         'message' => 'You have successfully created zaif!'
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
        $tickers = Zaif::limit(600)->latest()->get();
        $ticker = $tickers->last();

        Zaif::where('datetime', '<', $ticker->datetime)->delete();

        return response()->json(null, 204);
    }
}
