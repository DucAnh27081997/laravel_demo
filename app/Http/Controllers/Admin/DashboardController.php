<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class DashboardController extends Controller
{

    // __construct luon chay dau tien
    public function __construct()
    {
        echo ("run contructer!");
    }
    public function index()
    {
        return "<h2> This is Dashboard Controller</h2>";
    }

}