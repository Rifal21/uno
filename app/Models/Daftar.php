<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Daftar extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class , 'id_kelas');
    }
    public function kategori()
{
    return $this->belongsTo(Kategori::class, 'id_kategori'); // 'kategori_id' adalah nama foreign key
}

}
