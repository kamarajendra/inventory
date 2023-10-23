<?php

namespace App\Http\Controllers;

use App\Models\detailItems;
use App\Models\Peminjam;
use App\Models\User;
use App\Models\Item;
use App\Models\itemLocation;
use App\Models\itemType;
use App\Models\ListItem;
use App\Models\Unit;
use App\Models\unitLocation;
use App\Models\UserRole;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StaffController extends Controller
{
    function index(){
        // echo "Hello staff";
        // echo "<h1>". Auth::user()->name ."</h1>";
        // echo "<a href='/logout'> Logout </a>";
        return view('dashboard');
    }

    function peminjam(){
        $listUser = Peminjam::all();
        $item = Item::all();
        $listUnit = Unit::all();
        $listRole = UserRole::all();
        // $listItem = ListItem::all();
        $listItem = ListItem::where('status','stok')->get();

        
        return view('items',compact('listUser','item','listUnit','listRole','listItem'));
    }

    function store(Request $request){
        $request->validate([
            'model' => 'required',
        ],[
            'model.required' => 'Model Harus diisi',
        ]);
        $splitUser = explode('.',$request->user);
        $userData = Peminjam::where('id',$splitUser[1])->first();

        $splitmodel = explode('.',$request->model);
        $modelData = ListItem::where('id',$splitmodel[1])->first();
        // dd($modelData->id);
        
        $data = [
            'model' => $modelData->item_name,
            'serial_number' => $modelData->serial_number,
            'fa_pc'=> $modelData->fa_pc,
            'user' => $splitUser[0],
            'unit' => $userData->unit,
            'user_role'=> $userData->role,
            'status' => $request->status,
            'details'=> $request->details,
            'specs' => $request->specs,
        ];

        Item::create($data);
        listItem::where('id',$modelData->id)->update(['user_id'=>$userData->id,'status'=>'dipakai']);
        return redirect('/staff/peminjam');
    }

    public function listItem(){

        $listItem= listItem::all();
        $detailItems = detailItems::all();
        return view('list_items',compact('listItem','detailItems'));
    }

    public function storeItem(Request $request){
        $request->validate([
            'item_name'=> 'required',
            'serial_number'=> 'required',
        ],[
            'item_name.required'=>'Nama Item wajib diisi !!',
            'serial_number.required'=>'Serial Numbe wajib diisi !!!'
        ]);


        $splitID = explode('.',$request->item_name);
        // $userData = Peminjam::where('id',$splitID[1])->first();
        // dd($splitID[1]);
        $data = [
            'detail_id'=>$splitID[1],
            'item_name'=> $splitID[0],
            'serial_number'=>$request->serial_number,
            'fa_pc'=> $request->fa_pc,
            'specs'=>$request->specs,
            'status'=>$request->status,
        ];
        ListItem::create($data);
        return redirect('/staff/items');

    }
    public function unit_specs(){
        $detailItems = detailItems::all();
        return view('specs',compact('detailItems'));
    }

    public function store_specs(Request $request){
        $request->validate([
            'item_brands'=> 'required',
            'item_type'=> 'required',
            'item_specs'=> 'required',
        ],[
            'item_brands.required'=>'Nama Unit wajib diisi!!',
            'item_type.required'=>'Tipe wajib diisi!!',
            'item_specs.required'=>'Spesifikasi wajib diisi!!',
        ]);
        $data = [
            'item_brand' => $request->item_brands,
            'item_type' => $request->item_type,
            'item_specs' => $request->item_specs,
        ];
        detailItems::create($data);
        return redirect('/staff/specs');
    }

    public function delete_specs($id){
        $data = detailItems::findOrFail($id);
        $data->delete();
        return redirect('/staff/specs')->with('msg','Data berhasil dihapus');
    }
    public function update_specs(Request $request, $id){
        $request->validate([
            'item_brands'=> 'required',
            'item_type'=> 'required',
            'item_specs'=> 'required',
        ],[
            'item_brands.required'=>'Nama Unit wajib diisi!!',
            'item_type.required'=>'Tipe wajib diisi!!',
            'item_specs.required'=>'Spesifikasi wajib diisi!!',
        ]);
        // $data_id = detailItems::findOrFail($id);
        $data = [
            'item_brand'=> $request->item_brands,
            'item_type'=> $request->item_type,
            'item_specs'=> $request->item_specs,
        ];
        detailItems::where('id',$id)->update($data);
        return redirect('/staff/specs')->with('msg','Data berhasil diganti');


    }


    public function unitList(){
        $listUnit = Unit::orderBy('created_at','DESC')->get();
        return view('unit',compact('listUnit'));
    }

    public function saveUnit(Request $request){
        $request->validate([
            'unit'=> 'required',
        ],[
            'unit.required'=>'Nama Unit wajib diisi!!'
        ]);
        $data = [
            'unit' => $request->unit,
            'details' => $request->details,
        ];
        Unit::create($data);
        return redirect('/staff/unit');
    }

    public function roleList(){
        $listRole = UserRole::all();
        return view('userRole',compact('listRole'));
    }

    public function saveRole(Request $request){
        $request->validate([
            'role_name'=>'required',
        ],[
            'role_name.required' => 'Role wajib diisi!!'
        ]);
        $data = [
            'role_name' => $request->role_name,
            'detail' => $request->detail,
        ];
        UserRole::create($data);
        return redirect('/staff/role');
    }

    public function unit_location()
    {
        $unitLocation = itemLocation::all();
        return view('location',compact('unitLocation'));
    }

    public function unit_location_create(Request $request){
        $request->validate([
            'item_location'=>'required',
        ],[
            'item_location.required' => 'Lokasi Item wajib diisi!!'
        ]);
        $data = [
            'item_location'=> $request->item_location,
            'details'=> $request->item_details,
        ];
        itemLocation::create($data);
        return redirect('/staff/location');
    }

    public function product_type()
    {
        $itemType = itemType::all();
        return view('product_type',compact('itemType'));
    }

    public function product_type_create(Request $request){
        $request->validate([
            'product_type'=>'required',
        ],[
            'product_type.required' => 'Tipe produk wajib diisi !!!'
        ]);
        $data = [
            'type_name'=> $request->product_type,
            'details'=> $request->product_details,
        ];
        itemType::create($data);
        return redirect('/staff/product_type');
    }






   
}
