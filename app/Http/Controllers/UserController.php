<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\Unit;
use App\Models\User;
use App\Models\UserRole;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // $userlist = User::orderBy('created_at','DESC')->get();
        $user = Peminjam::orderBy('created_at','DESC')->get();
        $role = UserRole::all();
        $unit = Unit::all();
        return view('user',compact('user','role','unit'));
    }

    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'unit' => $request->unit,
            'role' => $request->role,
        ];
        Peminjam::create($data);
        return redirect('/staff/user');
    }

}
