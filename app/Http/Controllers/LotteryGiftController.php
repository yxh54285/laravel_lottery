<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use App\Models\LotteryGifts;


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
        // 初始化抽獎介面
        // 預設人數：30
        // 獎項：
        // 三獎,5
        // 二獎,3
        // 頭獎,1
        // $lottery = LotteryGifts::all();
        // return response(collect($lottery));
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
        // 預設資料
        // 資料範例：
        // 0 = ['name' => '頭獎','quantity' => 1]
        // 1 = ['name' => '二獎','quantity' => 2]
        // 2 = ['name' => '三獎','quantity' => 3]
        $lottery_gifts = [
            ['name' => '頭獎', 'quantity' => 1],
            ['name' => '二獎', 'quantity' => 2],
            ['name' => '三獎', 'quantity' => 5]
        ];

        LotteryGifts::insert($lottery_gifts);

        return response(true);
        // Validator應用
        // $validator = Validator::make($request->all(), [
        //     'name'      =>  'required',
        //     'quantity'  => 'required'
        // ]);

        // if($validator->fails()) {
        //     return response($validator->errors(), 400);
        // }
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
