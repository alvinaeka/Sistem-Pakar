@extends ('layouts.master')

@section('title', 'Manage Basis Pentahuan Hama')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="content">
                <div class="container-fluid">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    @if (session('statusdanger'))
                        <div class="alert alert-danger">
                            {{ session('statusdanger') }}
                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                    @endif
                    <div class="card">
                        <div class="card-header">
                            <h3 class="card-title">Data Basis Pengetahuan Hama pohon durian</h3>
                            <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambahdatamodal">
                                    Tambah data
                            </button>
                        </div>
                        <!-- /.card-header -->
                        <div class="card-body table-responsive-md">
                            <table id="datatable"class="table table-hover" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th width="1%"></th>
                                    <th style="display:none;"></th>
                                    <th width="15%">Nama Hama</th>
                                    <th style="display:none;"></th>
                                    <th width="20%">Gejala</th>
                                    <th width="20%">Nilai certainty</th>
                                    <th width="20%">Aksi</th>        
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $count = 1;
                                @endphp
                                @foreach ( $hama as $hama)
                                @foreach($hama->hama_gejala as $gejala)
                                    
                                <tr>
                                    <td>{{ $count++}}</td>
                                    <td style="display:none;">{{ $hama -> id}}</td>
                                    <td>{{ $hama -> nama}}</td>
                                    <td style="display:none;">{{ $gejala -> id}}</td>
                                    <td>{{ $gejala -> nama}}</td>
                                    <td>{{ $gejala ->pivot->nilai_cf}}</td>
                                    <td>
                                        <a href="#" class="btn btn-info edit">edit</a>
                                        <form action="/ManageDataBasisPengHama/{{ $hama->id }}/{{$gejala->id}}" method="post" class="d-inline">
                                            @method('delete')
                                            @csrf 
                                            <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau dihapus?')">delete</button>  
                                        </form>
                                    </td>
                                </tr>
                                @endforeach
                                @endforeach
                            </tbody>
                            </table>
                        </div>
                    <!-- /.card-body -->
                    </div>
                    <!-- /.card -->
                </div>
            </div>
        </div>
    </div>
    <!------------------------------------------------- Add Modal -------------------------------------------------->
    <div class="modal fade" id="tambahdatamodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Tambah nilai certainty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            

            <div class="modal-body">
                <form method="post" role="form" id="tambahdataform" action="/ManageDataBasisPengHama">
                @csrf
                    <div class="form-group">
                        <label for="hama">Nama Hama</label>
                        <select class="form-control" name="hama_id">
                        <option disabled selected> -- pilih hama --</option>
                        @foreach($hama2 as $hama2)
                        <option value="{{ $hama2->id }}">{{ $hama2->nama }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="gejala">Nama Gejala</label>
                        <select class="form-control" name="hama_gejala_id">
                        <option disabled selected> -- pilih gejala --</option>
                        @foreach($gejalahama as $gejalahama1)
                        <option value="{{ $gejalahama1->id }}">{{ $gejalahama1->nama }}</option>
                        @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Nilai certainty</label>
                        <input type="text" class="form-control" name="nilai_cf" placeholder="masukan nilai certainty" value="{{old('nilai_cf')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Tambah Data</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    <!------------------------------------------------- End Add Modal ------------------------------------------------->
    <!------------------------------------------------- Edit Modal -------------------------------------------------->
    <div class="modal fade" id="editdatamodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Edit nilai certainty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            

            <div class="modal-body">
                <form method="post" role="form" id="editdataform">
                @method('patch')
                @csrf
                    <div class="form-group">
                        <label for="hama">Nama Hama</label>
                        <input type="text" class="form-control" name="nama_hama" id="nama_hama" disabled>
                    </div>
                    <div class="form-group">
                        <input type="hidden" class="form-control" name="id_gejala" id="id_gejala">
                    </div>
                    <div class="form-group">
                        <label for="gejala">Nama Gejala</label>
                        <input type="text" class="form-control" name="nama_gejala" id="nama_gejala" disabled>
                    </div>
                    <div class="form-group">
                        <label>Nilai certainty</label>
                        <input type="text" class="form-control" name="nilai_cf" id="nilai_cf" placeholder="masukan nilai certainty" value="{{old('nilai_cf')}}">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Ubah Data</button>
                </div>
                </form>
            </div>
            </div>
        </div>
        </div>
    <!------------------------------------------------- End Edit Modal ------------------------------------------------->
@endsection
@section('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">    
        var table =$('#datatable').DataTable();

        //start edit record
        table.on('click', '.edit', function(){

            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            $('#nama_hama').val(data[2]);
            $('#id_gejala').val(data[3]);
            $('#nama_gejala').val(data[4]);
            $('#nilai_cf').val(data[5]);

            $('#editdataform').attr('action', '/ManageDataBasisPengHama/'+data[1]);
            $('#editdatamodal').modal('show');
        });
        $("#tambahdataform").validate({
            rules: {
                "penyakit_id": {
                    required: true
                },
                "penyakit_gejala_id": {
                    required: true
                },
                "nilai_cf": {
                    required: true,
                    number: true,
                    range: [0, 1]
                }
            },
            messages: {
                "penyakit_id": {
                    required: "Silahkan pilih hama untuk ditambahkan"
                },
                "penyakit_gejala_id": {
                    required: "silahkan pilih gejala untuk ditambahkan"
                },
                "nilai_cf": {
                    required: "silahkan masukan nilai cf",
                    number: "silahkan masukan input berupa angka",
                    range: "angka yang diperbolehkan hanya 0 hingga 1 dan gunakan tanda (titik)"
                }
            }
            });
            $("#editdataform").validate({
            rules: {
                "nilai_cf": {
                    required: true,
                    number: true,
                    range: [0, 1]
                }
            },
            messages: {
                "nilai_cf": {
                    required: "silahkan masukan nilai cf",
                    number: "silahkan masukan input berupa angka",
                    range: "angka yang diperbolehkan hanya 0 hingga 1 dan gunakan tanda (titik)"
                }
            }
            });
            setTimeout(function(){
            $(".alert").remove();
        }, 10000 ); // 10 secs
</script>
@endsection

