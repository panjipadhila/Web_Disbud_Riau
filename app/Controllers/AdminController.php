<?php

namespace App\Controllers;

class AdminController extends BaseController
{
    function index()
    {
        $data = [
            'title' => 'Login Admin | Web Disbud Riau',
        ];
        echo view('headerFixedTop', $data);
        echo view('login', $data);
        echo view('footer');
    }
    function login()
    {
    }
}
