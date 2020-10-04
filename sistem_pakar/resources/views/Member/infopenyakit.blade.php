@extends ('layouts.master')

@section('title', 'Info Hama')

@section('content')
<div class="content-wrapper">
        <div class="content-header">
            <div class="content">
                <div class="container-fluid">
                @php
                    $count = 1;
                @endphp
                @foreach($penyakits as $penyakit)
                @if($count==1)
                <div class="card-deck">
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                        <td width="30%">Nama</td>
                                        <td>{{$penyakit->nama}}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Nama lain</td>
                                        <td>{{$penyakit->nama_lain}}</td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Gejala</td>
                                        <td>
                                            @foreach($penyakit->penyakit_gejala as $gejala)
                                            <li> {{ $gejala->nama }} </li>
                                            @endforeach
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <button class="btn btn-primary detail" data-toggle="modal" data-target="#detaildatamodal" data-nama="{{ $penyakit->nama }}" data-namalain="{{ $penyakit->nama_lain}}" data-penanganan="{{ $penyakit->penanganan }}" data-gejala="{{ json_encode($penyakit->penyakit_gejala)}}"><i class="fas fa-eye"></i> Details</button>
                        </div>
                        @if($count==3)
                        </div>
                        @elseif($loop->last)
                        </div>
                        @endif
                    @php
                    $count+=1;
                    @endphp
                    @if($count==4)
                    @php
                        $count = 1;
                        @endphp
                    @endif
                @endforeach    
            </div>
        </div>
    </div>
</div>
    <!------------------------------------------------- Add Modal -------------------------------------------------->
    <div class="modal fade" id="detaildatamodal" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Detail Data Hama</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            
            <div class="modal-body">
                <table class="table table-borderless">
                    <tbody>
                        <tr>
                            <td width="30%">Nama</td>
                            <td><span id="nama_penyakit"></span></td>
                        </tr>
                        <tr>
                            <td width="30%">Nama lain</td>
                            <td><span id="namalain_penyakit"></span></td>
                        </tr>
                        <tr>
                            <td width="30%">Gejala</td>
                            <td><span id="gejala_penyakit"></span></td>
                        </tr>
                        <tr>
                            <td width="30%">penanganan</td>
                            <td><span id="penanganan_penyakit"></span></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    </div>
    <!------------------------------------------------- End Add Modal ------------------------------------------------->
@endsection
@section('scripts')
<script type="text/javascript">   
        var table=$('#datatable').DataTable({
            "lengthMenu": [[25,-1],[25,"All"]]
        });
        $('.detail').on('click', function() {
                $('#gejala_penyakit').empty();
                var nama = $(this).attr('data-nama');
                var nama_lain = $(this).attr('data-namalain');
                var gejalas = JSON.parse($(this).attr('data-gejala'));
                var penanganan = $(this).attr('data-penanganan');
                $('#nama_penyakit').text(nama);
                $('#namalain_penyakit').text(nama_lain);
                $('#penanganan_penyakit').text(penanganan);
                for(i=0;i<gejalas.length;i++){
                    var gejala = "<li>"+gejalas[i].nama+"</li>";
                    $('#gejala_penyakit').append(gejala);
                }
        });
</script>
@endsection