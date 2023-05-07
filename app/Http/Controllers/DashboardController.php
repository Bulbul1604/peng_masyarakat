<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        if (Auth()->user()->akses != 'masyarakat') {
            $complaint = Pengaduan::get();
            $response = Tanggapan::get();
            $user = User::where('akses', 'masyarakat')->get();
            return view('dashboard.index', compact('complaint', 'response', 'user'));
        } else {
            return view('dashboard.index');
        }
    }
}
