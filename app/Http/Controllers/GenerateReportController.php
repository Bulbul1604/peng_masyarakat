<?php

namespace App\Http\Controllers;

use App\Models\Pengaduan;
use App\Models\Tanggapan;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class GenerateReportController extends Controller
{
    public function index(Request $request)
    {
        return view('report.index');
    }

    public function store(Request $request)
    {
        $status = $request->status;
        $tgl =  $request->year;
        $reports = Tanggapan::with('pengaduan')
            ->whereHas('pengaduan', function (Builder $query) use ($status, $tgl) {
                $query->whereYear('tgl_pengaduan', $tgl)->where('status', $status);
            })
            ->get();
        $pdf = Pdf::loadView('report.main', compact('reports'));
        $tgl = date('d-m-Y');
        return $pdf->download('report_' . $tgl . '_to_' . now());
        // return view('report.main', compact('reports'));
    }
}
