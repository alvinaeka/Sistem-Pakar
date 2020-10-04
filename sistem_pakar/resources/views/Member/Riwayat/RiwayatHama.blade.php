@extends ('layouts.master')

@section('title', 'Riwayat hama')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">Riwayat Diagnosa hama</h3>
                            </div>
                            <!-- /.card-header -->
                            <div class="card-body table-responsive-md">
                                <table id="datatable"class="table table-hover" data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th scope="col" width="1%"></th>
                                            <th scope="col" width="15%">Nama hama</th>
                                            <th scope="col" width="20%">Gejala dipilih</th>
                                            <th scope="col" width="20%">Nilai keyakinan</th>            
                                            <th scope="col" width="20%">Penanganan</th>            
                                            <th scope="col" width="20%">Waktu</th>            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach($riwayat as $valueriwayat)
                                        <tr>
                                        <td>{{ $loop->iteration }}</td>                                 
                                        <td> {{$valueriwayat["nama_hama"]}} </td>
                                        <td>
                                            @foreach($valueriwayat["nama_gejala"] as $namagejala)
                                                <li> {{$namagejala}} </li>
                                            @endforeach
                                        </td>
                                        <td>{{$valueriwayat["nilai_cf"]}}%</td>
                                        <td>{{$valueriwayat["penanganan"]}}</td>
                                        <td>{{$valueriwayat["created_at"]}}</td>
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
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">    
        var table=$('#datatable').DataTable({
            "lengthMenu": [[10,-1],[10,"All"]]
        });
</script>
@endsection