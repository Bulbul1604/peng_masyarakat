<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Services\VerificationService;
use Illuminate\Http\Request;

class VerifController extends Controller
{
    protected $verificationService;
    public function __construct()
    {
        $this->verificationService = new VerificationService();
    }

    public function index()
    {
        $verifications = $this->verificationService->handleIndex();
        return view('verif.index', compact('verifications'));
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(string $id)
    {
        $verification = Tanggapan::findOrFail($id);
        return view('verif.show', compact('verification'));
    }

    public function edit(string $id)
    {
        $verification = Tanggapan::findOrFail($id);
        return view('verif.edit', compact('verification'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'isi_tanggapan' => 'required'
        ], [
            'isi_tanggapan' => 'Isi tanggapan tidak boleh kosong!'
        ]);
        $verification = Tanggapan::findOrFail($id);
        $response = Pengaduan::where('id', $request->pengaduan_id)->first();
        $verification->update([
            'isi_tanggapan' => $request->isi_tanggapan,
            'tgl_tanggapan' => now(),
        ]);
        if (auth()->user()->akses == 'pimpinan') {
            $response->update([
                'status' => 'selesai',
            ]);
            return redirect()->route('verif.index')->with('success', 'Data pengaduan masyarakat berhasil ditanggapi!');
        } else {
            $response->update([
                'status' => 'konfirmasi',
            ]);
            return redirect()->route('verif.index')->with('success', 'Data pengaduan masyarakat berhasil ditanggapi!');
        }
    }

    public function destroy(string $id)
    {
        //
    }
}
