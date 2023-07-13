<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use Illuminate\Support\Facades\Storage;

class ProdukController extends Controller
{
    //Menampilkan Data Table 
    public function tampil(Request $request)
    {
        
        if($request->has('search')){
            $data=Produk::where('nama_produk','like','%'.$request->search.'%')->paginate(5);
        }else{
            $data=Produk::paginate(5); 
        
        }
        return view('admin.produk', ['data'=>$data]);
    }

    //Membuka View Tambah Produk
    public function tambah()
    {
        return view('admin.tambah');
    }

    //Operasi Penambahan Produk Ke Database
    public function simpan(request $request)
    {
        $data= Produk::create($request->all());
            

            if($request->hasfile('gambar')){
                $request->file('gambar')->move('fotoproduk/', $request->file('gambar')->getClientOriginalName());
                $data->gambar = $request->file('gambar')->getClientOriginalName();
                $data->save();
            }
        
        if($data){
            return redirect('/admin/produk')->with(array('status'=>true,'Berhasil Tambah Data'));
      
        } else{
            return json_encode(array('status'=>false,'pesan'=>"Gagal Tambah data"));

        }
    }

    //Operasi Pengeditan Data Produk

    public function edit(Request $request)
{
    $data = Produk::where("id", $request->id)->first();

    if (!$data) {
        return json_encode(array('status' => false, 'pesan' => "Produk tidak ditemukan"));
    }

    $data->fill($request->all());

    if ($request->hasFile('gambar')) {
        $request->file('gambar')->move('fotoproduk/', $request->file('gambar')->getClientOriginalName());
        $data->gambar = $request->file('gambar')->getClientOriginalName();

        // Hapus gambar lama jika ada
    
    }
    
    if ($data->save()) {
        return redirect('/admin/produk')->with(array('status' => true, 'Berhasil Ubah Data'));
    } else {
        return json_encode(array('status' => false, 'pesan' => "Gagal Ubah data"));
    }

}


        //Membuka View Ubah Produk
        public function ubah($id){
            $data=Produk::where('id',$id)->get();
            return view('admin.ubahpro', ['data'=>$data]);
        }


        //Menghapus Produk Berdasarkan Id
        public function hapus($id)
        {
            $data=Produk::where("id", $id)->delete();

            if($data){
                return redirect('/admin/produk')->with(array('status'=>true,'Berhasil Hapus Data'));
          
            } else{
                return json_encode(array('status'=>false,'Message'=>"Gagal data",
                ));

            }
        }


        
}
