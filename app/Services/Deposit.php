<?php

namespace App\Services;
use DB;



class Deposit
{

    public function getDepositBalance(): string
    {
        //Get the type of expenses to be used to calculate remaining amount in deposit
        $expensesTypes =['deposit','expense','payment'];
        $total = DB::table('transactions')->select(DB::raw("SUM(amount) as TotalBalance"))->whereIn('type',$expensesTypes)->first();
        return number_format($total->TotalBalance, 2);
    }

}
