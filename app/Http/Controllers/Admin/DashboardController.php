<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use illiminate\Support\Auth;
use App\Models\Produk;
use App\Models\Transaksi;
use App\Models\User;

class DashboardController extends Controller
{
    public function admin()
    {
        return view('admin.dashboard');
    }

    public function login()
    {
        return view('auth.login2');
    }

    public function user()
    {
        return view('user.user');
    }

    public function manager()
    {
        $data=Produk::all();
        $transaksi=Transaksi::all();
        $user=User::all();
        return view('admin.dashboard', ['data' => $data, 'transaksi' => $transaksi, 'user' => $user]);
    }
    

}
