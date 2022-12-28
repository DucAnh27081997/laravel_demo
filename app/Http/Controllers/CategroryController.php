<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CategroryController extends Controller
{
    public function __contruct(){
    
    }

    public function index(){
        return view('client/categrory/list');
    }

    public function edit(){
        return view('client/categrory/edit');
    }

    public function getCategrory($id){
        return 'lay chi tiet danh muc!'.$id;
    }

    public function addCategrory(){
    
    }

    public function updateCategrory(){
        return 'updateCategrory!';
    }

    public function deleteCategrory(){
    
    }
}
