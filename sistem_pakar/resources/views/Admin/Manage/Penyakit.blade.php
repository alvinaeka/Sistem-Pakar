@extends ('layouts.master')

@section('title', 'Manage Penyakit')

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
                                    <h3 class="card-title">Data Penyakit pohon durian</h3>
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
                                            <th width="8%">Nama Penyakit</th>
                                            <th width="8%">Nama lain</th>
                                            <th width="10%">Penanganan</th>
                                            <th width="5%">Aksi</th>              
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $penyakit as $penyakit)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td style="display:none;">{{ $penyakit -> id}}</td>
                                            <td>{{ $penyakit -> nama}}</td>
                                            <td>{{ $penyakit -> nama_lain}}</td>
                                            <td>{{ $penyakit -> penanganan}}</td>
                                            <td>
                                                <a href="#" class="btn btn-info edit">edit</a>                             
                                                <form action="/ManageDataPenyakit/{{ $penyakit->id }}" method="post" class="d-inline">
                                                    @method('delete')
                                                    @csrf 
                                                    <button type="submit" class="btn btn-danger" onclick="return confirm('yakin mau dihapus?')">delete</button>  
                                                </form>
                                            </td>
                                        </tr>
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah Data Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
        

        <div class="modal-body">
            <form method="post" role="form" id="tambahdataform" action="/ManageDataPenyakit">
            @csrf
                <div class="form-group">
                    <label>Nama Penyakit</label>
                    <input type="text" class="form-control" name="nama" placeholder="masukan nama penyakit" value="{{old('nama')}}">
                    <div class="invalid-danger">{{ $errors->first('nama') }}</div>
                </div>
                <div class="form-group">
                    <label >Nama_lain</label>
                    <input type="text" name="nama_lain" class="form-control" placeholder="masukan nama lain" value="{{old('nama_lain')}}">
                    <div class="text-danger">{{ $errors->first('nama_lain') }}</div>
                </div>
                <div class="form-group">
                    <label >Penanganan Penyakit</label>
                    <textarea class="form-control" name="penanganan" rows="8" placeholder="masukan cara penanganan penyakit" value="{{old('penanganan')}}"></textarea>
                    <div class="text-danger">{{ $errors->first('penanganan') }}</div>
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
    <!------------------------------------------------- Edit Modal ---------------------------------------------------->
        <div class="modal fade" id="editdatamodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">

        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Penyakit</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" role="form" id="editdataform" action="/ManageDataPenyakit">
            @method('patch')
            @csrf
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama Penyakit</label>
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="masukan nama penyakit">
                        <div class="invalid-danger">{{ $errors->first('nama') }}</div>
                    </div>
                    <div class="form-group">
                        <label >Nama Lain</label>
                        <input type="text" class="form-control" name="nama_lain" id="nama_lain" placeholder="masukan nama_lain">
                        <div class="text-danger">{{ $errors->first('nama_lain') }}</div>
                    </div>
                    <div class="form-group">
                        <label >Penanganan Penyakit</label>
                        <textarea class="form-control" name="penanganan" id="penanganan" rows="8" placeholder="masukan cara penanganan penyakit"></textarea>
                        <div class="text-danger">{{ $errors->first('penanganan') }}</div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
                    <button type="submit" class="btn btn-primary">Edit Data</button>
                </div>
                </div>
            </form>
        </div>
        </div>
        </div>
    <!------------------------------------------------ End Edit Modal ---------------------------------------------->
@endsection

@section('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript">
    $(document).ready(function(){
    
        var table =$('#datatable').DataTable({
            responsive: {
                details: false
            }
        });

        //start edit record
        table.on('click', '.edit', function(){

            $tr = $(this).closest('tr');
            if($($tr).hasClass('child')){
                $tr = $tr.prev('.parent');
            }

            var data = table.row($tr).data();
            console.log(data);
            $('#nama').val(data[2]);
            $('#nama_lain').val(data[3]);
            $('#penanganan').val(data[4]);

            $('#editdataform').attr('action', '/ManageDataPenyakit/'+data[1]);
            $('#editdatamodal').modal('show');
        });


        $("#tambahdataform").validate({
            rules: {
                nama: {
                    required: true,
                    maxlength: 50
                },
                penanganan: {
                    required: true,
                }  
            },
            messages: {
                nama: {
                    required: "Nama penyakit wajib diisi",
                    maxlength: "Nama penyakit maksimal 50 karakter"
                },
                penanganan: {
                    required: "Penanganan penyakit wajib diisi",
                },
            }
        });
        $("#editdataform").validate({
            rules: {
                nama: {
                    required: true,
                    maxlength: 50
                },
                penanganan: {
                    required: true,
                }  
            },
            messages: {
                nama: {
                    required: "Nama penyakit wajib diisi",
                    maxlength: "Nama penyakit maksimal 50 karakter"
                },
                penanganan: {
                    required: "Penanganan penyakit wajib diisi",
                },
            }
        });

        setTimeout(function(){
            $(".alert").remove();
        }, 10000 ); // 10 secs
    });
</script>
@endsection
