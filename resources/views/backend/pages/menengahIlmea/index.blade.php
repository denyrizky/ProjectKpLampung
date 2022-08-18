
@extends('backend.layouts.master')

@section('title')
Ilmea - BaDaS
@endsection

@section('styles')
    <!-- Start datatable css -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/responsive/2.2.3/css/responsive.jqueryui.min.css">
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">Data Industri Menengah Bidang Ilmea</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Data Industri Menengah Bidang Ilmea</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <h4 class="header-title float-left">List Data</h4>
                    <p class="float-right mb-2">
                        @if (Auth::guard('admin')->user()->can('role.create'))
                        <button type="button" class="btn btn-primary text-white" data-toggle="modal" data-target="#Tambah">
                        Tambah Data
                        </button>
                            <!-- <a class="btn btn-primary text-white" href="{{ route('admin.roles.create') }}">Tambah Data</a> -->
                        @endif
                    </p>
                    <div class="clearfix"></div>
                    <div class="data-tables">
                        @include('backend.layouts.partials.messages')
                        <table id="dataTable" class="text-center">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Perusahaan</th>
                                    <th>Badan Hukum</th>
                                    <th>Nama Pemohon</th>
                                    <th>Alamat Perusahaan</th>
                                    <th>Kelurahaan</th>
                                    <th>Kecamatan</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$value->nama_perusahaan}}</td>
                                    <td>{{$value->badan_hukum}}</td>
                                    <td>{{$value->nama_pemohon}}</td>
                                    <td>{{$value->alamat_perusahaan}}</td>
                                    <td>{{$value->kelurahan}}</td>
                                    <td>{{$value->kecamatan}}</td>
                                    <td>
                                        <button type="button" data-id="{{ $value->id }}" class="btn btn-success text-white edit_modal" data-toggle="modal" data-target="#Update">
                                        Ubah
                                        </button>
                                        <button type="button" data-id="{{ $value->id }}" class="btn btn-info text-white show_modal" data-toggle="modal" data-target="#detail">
                                        Detail
                                        </button>
                                        
                                        <button type="button" data-id="{{ $value->id }}" data-nama="{{ $value->nama_perusahaan }}" class="btn btn-danger text-white delete_modal">
                                        Hapus
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <!-- data table end -->
    </div>
</div>
        
