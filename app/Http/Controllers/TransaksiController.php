<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\TransaksiDetail;
use App\Models\Transaksi;
use App\Models\User;
use Auth;
use Carbon\Carbon;
use PDF;

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

            // $user=auth()->user();

            $produk = Produk::where('id', $id)->first();
            $user=auth()->user();
            $id=$user->id;
    $detail = new transaksidetail;
    $cart = session()->get('cart', []);

    $detail->nama_produk = $produk->nama_produk;
    $detail->harga = $produk->harga;
    $detail->jumlah = $request->jumlah ?? 1; // Nilai default jika $request->jumlah kosong
    $detail->total_biaya = $produk->harga * $detail->jumlah;
    $detail->id_user=$id;
    $detail->save();


    session()->put('cart', $cart);
    return redirect()->back()->with('success', 'Produk added to keranjang successfully!');
    }

    
    public function order(Request $request){

        $user=auth()->user();
        $id=$user->id;
        $name=$user->name;
        $cart = session()->get('cart', []);

        foreach ($request->nama_produk as $key => $nama_produk) {
            $order = new Transaksi;
            $order->nama_produk = $request->nama_produk[$key];
            $order->jumlah = $request->jumlah[$key];
            $order->grandtotal = $request->total_biaya[$key];
            $order->id=$id;
            $order->name=$name;

            $order->save();
        }

        DB::table('detail_transaksi')->truncate();

        session()->put('cart', $cart);
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




}
