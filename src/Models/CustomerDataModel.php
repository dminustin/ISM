<?php

namespace App\Models;

use App\Classes\DataBase;

class CustomerDataModel
{
    public static function getActiveCustomers(): array
    {
        $sql = 'SELECT DISTINCT users.* FROM users JOIN (
                SELECT account_from AS user_id     
                FROM transactions     
                UNION     
                SELECT account_to AS user_id     
                FROM transactions ) unique_accounts 
                ON users.id = unique_accounts.user_id';

        return DataBase::db()->query($sql)->fetchAll();
    }
}