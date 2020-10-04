@extends ('layouts.master')

@section('title', 'Manage Data Latih Hama')

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
                @if (session('statusinfo'))
                <div class="alert alert-info">
                    {{ session('statusinfo') }}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                @endif
                @isset($alert)
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                            @foreach($alert as $valalert)
                                <li>{{ $valalert }}</li>
                            @endforeach
                            
                    </div>
                @endisset
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                            
                    </div>
                @endif
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Data Latih Hama</h3>
                        <button type="button" class="btn btn-success float-right" data-toggle="modal" data-target="#tambahdatamodal">
                            Tambah data
                        </button>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body table-responsive-md">
                        <table id="datatable"class="table table-hover" data-page-length='25'>
                            <thead>
                                <tr>
                                    <th width="13%">Pengujian ke-</th>            
                                    <th width="30%">Nama Hama</th>
                                    <th width="35%">Nama Gejala</th>          
                                    <th >Aksi</th>          
                                </tr>
                            </thead>
                            <tbody>
                            @foreach($datalatih as $valuedatalatih)
                            <tr>                              
                                <td> {{$valuedatalatih["pengujian_ke"]}} </td>
                                <td> {{$valuedatalatih["nama_hama"]}} </td>
                                <td>
                                    @foreach($valuedatalatih["nama_gejala"] as $namagejala)
                                        <li> {{$namagejala}} </li>
                                    @endforeach
                                </td>
                                <td>
                                
                                    <button type="button" class="btn btn-primary edit-category" data-toggle="modal" data-target="#editdatamodal" data-pengujian="{{ $valuedatalatih['pengujian_ke'] }}" data-hama="{{ $valuedatalatih['id_hama']}}" data-gejala="{{ json_encode($valuedatalatih['id_gejala'])}}">Edit</button>
                                    <form action="/ManageDataLatihHama/{{ $valuedatalatih['pengujian_ke'] }}/" method="post" class="d-inline">
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
                </div>
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
                        <form method="post" role="form" id="tambahdataform" action="/ManageDataLatihHama">
                        @csrf
                        <div class="form-group">
                            <label for="hama">Nama Hama</label>
                            <select class="form-control" name="hama_id">
                            <option disabled selected> -- pilih hama --</option>
                            @foreach($hamas as $hama)
                            <option value="{{ $hama->id }}">{{ $hama->nama }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="form-group" id="gejalaform">
                            <label for="gejala">Nama Gejala</label>
                            <div class="row">
                                <div class="col-10">
                                    <select class="form-control float-left" name="gejala_id[]" id="gejala_id">
                                    <option disabled selected> -- pilih gejala --</option>
                                    @foreach($gejalas as $gejala)
                                    <option value="{{ $gejala->id }}">{{ $gejala->nama }}</option>
                                    @endforeach
                                    </select> 
                                </div>
                                    <a href= "#" class="my-auto fas fa-plus-square fa-2x" style="color:green" id = "add"></a>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="submit" class="btn btn-success float-right">Tambah Data</button>
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
                    <h5 class="modal-title" id="exampleModalLabel">Tambah nilai certainty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            

            <div class="modal-body">
                <form method="post" id="editdataform" action="">
                @method('patch')
                @csrf
                    <div class="form-group">
                        <label for="hama">Nama Hama</label>
                        <select class="form-control" name="hama_id" id="selecthama">
                        <option disabled> -- pilih gejala -- </option>
                        @foreach($hamas as $pen)
                        <option value="{{ $pen->id }}">{{ $pen->nama }}</option>
                        @endforeach
                        </select>
                    </div>
                    <label for="gejala">Nama Gejala</label>
                    <div class="form-group" id="edit_gejala">
                        <select class="form-control" name="gejala_id[]" id="selectgejala">
                        @foreach($gejalas as $gejalashama)
                        <option value="{{ $gejalashama->id }}">{{ $gejalashama->nama }}</option>
                        @endforeach
                        </select>
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
    <!------------------------------------------------- End Edit Modal ------------------------------------------------->
@endsection
@section('scripts')
<script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
<script type="text/javascript" >
        $('#datatable').DataTable();
        var gejalas =  eval({!! $gejalas !!});
        $(document).ready(function(){
            $(document).on('click', '#add', function(){
                add();
            });
            $(document).on('click', '#add_edit', function(){
                add_edit();
            });
            $(document).on('click', '#remove', function(){
                $(this).closest('div').remove();
            });
            $('.edit-category').on('click', function() {
                var pengujian = $(this).attr('data-pengujian');
                var hama = $(this).data('hama');
                var gejala = $(this).data('gejala');
                var url = "{{ url('ManageDataLatihHama') }}/" + pengujian;
                $('#editdatamodal form').attr('action', url);
                $('#selecthama').val(hama);
                $('#edit_gejala').empty();
                for(i=0;i<gejala.length;i++){
                    if(i==0){
                        var add =  '<div class="row"><div class="col-10"><select name="gejala_id[]" id="gejala_id'+i+'" class="form-control"><option disabled> -- pilih gejala -- </option>';
                        $.each(gejalas,function(ind,value){
                            add+='<option value="'+value.id+'"> '+value.nama+'</option>';
                        });
                        add+='</select></div>';
                        add+='<a href= "#" class="my-auto fas fa-plus-square fa-2x" style="color:green" id="add_edit"></a></div>';
                        $('#edit_gejala').append(add);
                        $('#gejala_id'+i).val(gejala[i]);
                    }else{
                        var add =  '<div class="row"><div class="col-10"><select name="gejala_id[]" id="gejala_id'+i+'" class="form-control"><option disabled> -- pilih gejala -- </option>';
                        $.each(gejalas,function(ind,value){
                            add+='<option value="'+value.id+'"> '+value.nama+'</option>';
                        });
                        add+='</select></div>';
                        add+='<a href= "#" class="my-auto fas fa-minus-square fa-2x" style="color:red" id = "remove"></a></div>';
                        $('#edit_gejala').append(add);
                        $('#gejala_id'+i).val(gejala[i]);
                    }
                }
            });
            $("#tambahdataform").validate({
            rules: {
                "hama_id": {
                    required: true,
                },
                "gejala_id[]": {
                    required: true,
                }
            },
            messages: {
                "hama_id": {
                    required: "Silahkan pilih hama untuk ditambahkan",
                },
                "gejala_id[]": {
                    required: "silahkan pilih gejala untuk ditambahkan"
                }
            }
            });
            $("#editdataform").validate({
            rules: {
                "hama_id": {
                    required: true,
                    maxlength: 50
                },
                "gejala_id[]": {
                    required: true,
                }
            },
            messages: {
                "hama_id": {
                    required: "Silahkan pilih hama untuk diubah",
                },
                "gejala_id[]": {
                    required: "silahkan pilih gejala untuk diubah"
                }
            }
            });
            setTimeout(function(){
            $(".alert").remove();
        }, 10000 ); // 10 secs
        });
        
        function add(){
            var add =  '<div class="row"><div class="col-10"><select name="gejala_id[]" '+' class="form-control"><option disabled selected> -- pilih gejala -- </option>';
            $.each(gejalas,function(ind,value){
                add+='<option value="'+value.id+'"> '+value.nama+'</option>';
            });
            add+='</select></div>';
            add+='<a href= "#" class="my-auto fas fa-minus-square fa-2x" style="color:red" id = "remove"></a></div>';
            $("#gejalaform").append(add);
        }
        function add_edit(){
            var add_edit =  '<div class="row"><div class="col-10"><select name="gejala_id[]" '+' class="form-control"><option disabled selected> -- pilih gejala -- </option>';
            $.each(gejalas,function(ind,value){
                add_edit+='<option value="'+value.id+'"> '+value.nama+'</option>';
            });
            add_edit+='</select></div>';
            add_edit+='<a href= "#" class="my-auto fas fa-minus-square fa-2x" style="color:red" id = "remove"></a></div>';
            $("#edit_gejala").append(add_edit);
        }
    </script>
    
@endsection