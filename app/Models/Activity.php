<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    use HasFactory;
    // field apa saja yang bisa di isi
    public $fillable = ['id_media', 'title', 'deskripsi'];
    // membuat fitur created_at(kapan data dibuat) & updated_at (kapan data diedit)
    // aktif
    public $timestamps = true;

    // membuat relasi one to many di model
    public function media()
    {
        // data dari model 'Siswa' bisa dimiliki
        // oleh model 'Guru' melalui 'id_siswa'
        return $this->belongsTo(Media::class, 'id_media');
    }
}
