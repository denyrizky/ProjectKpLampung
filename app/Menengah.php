<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menengah extends Model
{
    protected $table = 'menengah';
    protected $fillable = [
        'nama_perusahaan', 'badan_hukum','nama_pemohon','alamat_perusahaan','kelurahan','kecamatan',
        'kelompok_industri','komoditi_industri','jumlah','satuan','jk','nilai_investasi','nilai_produksi',
        'surat_terbit','usaha',
    ];
}
