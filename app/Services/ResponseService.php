<?php

namespace App\Services;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class ResponseService
{
    public function handleIndex()
    {

        if (Auth::user()->akses == 'masyarakat') {
            $responses = Tanggapan::whereTanggapan()->get();
        } else {
            $responses = Tanggapan::whereTanggapanAll()->get();
        }
        return $responses;
    }
}
