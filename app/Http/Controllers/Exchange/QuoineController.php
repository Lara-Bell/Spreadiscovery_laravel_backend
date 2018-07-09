<?php

namespace App\Http\Controllers\Exchange;

use App\Quoine;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Resources\Quoine as QuoineResources;

class QuoineController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $quoines = Quoine::limit(600)->latest()->get();
        return QuoineResources::collection($quoines);
        // $quoine = DB::table('quoines')->latest()->first();
        // return response()->json([
        //     'name' => 'Quoine',
        //     'symbol' => $quoine->symbol,
        //     'datetime'=> $quoine->datetime,
        //     'bid'=> $quoine->bid,
        //     'ask'=> $quoine->ask,
        //     'baseVolume'=> $quoine->baseVolume,
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

        $quoine = Quoine::create($request->all());

        return response()->json($quoine, 201);

        // $quoine = new Quoine();
        // $quoine->symbol = $request->symbol;
        // $quoine->timestamp = $request->timestamp;

        // $date = date_create($request->datetime);
        // $quoine->datetime = date_format($date , 'Y-m-d H:i:s');

        // $quoine->high = $request->high;
        // $quoine->low = $request->low;
        // $quoine->bid = $request->bid;
        // $quoine->ask = $request->ask;
        // $quoine->last = $request->last;
        // $quoine->baseVolume = $request->baseVolume;

        // $quoine->info_id = $request->info['id'];
        // $quoine->info_product_type = $request->info['product_type'];
        // $quoine->info_code = $request->info['code'];
        // $quoine->info_name = $request->info['name'];
        // $quoine->info_market_ask = floatval($request->info['market_ask']);
        // $quoine->info_market_bid = floatval($request->info['market_bid']);
        // $quoine->info_indicator = $request->info['indicator'];
        // $quoine->info_currency = $request->info['currency'];
        // $quoine->info_currency_pair_code = $request->info['currency_pair_code'];
        // $quoine->info_symbol = $request->info['symbol'];
        // $quoine->info_btc_minimum_withdraw = floatval($request->info['btc_minimum_withdraw']);
        // $quoine->info_fiat_minimum_withdraw = floatval($request->info['fiat_minimum_withdraw']);
        // $quoine->info_pusher_channel = $request->info['pusher_channel'];
        // $quoine->info_taker_fee = floatval($request->info['taker_fee']);
        // $quoine->info_maker_fee = floatval($request->info['maker_fee']);
        // $quoine->info_low_market_bid = floatval($request->info['low_market_bid']);
        // $quoine->info_high_market_ask = floatval($request->info['high_market_ask']);
        // $quoine->info_volume_24h = floatval($request->info['volume_24h']);
        // $quoine->info_last_price_24h = floatval($request->info['last_price_24h']);
        // $quoine->info_last_traded_quantity = floatval($request->info['last_traded_quantity']);
        // $quoine->info_quoted_currency = $request->info['quoted_currency'];
        // $quoine->info_base_currency = $request->info['base_currency'];
        // $quoine->info_disabled = $request->info['disabled'];
        // $quoine->info_exchange_rate = floatval($request->info['exchange_rate']);

        // $quoine->save();
        // return response()
        //     ->json([
        //         'saved' => true,
        //         'message' => 'You have successfully created quoine!'
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
        $tickers = Quoine::limit(600)->latest()->get();
        $ticker = $tickers->last();

        Quoine::where('datetime', '<', $ticker->datetime)->delete();

        return response()->json(null, 204);
    }
}
