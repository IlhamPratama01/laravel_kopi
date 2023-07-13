<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Transaksi;

class RoleController extends Controller
{
    

    //Menampilkan Data Table Role
    public function tampil(Request $request)
    {
        
        if($request->has('search')){
            $data=User::where('name','like','%'.$request->search.'%')
            ->orwhere('role','like','%'.$request->search.'%')->paginate(3);
        }else{
            $data=User::paginate(3); 
        
        }
        return view('manager.role', ['data'=>$data]);
    }

    //Operasi Pengeditan Data Role
    public function edit(request $request)
        {
            $data=User::where("name", $request->name)->update(array(
                "email"=>$request->email,
                "role"=>$request->role,
            
            ));

            if($data){
                return redirect('/manager/role');
      
        } else{
            return json_encode(array('status'=>false,'pesan'=>"Gagal Ubah data"));

            }
        }

        //Membuka View Ubah Role
        public function ubah($id){
            $data=User::where('id',$id)->get();
            return view('manager.ubahrol', ['data'=>$data]);
        }

        //Menghapus Role Berdasarkan Id
        public function hapus($id)
        {
            // Periksa apakah ada transaksi terkait dengan pengguna
            $transaksi = Transaksi::where('id', $id)->first();

             if ($transaksi) {
             // Jika ada transaksi terkait, hapus transaksi terlebih dahulu
            $transaksi->delete();
            }
            $data = User::where("id", $id)->delete();

            if($data){
                return redirect('/manager/role')->with(array('status'=>true,'Berhasil Hapus Data'));
          
            } else{
                return json_encode(array('status'=>false,'pesan'=>"Gagal Hapus data",
                ));

            }
        }
}
