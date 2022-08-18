
@extends('backend.layouts.master')

@section('title')
ILMEA - BaDaS
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
                <h4 class="page-title pull-left">Data Industri Kecil Bidang Ilmea</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><span>Data Industri Kecil Bidang Ilmea</span></li>
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
                                    <th>Nama Pemilik usaha</th>
                                    <th>Alamat Kantor</th>
                                    <th>Nilai Investasi</th>
                                    <th>Nomor KTP</th>
                                    <th>Nama Usaha</th>
                                    <th>Nomor Induk Berusaha</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            @foreach ($data as $value)
                                <tr>
                                    <td>{{ $loop->index+1 }}</td>
                                    <td>{{$value->nama_pemilik_usaha}}</td>
                                    <td>{{$value->almt_kntr}}</td>
                                    <td>{{$value->nilai_inves}}</td>
                                    <td>{{$value->ktp}}</td>
                                    <td>{{$value->nama_usaha}}</td>
                                    <td>{{$value->NIB}}</td>
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
            <form action="{{ route('admin.kecilIlmea.store') }}" method="POST">
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Pemilik Perusahaan</label>
                        <input type="text" class="form-control" id="name" name="name" placeholder="Input" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Alamat Kantor</label>
                        <textarea type="text" class="form-control" id="alamat" name="alamat" placeholder="alamat" required></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nilai Investasi</label>
                        <input type="number" class="form-control" id="Nilai" name="Nilai" placeholder="Nilai" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nomor Identitas (KTP)</label>
                        <input type="number" class="form-control" id="KTP" name="KTP" placeholder="KTP" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Usaha</label>
                        <input type="text" class="form-control" id="usaha" name="usaha" placeholder="Nama Usaha" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nomor Induk Berusaha</label>
                        <input type="number" class="form-control" id="NIB" name="NIB" placeholder="NIB" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Sektor Usaha</label>
                        <input class="form-control" id="sektor" name="sektor" placeholder="Sektor Usaha" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Lokasi Pemilik Usaha</label>
                        <textarea type="text" class="form-control" id="lokasi" name="lokasi" placeholder="Lokasi Pemilik Usaha" required></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Kode/Nama KBLI</label>
                        <input type="text" class="form-control" id="KBLI" name="KBLI" placeholder="KBLI" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Tenaga Kerja</label>
                        <input type="number" class="form-control" id="Tenaga" name="Tenaga" placeholder="Tenaga Kerja" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Dikeluarkan Tanggal</label>
                        <input type="date" class="form-control" id="tanggal" name="tanggal" placeholder="Dikeluarkan Tanggal" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Nilai Produksi Rp/Thn</label>
                        <input type="number" class="form-control" id="Produksi" name="Produksi" placeholder="Nilai Produksi" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Komoditi Industri / Jenis Produksi</label>
                        <input type="text" class="form-control" id="komoditiindustri" name="komoditiindustri" placeholder="Komoditi Industri / Jenis Produksi" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Usaha:</label>
                        <select id="Usaha" name="Usaha" class="form-control" required>
                            <option value="">--</option>
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
<div class="modal fade" id="Update" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Upadate Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form>
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Pemilik Perusahaan</label>
                        <input type="text" class="form-control" id="id_edit" name="id_edit" placeholder="Input" hidden>
                        <input type="text" class="form-control" id="name_edit" name="name_edit" placeholder="Input" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Alamat Kantor</label>
                        <textarea type="text" class="form-control" id="alamat_edit" name="alamat_edit" placeholder="alamat" required></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nilai Investasi</label>
                        <input type="number" class="form-control" id="Nilai_edit" name="Nilai_edit" placeholder="Nilai" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nomor Identitas (KTP)</label>
                        <input type="number" class="form-control" id="KTP_edit" name="KTP_edit" placeholder="KTP" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Usaha</label>
                        <input type="text" class="form-control" id="usaha_edit" name="usaha_edit" placeholder="Nama Usaha" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nomor Induk Berusaha</label>
                        <input type="number" class="form-control" id="NIB_edit" name="NIB_edit" placeholder="NIB" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Sektor Usaha</label>
                        <input class="form-control" id="sektor_edit" name="sektor_edit" placeholder="Sektor Usaha" required>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Lokasi Pemilik Usaha</label>
                        <textarea type="text" class="form-control" id="lokasi_edit" name="lokasi_edit" placeholder="Lokasi Pemilik Usaha" required></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Kode/Nama KBLI</label>
                        <input type="text" class="form-control" id="KBLI_edit" name="KBLI_edit" placeholder="KBLI" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Tenaga Kerja</label>
                        <input type="number" class="form-control" id="Tenaga_edit" name="Tenaga_edit" placeholder="Tenaga Kerja" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Dikeluarkan Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_edit" name="tanggal_edit" placeholder="Dikeluarkan Tanggal" required>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Nilai Produksi Rp/Thn</label>
                        <input type="number" class="form-control" id="Produksi_edit" name="Produksi_edit" placeholder="Nilai Produksi" required>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Komoditi Industri / Jenis Produksi</label>
                        <input type="text" class="form-control" id="komoditiindustri_edit" name="komoditiindustri_edit" placeholder="Komoditi Industri / Jenis Produksi" required>
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

