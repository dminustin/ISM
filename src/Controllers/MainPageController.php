<?php

namespace App\Controllers;

use App\Classes\Views;
use App\Models\CustomerDataModel;

class MainPageController
{
    public function handle(): void
    {
        Views::view('index', [
            'customers' => CustomerDataModel::getActiveCustomers()
        ]);
    }
}