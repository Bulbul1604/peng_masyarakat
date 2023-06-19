<?php

namespace App\Services;

use App\Models\Tanggapan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class VerificationService
{
    public function handleIndex()
    {
        if (Auth::user()->akses == 'admin') {
            $verifications = Tanggapan::whereHas('pengaduan', function (Builder $query) {
                $query->where('status', '!=', 'selesai');
            })->get();
        } elseif (Auth::user()->akses == 'pimpinan') {
            $verifications = Tanggapan::where('tgl_tanggapan', NULL)->where('isi_tanggapan', NULL)->whereHas('pengaduan', function (Builder $query) {
                $query->where('status', 'konfirmasi');
            })->get();
        } elseif (Auth::user()->akses == 'petugas') {
            $verifications = Tanggapan::where('tgl_tanggapan', NULL)->where('isi_tanggapan', NULL)->whereHas('pengaduan', function (Builder $query) {
                $query->where('status', 'proses');
            })->get();
        }
        return $verifications;
    }
}