<!-- Modal -->
<div class="modal fade" id="Tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form action="{{ route('admin.menengahIlmea.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Input" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Badan Hukum</label>
                        <input type="text" class="form-control" id="Badan" name="Badan" placeholder="Badan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Pemohon</label>
                        <input type="text" class="form-control" id="Pemohon" name="Pemohon" placeholder="Pemohon" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Alamat Perusahaan</label>
                        <textarea class="form-control" id="Alamat" name="Alamat" placeholder="Alamat Perusahaan" required></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kelurahan</label>
                        <input type="text" class="form-control" id="Kelurahan" name="Kelurahan" placeholder="Kelurahan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kecamatan</label>
                        <input type="text" class="form-control" id="Kecamatan" name="Kecamatan" placeholder="Kecamatan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kelompok Industri (KBLJ)</label>
                        <textarea class="form-control" id="KBLJ" name="KBLJ" placeholder="Kelompok Industri" required></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Komoditif Industri</label>
                        <input type="text" class="form-control" id="Komoditif" name="Komoditif" placeholder="Komoditif Industri" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Jumlah</label>
                        <input type="number" class="form-control" id="Jumlah" name="Jumlah" placeholder="Jumlah" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Satuan</label>
                        <input type="number" class="form-control" id="Satuan" name="Satuan" placeholder="Satuan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                    <label for="name">Jenis Kelamin:</label>
                    <select id="JK" name="JK" class="form-control" required>
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="1">Laki - Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nilai Investasi</label>
                        <input type="number" class="form-control" id="Investasi" name="Investasi" placeholder="Nilai Investasi" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Nilai Produksi</label>
                        <input type="number" class="form-control" id="Produksi" name="Produksi" placeholder="Nilai Produksi" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Surat Terbit (bln)</label>
                        <input type="date" class="form-control" id="Surat" name="Surat" placeholder="Surat Terbit" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Usaha:</label>
                        <select id="Usaha" name="Usaha" class="form-control" required>
                            <option value="">Usaha</option>
                            <option value="1">Baru</option>
                            <option value="2">Lama</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="name_detail" name="name_detail" placeholder="Input" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Badan Hukum</label>
                        <input type="text" class="form-control" id="Badan_detail" name="Badan_detail" placeholder="Badan" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Pemohon</label>
                        <input type="text" class="form-control" id="Pemohon_detail" name="Pemohon_detail" placeholder="Pemohon" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Alamat Perusahaan</label>
                        <textarea class="form-control" id="Alamat_detail" name="Alamat_detail" placeholder="Alamat Perusahaan" readonly></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kelurahan</label>
                        <input type="text" class="form-control" id="Kelurahan_detail" name="Kelurahan_detail" placeholder="Kelurahan" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kecamatan</label>
                        <input type="text" class="form-control" id="Kecamatan_detail" name="Kecamatan_detail" placeholder="Kecamatan" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kelompok Industri (KBLJ)</label>
                        <textarea class="form-control" id="KBLJ_detail" name="KBLJ_detail" placeholder="Kelompok Industri" readonly></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Komoditif Industri</label>
                        <input type="text" class="form-control" id="Komoditif_detail" name="Komoditif_detail" placeholder="Komoditif Industri" readonly>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Jumlah</label>
                        <input type="number" class="form-control" id="Jumlah_detail" name="Jumlah_detail" placeholder="Jumlah" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Satuan</label>
                        <input type="number" class="form-control" id="Satuan_detail" name="Satuan_detail" placeholder="Satuan" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Jenis Kelamin:</label>
                        <input type="text" class="form-control" id="JK_detail" name="JK_detail" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nilai Investasi</label>
                        <input type="number" class="form-control" id="Investasi_detail" name="Investasi_detail" placeholder="Nilai Investasi" readonly>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Nilai Produksi</label>
                        <input type="number" class="form-control" id="Produksi_detail" name="Produksi_detail" placeholder="Nilai Produksi" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Surat Terbit (bln)</label>
                        <input type="date" class="form-control" id="Surat_detail" name="Surat_detail" placeholder="Surat Terbit" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Usaha:</label>
                        <input type="text" class="form-control" id="Usaha_detail" name="Usaha_detail" readonly>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Ubah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
        <form name="edit">
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Perusahaan</label>
                        <input type="text" class="form-control" id="id_edit" name="id_edit" placeholder="Input" hidden>
                        <input type="text" class="form-control" id="name_edit" name="name_edit" placeholder="Input" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Badan Hukum</label>
                        <input type="text" class="form-control" id="Badan_edit" name="Badan_edit" placeholder="Badan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Pemohon</label>
                        <input type="text" class="form-control" id="Pemohon_edit" name="Pemohon_edit" placeholder="Pemohon" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Alamat Perusahaan</label>
                        <textarea class="form-control" id="Alamat_edit" name="Alamat_edit" placeholder="Alamat Perusahaan" required></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kelurahan</label>
                        <input type="text" class="form-control" id="Kelurahan_edit" name="Kelurahan_edit" placeholder="Kelurahan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kecamatan</label>
                        <input type="text" class="form-control" id="Kecamatan_edit" name="Kecamatan_edit" placeholder="Kecamatan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Kelompok Industri (KBLJ)</label>
                        <textarea class="form-control" id="KBLJ_edit" name="KBLJ_edit" placeholder="Kelompok Industri" required></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Komoditif Industri</label>
                        <input type="text" class="form-control" id="Komoditif_edit" name="Komoditif_edit" placeholder="Komoditif Industri" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Jumlah</label>
                        <input type="number" class="form-control" id="Jumlah_edit" name="Jumlah_edit" placeholder="Jumlah" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Satuan</label>
                        <input type="number" class="form-control" id="Satuan_edit" name="Satuan_edit" placeholder="Satuan" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                    <label for="name">Jenis Kelamin:</label>
                    <select id="JK_edit" name="JK_edit" class="form-control" required>
                        <option value="1">Laki - Laki</option>
                        <option value="2">Perempuan</option>
                    </select>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nilai Investasi</label>
                        <input type="number" class="form-control" id="Investasi_edit" name="Investasi_edit" placeholder="Nilai Investasi" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Nilai Produksi</label>
                        <input type="number" class="form-control" id="Produksi_edit" name="Produksi_edit" placeholder="Nilai Produksi" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Surat Terbit (bln)</label>
                        <input type="date" class="form-control" id="Surat_edit" name="Surat_edit" placeholder="Surat Terbit" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Usaha:</label>
                        <select id="Usaha_edit" name="Usaha_edit" class="form-control" required>
                            <option value="1">Baru</option>
                            <option value="2">Lama</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="swal-update-button">Save changes</button>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->
     <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/jquery.dataTables.min.js"></script>
     <script src="https://cdn.datatables.net/1.10.18/js/dataTables.bootstrap4.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
     <script src="https://cdn.datatables.net/responsive/2.2.3/js/responsive.bootstrap.min.js"></script>
     
     <script>
         /*================================
        datatable active
        ==================================*/
        if ($('#dataTable').length) {
            $('#dataTable').DataTable({
            });
        }
        $(document).ready(function() {
            $(".delete_modal").click(function() {
                let id = $(this).data("id")
                let nama = $(this).data("nama")
                let token = $("input[name=_token]").val();
                $.confirm({
                    title: 'Hapus Data',
                    content: 'Yakin Data '+nama+' ini di hapus?',
                    type: 'red',
                    typeAnimated: true,
                    buttons: {
                        tryAgain: {
                            text: 'Hapus Data',
                            btnClass: 'btn-red',
                            action: function(){
                                $.ajax({
                                    url: "menengahIlmea/" + id,
                                    method:"DELETE",
                                    data: {
                                        id: id,
                                        _token: token
                                    },
                                    success: function(data) {
                                        setTimeout(function() {
                                            location.reload();
                                        }, 800)
                                    },
                                })
                            }
                        },
                        Batal: function () {
                        }
                    }
                });
            })
            $(".show_modal").click(function() {
                let id = $(this).data("id")
                let token = $("input[name=_token]").val();
                $.ajax({
                    method:"GET",
                    url: "menengahIlmea/" + id,
                    success: function(data) {
                        if(data.data.jk){
                            var jk = "Laki-Laki";
                        }else{
                            var jk = "Perempuan";
                        }
                        if(data.data.usaha){
                            var nama = "Baru";
                        }else{
                            var nama = "Lama";
                        }
                        $("#name_detail").val(data.data.nama_perusahaan)
                        $("#Badan_detail").val(data.data.badan_hukum)
                        $("#Pemohon_detail").val(data.data.nama_pemohon)
                        $("#Alamat_detail").val(data.data.alamat_perusahaan)
                        $("#Kelurahan_detail").val(data.data.kelurahan)
                        $("#Kecamatan_detail").val(data.data.kecamatan)
                        $("#KBLJ_detail").val(data.data.kelompok_industri)
                        $("#Komoditif_detail").val(data.data.komoditi_industri)
                        $("#Jumlah_detail").val(data.data.jumlah)
                        $("#Satuan_detail").val(data.data.satuan)
                        $("#JK_detail").val(jk)
                        $("#Investasi_detail").val(data.data.nilai_investasi)
                        $("#Produksi_detail").val(data.data.nilai_produksi)
                        $("#Surat_detail").val(data.data.surat_terbit)
                        $("#Usaha_detail").val(nama)
                        }
                })
            })

            $(".edit_modal").click(function() {
                let id = $(this).data("id")
                let token = $("input[name=_token]").val();
                // console.log(id);
                $.ajax({
                    method:"GET",
                    url: "menengahIlmea/" + id,
                    success: function(data) {
                        $("#id_edit").val(data.data.id)
                        $("#name_edit").val(data.data.nama_perusahaan)
                        $("#Badan_edit").val(data.data.badan_hukum)
                        $("#Pemohon_edit").val(data.data.nama_pemohon)
                        $("#Alamat_edit").val(data.data.alamat_perusahaan)
                        $("#Kelurahan_edit").val(data.data.kelurahan)
                        $("#Kecamatan_edit").val(data.data.kecamatan)
                        $("#KBLJ_edit").val(data.data.kelompok_industri)
                        $("#Komoditif_edit").val(data.data.komoditi_industri)
                        $("#Jumlah_edit").val(data.data.jumlah)
                        $("#Satuan_edit").val(data.data.satuan)
                        $("#JK_edit").val(data.data.jk)
                        $("#Investasi_edit").val(data.data.nilai_investasi)
                        $("#Produksi_edit").val(data.data.nilai_produksi)
                        $("#Surat_edit").val(data.data.surat_terbit)
                        $("#Usaha_edit").val(data.data.usaha)
                        }
                })
            })

            $("#swal-update-button").click(function(e) {
            e.preventDefault();
            // Get id injected by .swal-edit-button
            let id = $("#id_edit").val();
            let token = $("input[name=_token]").val();
            
            $.ajax({
                url: "menengahIlmea/" + id,
                method:"PUT",
                data: {
                    _token: token,
                   
                    nama:     $("#name_edit").val(),
                    badan:    $("#Badan_edit").val(),
                    pemohon:  $("#Pemohon_edit").val(),
                    alamat:   $("#Alamat_edit").val(),
                    kelurahan:$("#Kelurahan_edit").val(),
                    kecamatan:$("#Kecamatan_edit").val(),
                    kblj:     $("#KBLJ_edit").val(),
                    komoditif:$("#Komoditif_edit").val(),
                    jumlah:   $("#Jumlah_edit").val(),
                    satuan:   $("#Satuan_edit").val(),
                    jk:       $("#JK_edit").val(),
                    investasi:$("#Investasi_edit").val(),
                    produksi: $("#Produksi_edit").val(),
                    surat:    $("#Surat_edit").val(),
                    usaha:    $("#Usaha_edit").val(),
                
                },
                success: function(data) {
                    console.log(data);
                    setTimeout(function() {
                        location.reload();
                    }, 800)
                },
            });
        });
        })
     </script>
@endsection