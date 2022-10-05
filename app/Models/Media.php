<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Media extends Model
{
    use HasFactory;
    public $fillable = ['name', 'size', 'ekstensi', 'url'];
    public $timestamps = true;

    // membuat relasi one to many
    public function activity()
    {
        // data dari model 'Guru' bisa memiliki banyak data
        // dari model 'Siswa' melalui id_guru
        return $this->hasMany(Activity::class, 'id_media');
    }

    public function kelas()
    {
        // data dari model 'Guru' bisa memiliki banyak data
        // dari model 'Siswa' melalui id_guru
        return $this->hasMany(Kelas::class, 'id_media');
    }
    public function profile()
    {
        // data dari model 'Guru' bisa memiliki banyak data
        // dari model 'Siswa' melalui id_guru
        return $this->hasMany(Profile::class, 'id_media');
    }

    // method menampilkan image(url)
    // mengahupus image(url) di storage(penyimpanan) public


    // model event
    public function image()
    {
        if ($this->url && file_exists(public_path('images/wali/' . $this->url))) {
            return asset('images/wali/' . $this->url);
        } else {
            return asset('images/no_image.jpg');
        }
    }
    // mengahupus image(url) di storage(penyimpanan) public
    public function deleteImage()
    {
        if ($this->url && file_exists(public_path('images/wali/' . $this->url))) {
            return unlink(public_path('images/wali/' . $this->url));
        }
    }

}
