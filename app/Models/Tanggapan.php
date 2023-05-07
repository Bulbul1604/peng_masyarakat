<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Support\Facades\Auth;

class Tanggapan extends Model
{
    use HasFactory;
    protected $table = "tanggapan";
    protected $fillable = [
        'pengaduan_id', 'user_id', 'isi_tanggapan', 'tgl_tanggapan'
    ];
    protected $casts = ['tgl_tanggapan' => 'datetime'];

    public function pengaduan(): BelongsTo
    {
        return $this->belongsTo(Pengaduan::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function scopeWhereTanggapan(Builder $builder)
    {
        $builder->whereHas('pengaduan', function (Builder $query) {
            $query->where('status', 'selesai')->where('user_id', auth()->user()->id);
        })->get();
    }

    public function scopeWhereTanggapanAll(Builder $builder)
    {
        $builder->whereHas('pengaduan', function (Builder $query) {
            $query->where('status', 'selesai');
        })->get();
    }
}
