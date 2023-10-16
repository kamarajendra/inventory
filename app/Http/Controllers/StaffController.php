<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\User;
use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    function index()
    {
        // echo "Hello staff";
        // echo "<h1>". Auth::user()->name ."</h1>";
        // echo "<a href='/logout'> Logout </a>";
        return view('dashboard');
    }
    function items()
    {
        $listUser = Peminjam::all();
        $item = Item::all();
        return view('items', compact('listUser', 'item'));
    }
    function type()
    {
        return view('type');
    }
    function opname()
    {
        return view('opname');
    }

    function store(Request $request)
    {
        $request->validate([
            'model' => 'required',
            'serial_number' => 'required'
        ], [
            'model.required' => 'Model Harus diisi',
            'serial_number.required' => 'S/N Harus diisi'
        ]);
        $data = [
            'model' => $request->model,
            'serial_number' => $request->serial_number,
            'fa_pc' => $request->fa_pc,
            'user' => $request->user,
            'unit' => $request->unit,
            // 'user_role' => $request->user_role,
            'status' => $request->status,
            'details' => $request->details,
            'specs' => $request->specs,
        ];
        Item::create($data);
        return redirect('/staff/items');
    }

    function user()
    {
        $userlist = User::orderBy('created_at', 'DESC')->get();
        return view('user', compact('userlist'));
    }



    function guest()
    {
        echo "Hello guest";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'> Logout </a>";
    }
    function staff()
    {
        echo "Hello staff";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'> Logout </a>";
    }
    function admin()
    {
        echo "Hello admin";
        echo "<h1>" . Auth::user()->name . "</h1>";
        echo "<a href='/logout'> Logout </a>";
    }
}