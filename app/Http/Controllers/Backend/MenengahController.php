<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\User;
use App\Menengah;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class MenengahController extends Controller
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

        $data = Menengah::all();
        return view('backend.pages.menengah.index', compact('data'));
    }

    public function store(Request $request)
    {
        // Process Data
        $data = Menengah::create([
        'nama_perusahaan' => $request->name,
        'badan_hukum' => $request->Badan,
        'nama_pemohon' => $request->Pemohon,
        'alamat_perusahaan' => $request->Alamat, 
        'kelurahan' => $request->Kelurahan, 
        'kecamatan' => $request->Kecamatan, 
        'kelompok_industri' => $request->KBLJ, 
        'komoditi_industri' => $request->Komoditif, 
        'jumlah' => $request->Jumlah, 
        'satuan' => $request->Satuan, 
        'jk' => $request->JK, 
        'nilai_investasi' => $request->Investasi, 
        'nilai_produksi' => $request->Produksi, 
        'surat_terbit' => $request->Surat, 
        'usaha' => $request->Usaha, 
    ]);
        session()->flash('success', 'Data Industri Menengah Bidang IKKAH Berhasil Dibuat !!');
        return redirect('admin/menengah');
    }

    public function update(Request $request, $id)
    {

        $data = Menengah::findOrFail($id);
        $data -> nama_perusahaan = $request->nama;
        $data -> badan_hukum = $request->badan;
        $data -> nama_pemohon = $request->pemohon;
        $data -> alamat_perusahaan = $request->alamat;
        $data -> kelurahan = $request->kelurahan;
        $data -> kecamatan = $request->kecamatan;
        $data -> kelompok_industri = $request->kblj;
        $data -> komoditi_industri = $request->komoditif;
        $data -> jumlah = $request->jumlah;
        $data -> satuan = $request->satuan;
        $data -> jk = $request->jk;
        $data -> nilai_investasi = $request->investasi;
        $data -> nilai_produksi = $request->produksi;
        $data -> surat_terbit = $request->surat;
        $data -> usaha = $request->usaha;

        $data->save();
        session()->flash('success', 'Data Industri Menengah Bidang IKKAH Berhasil Diubah !!');
        return response()->json();

    }

    public function show($id)
    {
        $data = Menengah::findOrFail($id);
        return response()->json(['status' => 200, 'message' => 'Success', 'data' => $data], 200);
    }
    public function destroy($id)
    {
        Menengah::findOrFail($id)->delete();
        session()->flash('error', 'Data Industri Menengah Bidang IKKAH Berhasil Dihapus !!');
        return response()->json(['status' => 200, 'message' => 'Success'], 200);
    }
}
