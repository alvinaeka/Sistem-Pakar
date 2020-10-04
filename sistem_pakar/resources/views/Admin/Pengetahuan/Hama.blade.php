@extends ('layouts.master')

@section('title', 'Info Hama')

@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Data Hama pohon durian</h3>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive">
                                    <table id="datatable"class="table table-hover" data-page-length='25'>
                                    <thead>
                                        <tr>
                                            <th width="1%"></th>
                                            <th style="display:none;"></th>
                                            <th width="15%">Nama Hama</th>
                                            <th width="20%">Nama lain</th>
                                            <th width="20%">Gejala</th>
                                            <th width="20%">Penanganan</th>        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ( $hama as $hama)
                                        <tr>
                                            <td>{{ $loop->iteration}}</td>
                                            <td style="display:none;">{{ $hama -> id}}</td>
                                            <td>{{ $hama -> nama}}</td>
                                            <td>{{ $hama -> nama_lain}}</td>
                                            <td>
                                                    @foreach($hama->hama_gejala as $gejala)
                                                    <li> {{ $gejala->nama }} </li>
                                                    @endforeach
                                            </td>
                                            <td>{{ $hama -> penanganan}}</td>
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