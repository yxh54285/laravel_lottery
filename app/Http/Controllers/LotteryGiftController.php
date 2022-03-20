<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\LotteryGifts;
use App\Http\Requests\StorePostRequest;

class LotteryGiftController extends Controller
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
    public function store(StorePostRequest $request)
    {
        //

        // 取得獎品資料
        $datas = $request->get('gift');

        // 取代因 textarea 產生的 \n\r (換行符號)
        $quantitys = str_replace(array("\n", "\r"), '.', $datas);
        // 將獎項explode為陣列形式
        // 0 => ['頭獎', 1]
        // 1 => ['二獎', 2]
        // 2 => ['三獎', 5]
        $quantitys = explode('.', $quantitys);
        // 
        foreach ($quantitys as $key => $quantity) {
            // 取得獎項名稱與數量
            // ['頭獎', 1] => [[頭獎], 1]
            // ['二獎', 2] => [[二獎], 2]
            // ['三獎', 5] => [[三獎], 5]
            $items = explode(',', $quantity);

            $names[] = array(
                'name'      => $items[0],
                'used'      => 0,
                'quantity'  => $items[1]
            );
        }

        foreach ($names as $name) {
            LotteryGifts::create($name);
        }

        return response()->json(['success' => 1], 200);
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
