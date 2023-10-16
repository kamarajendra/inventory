<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){
        // $userlist = User::orderBy('created_at','DESC')->get();
        $user = Peminjam::orderBy('created_at','DESC')->get();
        return view('user',compact('user'));
    }

    public function store(Request $request){
        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'section_group' => $request->section_group,
        ];
        Peminjam::create($data);
        return redirect('/staff/user');
    }

}
