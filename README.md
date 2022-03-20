# 抽獎小程式
提供亂數抽獎的一個程式。.

## 開發環境
***
- PHP 8.1.2
- Laravel Framework 9.5.1

## 功能需求
***
1. 假設員工人數為30位，人員編號須為001~030
2. 每位員工最多只能獲得一份獎
3. 最終得獎結果需記錄起來
4. 抽獎系統需提供重置方法

## 欄位說明
***
- 抽獎人數欄位預設為30
- 獎項設定欄位必須輸入，輸入順序會影響開獎順序

## 隨機亂數
***
利用 PHP suhffle 將數組中的元素按隨機順序重新排列。

> Definition and Usage
> The shuffle() function randomizes the order of the elements in the array.
> This function assigns new keys for the elements in the array. Existing keys will be removed
> 資料來源：https://www.w3schools.com/php/func_array_shuffle.asp

## 人員編號
***
利用 PHP sprintf 將抽獎人員編號格式化為三位數（例：001、030、100）。
> Definition and Usage
> The sprintf() function writes a formatted string to a variable.
> The arg1, arg2, ++ parameters will be inserted at percent (%) signs in the main string.
> This function works "step-by-step". At the first % sign, arg1 is inserted, at the second % sign, arg2 is inserted, etc.
> Note: If there are more % signs than arguments, you must use placeholders. A placeholder is inserted after the % sign, and consists of the argument- number and "\$". See example two.
> 資料來源：https://www.w3schools.com/php/func_string_sprintf.asp
