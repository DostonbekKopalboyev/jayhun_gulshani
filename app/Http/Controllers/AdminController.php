<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Sovga;
use Illuminate\Http\Request;

class AdminController extends Controller
{

    public function index()
    {
        $sovgas=Sovga::all();
        return view('admin.index');
    }


    public function create()
    {
        //
    }


    public function store(Request $request)
    {
        //
    }


    public function show(Admin $admin)
    {
        //
    }


    public function edit(Admin $admin)
    {
        //
    }


    public function update(Request $request, Admin $admin)
    {
        //
    }


    public function destroy(Admin $admin)
    {
        //
    }
}
