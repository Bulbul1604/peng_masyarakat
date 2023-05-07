<?php

use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\GenerateReportController;
use App\Http\Controllers\LaporanController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ResponseController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\VerifController;
use App\Models\Pengaduan;
use App\Models\Tanggapan;
use App\Models\User;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    $complaint = Pengaduan::get();
    $response = Tanggapan::get();
    $user = User::where('akses', 'masyarakat')->get();
    return view('index', compact('complaint', 'response', 'user'));
});

require __DIR__ . '/auth.php';

// Login Admin
Route::middleware('auth', 'checkRole:admin')->group(function () {
    // Data Users
    Route::resource('users', UserController::class)->except('show');
    // Data Laporan
    Route::get('complaint/{complaint}/edit', [ComplaintController::class, 'edit'])->name('complaint.edit');
    Route::patch('complaint/{complaint}', [ComplaintController::class, 'update'])->name('complaint.update');
});

// Login Masyarakat
Route::middleware(['auth', 'checkRole:masyarakat'])->group(function () {
    // Data Laporan
    Route::get('complaint/create', [ComplaintController::class, 'create'])->name('complaint.create');
    Route::post('complaint', [ComplaintController::class, 'store'])->name('complaint.store');
    Route::delete('complaint/{complaint}', [ComplaintController::class, 'destroy'])->name('complaint.destroy');
});

// Login Admin, Pimpinan, dan Petugas
Route::middleware(['auth', 'checkRole:admin,petugas,pimpinan'])->group(function () {
    // Data Verif
    Route::get('verif', [VerifController::class, 'index'])->name('verif.index');
    Route::get('verif/{verif}', [VerifController::class, 'show'])->name('verif.show');
    Route::get('verif/{verif}/edit', [VerifController::class, 'edit'])->name('verif.edit');
    Route::patch('verif/{verif}', [VerifController::class, 'update'])->name('verif.update');
});

// Login Admin, dan Pimpinan
Route::middleware(['auth', 'checkRole:admin,pimpinan'])->group(function () {
    // // Data Verif
    // Route::get('verif', [VerifController::class, 'index'])->name('verif.index');
    // Route::get('verif/{verif}', [VerifController::class, 'show'])->name('verif.show');
    // Route::get('verif/{verif}/edit', [VerifController::class, 'edit'])->name('verif.edit');
    // Route::patch('verif/{verif}', [VerifController::class, 'update'])->name('verif.update');
    // Data Laporan
    Route::resource('generate-report', GenerateReportController::class)->except('');
});

// Login Admin, Petugas, Pimpinan, dan Masyarakat
Route::middleware(['auth', 'checkRole:admin,petugas,pimpinan,masyarakat'])->group(function () {
    // Dashboard
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    // Laporan
    Route::get('complaint', [ComplaintController::class, 'index'])->name('complaint.index');
    Route::get('complaint/{complaint}', [ComplaintController::class, 'show'])->name('complaint.show');
    // Tanggapan
    Route::get('response', [ResponseController::class, 'index'])->name('response.index');
    Route::get('response/{response}', [ResponseController::class, 'show'])->name('response.show');
    // Buat Laporan
    Route::post('generate-report-print', [GenerateReportController::class, 'store'])->name('generate-report-print');
    Route::get('generate/report', function () {
        $reports = Tanggapan::get();
        return view('report.main', compact('reports'));
    });
    // Profile
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});
