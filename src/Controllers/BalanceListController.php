<?php

namespace App\Controllers;

use App\Models\BalanceDataModel;
use Exception;

class BalanceListController
{
    /**
     * @throws Exception
     */
    public function handle()
    {
        header('Content-Type: application/json');
        $id = (int)$_GET['id'];
        if (!$id) {
            throw new Exception('Invalid ID');
        }
        $result = BalanceDataModel::getCustomerBalance($id);
        echo json_encode(['result' => (bool)$result, 'data' => $result]);
    }
}