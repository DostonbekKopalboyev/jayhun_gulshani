<?php

namespace App\Http\Controllers;

use App\Models\Menyu;
use App\Models\Sovga;
use Illuminate\Http\Request;
use Illuminate\View\View;


class MenyuController extends Controller
{

    public function index()
    {
        $sovga=Sovga::all();

        return view('user.index',['sovgani_chiqar'=>$sovga]);
    }

//    public function admin()
//    {
//        return view('admin.index');
//    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Menyu $menyu)
    {
        //
    }


    public function edit(Menyu $menyu)
    {
        //
    }


    public function update(Request $request, Menyu $menyu)
    {
        //
    }


    public function destroy(Menyu $menyu)
    {
        //
    }
}
