<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\ItemTanah;
use App\Harga;
use App\Cart;
use Illuminate\Support\Facades\Storage;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.register');
    }
    public function loginPage(){
        return view('admin.login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    
    public function loginProcess(Request $request){
        $email = $request->input('email');
        $password = $request->input('password');

        if(Auth::attempt(['email' => $email , 'password' => $password])){
            return redirect('/admin/home');
        }
        else{
            return redirect()->back();
        }
    }
    public function store(Request $request)
    {
        $role = $request->input('role');
        $name = $request->input('name');
        $lastname = $request->input('lastname');
        $email = $request->input('email');
        $password = Hash::make($request->input('password'));
        
        
        $data = new User();
        $data->name = $name;
        $data->lastname = $lastname;
        $data->role = $role;
        $data->email = $email;
        $data->password = $password;
        $data->save();
        return redirect('/adminlogin');
    }

    public function home(){
        $datas = Cart::with(['Users'])->distinct('userid')->where('status' , "Sudah dibayar")->get();
        return view('admin.adminhome' , ['datas' => $datas]);
    }
    public function homeVerified(){
        $datas = Cart::with(['Users'])->distinct('userid')->distinct('updated_at')->where('status' , "sudah diverifikasi")->get();
        return view('admin.adminhomeverified' , ['datas' => $datas]);
    }
    public function tanahmakam(){
        return view('admin.tanahmakam');
    }
    public function itemtanah(Request $request){
        $foto = $request->file('foto');
        $nama = $request->input('nama');
        $harga = $request->input('harga');
        $image_name = time() . '.' . $foto->getClientOriginalExtension();
        $filefoto = Storage::putFileAs('public',$foto,$image_name);
        $data = new ItemTanah();
        $data->foto = $filefoto;
        $data->nama = $nama;
        $data->harga = $harga;
        $data->save();
        return redirect()->back();
    }
    public function ubahhargapage(){
        $data = Harga::first();
        
        if(empty($data)){
            return view('admin.ubahharga',['surat' => 0, 'ambulance' => 0]);
         }
         else{
             return view('admin.ubahharga',['surat' => $data['surat'], 'ambulance' => $data['ambulance']]);
         }
    }
    public function ubahharga(Request $request){
        $data = Harga::first();
        $surat = $request->input('surat');
        $ambulance = $request->input('ambulance');
         if(empty($data)){
            $insert = new Harga();
            $insert->ambulance = $ambulance;
            $insert->surat = $surat;
            $insert->save();
            return redirect('/admin/home');
        }
        else{
            Harga::where('id',1)->update(['surat' => $surat , 'ambulance' => $ambulance]);
            return redirect('/admin/home');
        }
    }

    public function detail($id){
        $datas = Cart::with(['Tanahs' , 'Surats' , 'Ambulances'])->where('id' , $id)->where('status',"Sudah dibayar")->first();
        $buktibayar = Cart::with(['Tanahs' , 'Surats' , 'Ambulances'])->where('id' , $id)->where('status',"Sudah dibayar")->pluck('buktibayar')->first();

        return view('admin.detail' , ['datas' => $datas , 'buktibayar' => $buktibayar , 'id' => $id]);
    }
    public function detailverif($id){
        $datas = Cart::with(['Tanahs' , 'Surats' , 'Ambulances'])->where('id' , $id)->where('status',"Sudah diverifikasi")->first();

        return view('admin.detailverif' , ['datas' => $datas , 'id' => $id]);
    }
    
    public function listtanah(){
        $datas = ItemTanah::get();
        return view('admin.listtanah' , ['datas' => $datas]);
    }

    public function edittanah($id){
        $data = ItemTanah::where('id' , $id)->first();

        return view('admin.edittanah' , ['data' => $data]);
    }

    public function processedittanah(Request $request, $id){
        $foto = $request->file('foto');
        $nama = $request->input('nama');
        $harga = $request->input('harga');
        if(is_null($foto)){
            ItemTanah::where('id' , $id)->update(['nama' => $nama , 'harga' => $harga]);
        }
        else{
            $image_name = time() . '.' . $foto->getClientOriginalExtension();
            $filefoto = Storage::putFileAs('public',$foto,$image_name);
            ItemTanah::where('id' , $id)->update(['foto' => $filefoto, 'nama' => $nama , 'harga' => $harga]);
        }
        return redirect('admin/listtanah');
    }
    
    public function verifikasi($id){
        Cart::where('id' , $id)->where('status',"Sudah dibayar")->update(['status' => "Sudah diverifikasi"]);
        return redirect('admin/home')->with('status',"Order sudah diverifikasi");
    }
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
