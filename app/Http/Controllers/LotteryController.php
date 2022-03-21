<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
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
        $id = Lottery::latest()->select('group_id')->first();
        $datas = Lottery::where('group_id', $id['group_id'])->select('id', 'number', 'gift_id')->get();
        foreach ($datas as $data) {
            $gift_name = LotteryGifts::where('id', $data['gift_id'])->select('name')->get();
            $array[] = array(
                'number'    => $data['number'],
                'gift_name' => $gift_name[0]['name'],
            );
        }
        return response()->json($array);
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

        // 取得抽獎人數
        $number = $request->get('number');
        // 取得 lottery_gifts table 內，尚未抽出獎項
        $lottery_gifts = LotteryGifts::where('used', 0)->select('id', 'name', 'quantity')->get();
        // 目前資料表內last id
        $group_id = Lottery::orderByRaw('id DESC')->select('id')->limit(1)->get();
        $last_group_id = (isset($group_id[0]['id'])) ? ((int)$group_id[0]['id'] + 1) : 1;
        foreach ($lottery_gifts as $lottery_gift) {
            for ($i = 0; $i < $lottery_gift['quantity']; $i++) {
                // 將 gift id 、 gift name 存為陣列
                $gifts_id[] = $lottery_gift['id'];
                $gifts_name[] = $lottery_gift['name'];
            }
        }

        // 利用 sprintf 格式化編號
        // https://www.php.net/manual/en/function.sprintf.php
        for ($i = 1; $i <= $number; $i++) {
            $numbers[] = sprintf('%03d', $i);
        }

        // https://www.w3schools.com/php/func_array_shuffle.asp
        // 利用 shuffle 隨機排序
        shuffle($numbers);
        // 依照 gift 數量取出相對應人數
        $numbers = array_slice($numbers, 0, count($gifts_id));

        foreach ($gifts_id as $key => $gift_id) {
            $lotteries = array(
                'group_id'  => $last_group_id,
                'number'    => $numbers[$key],
                'gift_id'   => $gift_id
            );
            // insert 抽獎結果
            Lottery::create($lotteries);
            // 更新已抽出獎項的 used 欄位
            LotteryGifts::where('id', $gift_id)->update(['used' => 1]);

            $result[] = array(
                'id'            => $last_group_id,
                'number'        => $numbers[$key],
                'gift_name'     => $gifts_name[$key],
            );
        }

        return response()->json(['success' => 1, 'data' => $result], 200);
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
        // 找出目前的Group_id
        $group_id = Lottery::where('id', $id)->select('group_id')->get()->first();
        // 需被軟刪除的中獎名單
        Lottery::where('group_id', '!=', $group_id['group_id'])->delete();
        return response()->json(true);
    }
}
