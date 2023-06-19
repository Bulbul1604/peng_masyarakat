<?php

namespace App\Http\Controllers;

use App\Http\Requests\ComplaintRequest;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Http\Request;
use App\Services\ComplaintService;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ComplaintController extends Controller
{
    protected $complaintService;
    public function __construct()
    {
        $this->complaintService = new ComplaintService();
    }

    public function index()
    {
        $complaints = $this->complaintService->handleIndex();
        return view('complaint.index', compact('complaints'));
    }

    public function create()
    {
        return view('complaint.create');
    }

    public function store(ComplaintRequest $request)
    {
        Pengaduan::insert([
            'user_id' => $request->user_id,
            'tgl_pengaduan' => $request->tgl_pengaduan,
            'foto' => $this->complaintService->handleUploadedImage($request->foto),
            'isi_pengaduan' => $request->isi_pengaduan,
            'alamat_pengadu' => $request->alamat_pengadu,
            'created_at' => now(),
        ]);
        return redirect()->route('complaint.index')->with('success', 'Pengaduan masyarakat berhasil inputkan, silahkan tunggu tanggapan!');
    }

    public function show(string $id)
    {
        $complaint = Pengaduan::findOrFail($id);
        return view('complaint.show', compact('complaint'));
    }

    public function edit(string $id)
    {
        $complaint = Pengaduan::findOrFail($id);
        $officers = User::where('akses', 'petugas')->get();
        return view('complaint.edit', compact('complaint', 'officers'));
    }

    public function update(Request $request, string $id)
    {
        $this->validate($request, [
            'user_id' => 'required|numeric'
        ], [
            'numeric' => 'Petugas yang anda masukkan salah!'
        ]);
        DB::beginTransaction();
        try {
            // Step 1 : Create User
            $complaint = Pengaduan::findOrFail($id);
            $complaint->status = 'proses';
            $complaint->save();

            //Step 2 : Amount Charged
            $response = new Tanggapan();
            $response->pengaduan_id = $complaint->id;
            $response->user_id = $request->user_id;
            $response->save();

            DB::commit();
            return redirect()->route('verif.index')->with('success', 'Pengaduan masyarakat berhasil di verifikasi.');
        } catch (\Exception $e) {
            DB::rollback();
            return redirect()->back()->with('warning', 'Pengaduan masyarakat gagal di verifikasi.');
        }
    }

    public function destroy(string $id)
    {
        $complaint = Pengaduan::findOrFail($id);
        Storage::delete('public/pengaduan/' . $complaint->foto);
        $complaint->delete();
        return redirect()->route('complaint.index')->with('success', 'Pengaduan masyarakat berhasil dihapus.');
    }
}
