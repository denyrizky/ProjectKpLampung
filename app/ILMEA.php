<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ILMEA extends Model
{
    protected $table = 'kecil_ilmea';
    protected $fillable = [
        'nama_pemilik_usaha', 'almt_kntr','nilai_inves','ktp','nama_usaha','NIB',
        'sektor_usaha','lokasi','kbli','tenaga_kerja','dikeluarkan_tgl','nilai_produksi','komoditif',
        'usaha',
    ];
}
