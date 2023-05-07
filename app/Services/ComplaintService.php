<?php

namespace App\Services;

use App\Models\Pengaduan;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class ComplaintService
{
    public function handleIndex()
    {
        if (Auth::user()->akses == 'masyarakat') {
            $complaints = Pengaduan::with('user')->whereMasyarakat()->get();
        } else {
            $complaints = Pengaduan::with('user')->where('status', 'verifikasi')->get();
        }
        return $complaints;
    }

    public function handleUploadedImage($image)
    {
        if (!is_null($image)) {
            $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
            $image->storeAs('public/pengaduan', $filename);
        }
        return $filename;
    }

    public function handleUploadedImageUpdate($image, $id)
    {
        $complaint = Pengaduan::findOrFail($id);
        if (!is_null($image)) {
            $filename = date('YmdHi') . '_' . $image->getClientOriginalName();
            $image->move(public_path('images'), $filename);
            if ($complaint->foto) {
                Storage::delete('public/pengaduan/' . $complaint->image);
            }
        } else {
            $filename = $complaint->image;
        }

        return $filename;
    }
}
