<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Transaksi;
use auth;
use Illuminate\Support\Facades\DB;
use PDF;


class UserController extends Controller
{
    public function tampil(Request $request)
    {
        
        if($request->has('search')){
            $data=Produk::where('nama_produk','like','%'.$request->search.'%');
        }else{
        $data = Produk::all();
        }
        
        return view('user.user', ['data'=>$data]);
    }


    public function history()
    {
        $userId = Auth::id();
        $data = Transaksi::where('id', $userId)->get();
        return view('user.history',['data'=>$data]);
        
    }


    public function orderan()
    {

        $data=Transaksi::all();
        return view('admin.orderan',['data'=>$data]);
        
    }

    
    public function historyor()
    {

        $data=Transaksi::paginate(5);
        return view('admin.historyor',['data'=>$data]);
        
    }

    public function pembelian()
    {
        $data=Transaksi::paginate(5); 
        return view('manager.laporpem',['data'=>$data]);
        
    }

    public function produk(Request $request)
    {
        $data = Produk::paginate(5); 
        return view('manager.laporpro',['data'=>$data]);
        
    }

    public function ubah($id_transaksi){
        $data = Transaksi::where('id_transaksi', $id_transaksi)->first();

        $cek = $data->status;
        

        if($cek == 'Proses'){
            $data = Transaksi::where("id_transaksi", $id_transaksi)->update([
                'status'=>'Selesai'
            ]);  
        }else{
            $data = Transaksi::where("id_transaksi", $id_transaksi)->update([
                'status'=>'Proses'
            ]);
        }
        
        
        return redirect('admin/orderan/');
    }


    public function cetak_pdf()
    {
        $produk = Transaksi::all();
    
        $pdf = PDF::loadView('manager.pembelianpdf', ['produk' => $produk]);
        return $pdf->download('laporan-Transaksi.pdf');
    }

    public function produk_pdf()
    {
        $produk = Produk::all();
    
        $pdf = PDF::loadView('manager.produkpdf', ['produk' => $produk]);
        return $pdf->download('laporan-Produk.pdf');
    }



}
