<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Exceptions\MaxPeopleException;

class CheckMaxPeople
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        // 取得獎品資料
        $datas = $request->get('gift');
        // 取得抽獎人數
        $number = $request->get('number');
        // 計算獎品總數
        $item_num = 0;
        // 取代因 textarea 產生的 \n\r (換行符號)
        $quantitys = str_replace(array("\n", "\r"), '.', $datas);
        $quantitys = explode('.', $quantitys);

        foreach ($quantitys as $key => $quantity) {
            // 取得獎項名稱與數量
            $items = explode(',', $quantity);
            $item_num += $items[1];
            if ($item_num > $number) {
                // 若獎品數量 > 抽獎人數，return error
                throw new MaxPeopleException();
            }
        }

        return $next($request);
    }
}
