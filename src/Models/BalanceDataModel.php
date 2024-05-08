<?php

namespace App\Models;

use App\Classes\DataBase;

class BalanceDataModel
{
    public static function getCustomerBalance(int $id): false|array
    {
        $sql = 'SELECT      
        DATE_FORMAT(trdate, "%Y-%m") AS month,      
        SUM(CASE 
            WHEN account_to = ' . $id . ' THEN amount 
            WHEN account_from = ' . $id . ' THEN -amount          
            ELSE 0      END
            ) AS monthly_balance  
        FROM transactions 
        WHERE account_from = ' . $id . ' OR account_to = ' . $id . ' GROUP BY month  
        ORDER BY month;';
        return DataBase::db()->query($sql)->fetchAll();
    }
}