<!-- Modal -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
        <div class="modal-body">
            <form>
            @csrf
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Pemilik Perusahaan</label>
                        <input type="text" class="form-control" id="name_show" name="name_show" placeholder="Input" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Alamat Kantor</label>
                        <textarea type="text" class="form-control" id="alamat_show" name="alamat_show" placeholder="alamat" readonly></textarea>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nilai Investasi</label>
                        <input type="number" class="form-control" id="Nilai_show" name="Nilai_show" placeholder="Nilai" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nomor Identitas (KTP)</label>
                        <input type="number" class="form-control" id="KTP_show" name="KTP_show" placeholder="KTP" readonly>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nama Usaha</label>
                        <input type="text" class="form-control" id="usaha_show" name="usaha_show" placeholder="Nama Usaha" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Nomor Induk Berusaha</label>
                        <input type="number" class="form-control" id="NIB_show" name="NIB_show" placeholder="NIB" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Sektor Usaha</label>
                        <input class="form-control" id="sektor_show" name="sektor_show" placeholder="Sektor Usaha" readonly>
                    </div>
                </div>
                <div class="col-3">
                    <div class="form-group">
                        <label for="name">Lokasi Pemilik Usaha</label>
                        <textarea type="text" class="form-control" id="lokasi_show" name="lokasi_show" placeholder="Lokasi Pemilik Usaha" readonly></textarea>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Kode/Nama KBLI</label>
                        <input type="text" class="form-control" id="KBLI_show" name="KBLI_show" placeholder="KBLI" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Tenaga Kerja</label>
                        <input type="number" class="form-control" id="Tenaga_show" name="Tenaga_show" placeholder="Tenaga Kerja" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Dikeluarkan Tanggal</label>
                        <input type="date" class="form-control" id="tanggal_show" name="tanggal_show" placeholder="Dikeluarkan Tanggal" readonly>
                    </div>
                </div>
            </div>
            <hr>
            <div class="row">
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Nilai Produksi Rp/Thn</label>
                        <input type="number" class="form-control" id="Produksi_show" name="Produksi_show" placeholder="Nilai Produksi" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Komoditi Industri / Jenis Produksi</label>
                        <input type="text" class="form-control" id="komoditiindustri_show" name="komoditiindustri_show" placeholder="Komoditi Industri / Jenis Produksi" readonly>
                    </div>
                </div>
                <div class="col-4">
                    <div class="form-group">
                        <label for="name">Usaha</label>
                        <input type="text" class="form-control" id="Usaha_show" name="Usaha_show" placeholder="Usaha" readonly>
                    </div>
                </div>
            </div>
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
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
                                    url: "kecilIlmea/" + id,
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
                // console.log(id);
                $.ajax({
                    method:"GET",
                    url: "kecilIlmea/" + id,
                    success: function(data) {
                        if(data.data.usaha == 1){
                            var nama = "Baru";
                        }else{
                            var nama = "Lama";
                        }
                        $("#name_show").val(data.data.nama_pemilik_usaha)
                        $("#alamat_show").val(data.data.almt_kntr)
                        $("#Nilai_show").val(data.data.nilai_inves)
                        $("#KTP_show").val(data.data.ktp)
                        $("#usaha_show").val(data.data.nama_usaha)
                        $("#NIB_show").val(data.data.NIB)
                        $("#sektor_show").val(data.data.sektor_usaha)
                        $("#lokasi_show").val(data.data.lokasi)
                        $("#KBLI_show").val(data.data.kbli)
                        $("#Tenaga_show").val(data.data.tenaga_kerja)
                        $("#tanggal_show").val(data.data.dikeluarkan_tgl)
                        $("#Produksi_show").val(data.data.nilai_produksi)
                        $("#komoditiindustri_show").val(data.data.komoditif)
                        $("#Usaha_show").val(nama)
                        }
                })
            })

            $(".edit_modal").click(function() {
                let id = $(this).data("id")
                let token = $("input[name=_token]").val();
                // console.log(id);
                $.ajax({
                    method:"GET",
                    url: "kecilIlmea/" + id,
                    success: function(data) {
                        $("#id_edit").val(data.data.id)
                        $("#name_edit").val(data.data.nama_pemilik_usaha)
                        $("#alamat_edit").val(data.data.almt_kntr)
                        $("#Nilai_edit").val(data.data.nilai_inves)
                        $("#KTP_edit").val(data.data.ktp)
                        $("#usaha_edit").val(data.data.nama_usaha)
                        $("#NIB_edit").val(data.data.NIB)
                        $("#sektor_edit").val(data.data.sektor_usaha)
                        $("#lokasi_edit").val(data.data.lokasi)
                        $("#KBLI_edit").val(data.data.kbli)
                        $("#Tenaga_edit").val(data.data.tenaga_kerja)
                        $("#tanggal_edit").val(data.data.dikeluarkan_tgl)
                        $("#Produksi_edit").val(data.data.nilai_produksi)
                        $("#komoditiindustri_edit").val(data.data.komoditif)
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
                url: "kecilIlmea/" + id,
                method:"PUT",
                data: {
                    _token: token,
                   
                        nama:$("#name_edit").val(),
                        alamat:$("#alamat_edit").val(),
                        Nilai:$("#Nilai_edit").val(),
                        KTP:$("#KTP_edit").val(),
                        usaha:$("#usaha_edit").val(),
                        NIB:$("#NIB_edit").val(),
                        sektor:$("#sektor_edit").val(),
                        lokasi:$("#lokasi_edit").val(),
                        KBLI:$("#KBLI_edit").val(),
                        Tenaga:$("#Tenaga_edit").val(),
                        tanggal:$("#tanggal_edit").val(),
                        Produksi:$("#Produksi_edit").val(),
                        komoditiindustri:$("#komoditiindustri_edit").val(),
                        Usaha:$("#Usaha_edit").val(),
                
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