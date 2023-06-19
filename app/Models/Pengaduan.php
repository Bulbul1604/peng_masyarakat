<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Pengaduan extends Model
{
    use HasFactory;
    protected $table = "pengaduan";
    protected $fillable = [
        'user_id', 'tgl_pengaduan', 'isi_pengaduan', 'foto', 'alamat_pengadu', 'status'
    ];
    protected $casts = ['tgl_pengaduan' => 'datetime'];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function tanggapan(): HasOne
    {
        return $this->hasOne(Tanggapan::class);
    }

    public function scopeWhereMasyarakat(Builder $builder)
    {
        $builder->where('status', '!=', 'selesai')->whereHas('user', function ($user) {
            $user->where('akses', 'masyarakat')->where('id', auth()->user()->id);
        })->get();
    }
}
