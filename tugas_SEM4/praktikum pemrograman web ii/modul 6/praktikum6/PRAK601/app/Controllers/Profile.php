<?php namespace App\Controllers;

use App\Models\modeling;

class Profile extends BaseController {
    public function index() {
        $model = new modeling();
        $data = $model->getData();
        return view('profile/index', $data);
    }
}