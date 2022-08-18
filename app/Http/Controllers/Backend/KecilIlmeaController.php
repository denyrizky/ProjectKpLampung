<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use App\ILMEA;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class KecilIlmeaController extends Controller
{
    public $user;

    public function __construct()
    {
        $this->middleware(function ($request, $next) {
            $this->user = Auth::guard('admin')->user();
            return $next($request);
        });
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (is_null($this->user) || !$this->user->can('blog.view')) {
            abort(403, 'Sorry !! You are Unauthorized to view any blog !');
        }

        $data = ILMEA::all();
        return view('backend.pages.kecilIlmea.index', compact('data'));
    }
    
    public function show($id)
    {
        $data = ILMEA::findOrFail($id);
        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data], 200);
    }

    public function store(Request $request)
    {
        // Process Data
        $data = ILMEA::create([
        'nama_pemilik_usaha' => $request->name,
        'almt_kntr' => $request->alamat,
        'nilai_inves' => $request->Nilai,
        'ktp' => $request->KTP, 
        'nama_usaha' => $request->usaha, 
        'NIB' => $request->NIB, 
        'sektor_usaha' => $request->sektor, 
        'lokasi' => $request->lokasi, 
        'kbli' => $request->KBLI, 
        'tenaga_kerja' => $request->Tenaga, 
        'dikeluarkan_tgl' => $request->tanggal, 
        'nilai_produksi' => $request->Produksi, 
        'komoditif' => $request->komoditiindustri, 
        'usaha' => $request->Usaha, 
    ]);
        session()->flash('success', 'DATA INDUSTRI KECIL BIDANG ILMEA Berhasil Dibuat !!');
        return redirect('admin/kecilIlmea');
    }

    public function update(Request $request, $id)
    {

        $data = ILMEA::findOrFail($id);

        $data -> nama_pemilik_usaha = $request->nama;
        $data -> almt_kntr = $request->alamat;
        $data -> nilai_inves = $request->Nilai;
        $data -> ktp = $request->KTP;
        $data -> nama_usaha = $request->usaha;
        $data -> NIB = $request->NIB;
        $data -> sektor_usaha = $request->sektor;
        $data -> lokasi = $request->lokasi;
        $data -> kbli = $request->KBLI;
        $data -> tenaga_kerja = $request->Tenaga;
        $data -> dikeluarkan_tgl = $request->tanggal;
        $data -> nilai_produksi = $request->Produksi;
        $data -> komoditif = $request->komoditiindustri;
        $data -> usaha = $request->Usaha;
        $data->save();
        session()->flash('success', 'DATA INDUSTRI KECIL BIDANG ILMEA Berhasil Diubah !!');
        return response()->json();

    }

    public function destroy($id)
    {
        ILMEA::findOrFail($id)->delete();
        session()->flash('error', 'DATA INDUSTRI KECIL BIDANG ILMEA Berhasil Dihapus !!');
        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }
}
