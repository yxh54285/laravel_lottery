<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Lottery;
use App\Models\LotteryGifts;

class LotteryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        
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
        //
        $lotteries = array();

        $lottery_gifts = LotteryGifts::select('id', 'name', 'quantity')->orderByRaw('id DESC')->get();

        foreach ($lottery_gifts as $lottery_gift) {
            for($i=0; $i<$lottery_gift['quantity']; $i++) {
                $gifts[] = $lottery_gift['id'];
            }
        }

        for ($i=1; $i <= 30 ; $i++) { 
            if ($i < 10) {
                $number[] = '00'.$i;
            }
            else {
                $number[] = '0'.$i;
            }
        }

        // shuffle($gifts);
        shuffle($number);

        foreach ($gifts as $key => $gift) {
            $lotteries[] = array(
                'number'    => $number[$key],
                'gift_id'   => $gift
            );
        }

        Lottery::insert($lotteries);

        return $lotteries;
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
    public function destroy($id)
    {
        //
    }
}
