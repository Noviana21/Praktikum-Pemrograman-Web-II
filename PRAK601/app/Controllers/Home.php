<?php

namespace App\Controllers;

use App\Models\modeling;

class Home extends BaseController {
    public function index() {
        $model = new modeling();
        $data = $model->getData();
        return view('home/index', $data);
    }
}