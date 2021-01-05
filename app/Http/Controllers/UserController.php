<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

use App\Surat;
use App\Cart;
use App\Ambulance;
use App\ItemTanah;
use App\Tanah;
use App\Harga;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function ambulancePage()
    {
        return view('userlogin.ambulance');
    }
    
    public function suratPage(){
        return view('userlogin.surat');
    }
    public function tanahPage(){
        $datas = ItemTanah::get();
        return view('userlogin.pemesanantanah' , ['datas' => $datas]);
    }
    public function solutionPage(){
        return view('userlogin.solution');
    }
    public function prosesSurat(Request $request){
        $harga = Harga::first();
        $data = $request->all();
        $data = $request->except('_token');
        $data['userid'] = Auth::id();
        $data['harga'] = $harga['surat'];

        if(is_null($data['nama'])){
            return redirect()->back()->with('status' , "error");
        }

        $id = Surat::create($data)->id;

        $checkCart = Cart::where('userid' , Auth::id())->where('status' , "Menunggu Pembayaran")->first();
        if(empty($checkCart)){
            $cart = new Cart();
            $cart->userid = Auth::id();
            $cart->suratid = $id;
            // $cart->ambulanceid = 0;
            // $cart->tanahid = 0;
            $cart->status = "Menunggu Pembayaran";
            $cart->save();
        }
        else{
            Cart::where('id' , $checkCart['id'])->update(['suratid' => $id]);
        }
        
        return redirect('user/cart')->with('status' , "Pengurusan Surat Kematian Berhasil");
    }
    public function prosesAmbulance(Request $request){
        $harga = Harga::first();
        $data = $request->all();
        $data = $request->except('_token');
        $data['userid'] = Auth::id();
        $data['harga'] = $harga['ambulance'];
        
        $id = Ambulance::create($data)->id;
        
        $checkCart = Cart::where('userid' , Auth::id())->where('status' , "Menunggu Pembayaran")->first();
        if(empty($checkCart)){
            $cart = new Cart();
            $cart->userid = Auth::id();
            //$cart->suratid = 0;
            $cart->ambulanceid = $id;
            // $cart->tanahid = 0;
            $cart->status = "Menunggu Pembayaran";
            $cart->save();
        }
        else{
            Cart::where('id' , $checkCart['id'])->update(['ambulanceid' => $id]);
        }
        
        return redirect('user/cart')->with('status' , "Pemesanan Ambulance Berhasil");
    }

    public function prosesTanah($id){
        $data = ItemTanah::where('id',$id)->first();

        $insertData = new Tanah();
        $insertData->userId = Auth::id();
        $insertData->nama = $data['nama'];
        $insertData->harga = $data['harga'];
        $insertData->save();

        $checkCart = Cart::where('userid' , Auth::id())->where('status' , "Menunggu Pembayaran")->first();
        if(empty($checkCart)){
            $cart = new Cart();
            $cart->userid = Auth::id();
            // $cart->suratid = 0;
            // $cart->ambulanceid = 0;
            $cart->tanahid = $insertData->id;
            $cart->status = "Menunggu Pembayaran";
            $cart->save();
        }
        else{
            Cart::where('id' , $checkCart['id'])->update(['tanahid' => $id]);
        }
        return redirect('user/cart')->with('status' , "Pemesanan Tanah Berhasil");
    }
    public function cart(){
        $datas = Cart::with(['Tanahs' , 'Surats' , 'Ambulances'])->where('userid' , Auth::id())->where('status',"Menunggu Pembayaran")->first();
        if(is_null($datas)){
            return redirect('user/cartKosong');
        }
        else{
            $tanahs = $datas['tanahs'];
            $surats = $datas['surats'];
            $ambulances = $datas['ambulances'];
            return view('userlogin.cart' , ['datas' => $datas , 'tanahs' => $tanahs , 'surats' => $surats , 'ambulances' => $ambulances]);
        }
       
    }

    public function cartKosong(){
        return view('userlogin.cartkosong');
    }
    public function hapusTanah($id,Request $request){
        $cartId = $request->input("cartid");
        Cart::where('userid' , Auth::id())->where('id' , $cartId)->update(['tanahid' => 0]);
        return redirect('user/cart');
    }
    public function hapusSurat($id,Request $request){
        $cartId = $request->input("cartid");
        Cart::where('userid' , Auth::id())->where('id' , $cartId)->update(['suratid' => 0]);
        return redirect('user/cart');
    }
    public function hapusAmbulance($id,Request $request){
        $cartId = $request->input("cartid");
        Cart::where('userid' , Auth::id())->where('id' , $cartId)->update(['ambulanceid' => 0]);
        return redirect('user/cart');
    }

    public function hapusCart($id){
        Cart::where('id' , $id)->delete();
        return redirect()->back();
    }
    public function buktiBayar($id){
        return view('userlogin.uploadbayar' , ['id' => $id]);
    }
    public function prosesBayar(Request $request){
        $id = $request->input('id');
        $upload = $request->file('upload');
        $image_name = time() . '.' . $upload->getClientOriginalExtension();
        $filefoto = Storage::putFileAs('public',$upload,$image_name);
        Cart::where('id' , $id)->where('status',"Menunggu Pembayaran")->update(['buktibayar' => $filefoto , 'status' => "Sudah dibayar"]);
        return redirect('user/solution');
    }
    public function order(){
        $datas = Cart::with(['Tanahs' , 'Surats' , 'Ambulances'])->where('userid' , Auth::id())->where('status',"sudah diverifikasi")->orWhere('status',"Sudah dibayar")->distinct('updated_at')->get();
        return view('userlogin.order' , ['datas' => $datas]);
    }

    
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
