<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\User;
use Illuminate\Support\Facades\Auth;


class TransaksiController extends Controller
{
    // public function index(){
    //     $produk = Produk::where('id_produk', $id_produk)->first();

    //     return view('admin.transaksi', compact('produk'));
    // }
    
    public function cart()
    {
        $userId = Auth::id();
        $data = TransaksiDetail::where('id_user', $userId)->get();
        return view('user.cart',['data'=>$data]);
        
    }

    public function pesan(Request $request, $id)
    {
        $produk = Produk::findOrFail($id);
        $user = auth()->user();
    
        $detail = TransaksiDetail::where('id_produk', $produk->id)
                                ->where('id_user', $user->id)
                                ->first();
    
        if($detail){
            $detail->jumlah += $request->jumlah ?? 1;
            $detail->total_harga = $produk->harga * $detail->jumlah;
            $detail->save();
        } else {
            $detail = new TransaksiDetail;
            $detail->id_produk = $produk->id;
            $detail->nama_produk = $produk->nama_produk;
            $detail->harga = $produk->harga;
            $detail->jumlah = $request->jumlah ?? 1;
            $detail->total_harga = $produk->harga * $detail->jumlah;
            $detail->id_user = $user->id;
            $detail->save();
        }
    
        return redirect()->back()->with('success', 'Produk added to keranjang successfully!');
    }
    

    
    public function order(){
        $details = TransaksiDetail::get();
        $user = auth()->user();
        $iduser = $user->id;
        $name = $user->name;  
        $cart = session()->get('cart', []);

        foreach ($details as $detail) {
        $order = new Transaksi;
        $order->nama_produk = $detail->nama_produk;
        $order->id_produk = $detail->id_produk;
        $order->jumlah = $detail->jumlah;
        $order->grandtotal = $detail->total_harga;
        $order->id = $iduser;
        $order->name = $name;
    
        $order->save();
        }    
        session()->put('cart', $cart);
        DB::table('detail_transaksi')->truncate();
        return redirect()->back()->with('success', 'Product added to pesanan successfully!');
        
    }
    

    public function delete($id)
    {
        $data = TransaksiDetail::where("id", $id)->delete();

        if($data){
            return redirect('/transaksi')->with(array('status'=>true,'Berhasil Hapus Data'));
  
        } else{
            return json_encode(array('status'=>false,'pesan'=>"Gagal Hapus data",
            ));

        }
    }

    public function tambah(Request $request,$id)
    {
        $produk = Produk::findOrFail($id);
        $user = auth()->user();
        $detail = TransaksiDetail::where('id_produk', $produk->id)
                                ->where('id_user', $user->id)
                                ->first();
        $detail->jumlah += $request->jumlah ?? 1;
        $detail->total_harga = $produk->harga * $detail->jumlah;
        $detail->save();
    }

    public function kurang(Request $request,$id)
    {
        $produk = Produk::findOrFail($id);
        $user = auth()->user();
        $detail = TransaksiDetail::where('id_produk', $produk->id)
                                ->where('id_user', $user->id)
                                ->first();
        $detail->jumlah -= $request->jumlah ?? 1;
        $detail->total_harga = $produk->harga * $detail->jumlah;
        $detail->save();
    }




}
