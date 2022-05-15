<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pegawai extends Model
{
    use HasFactory,SoftDeletes;
    
    protected $fillable = [
        'id',
        'nip',
        'tempat_lahir',
        'tanggal_lahir',
        'agama',
        'alamat',
        'jenis_kelamin',
        'tanggal_bergabung',
        'jabatan',
        'status_karyawan',
        'no_telpon',
    ];
}
