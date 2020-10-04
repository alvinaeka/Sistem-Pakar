@extends ('layouts.master')

@section('title', 'Hasil Diagnosa')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-5">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Gejala dipilih</h5>
                            <table class="table table-borderless">
                                <tbody>
                                @foreach($namagejala as $gejala)
                                    <tr>
                                    <td>{{$gejala->nama}}</td>
                                    <td><input type="checkbox" class="float-right" checked disabled></td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-7">
                        <div class="card">
                            <div class="card-body">
                            <h5 class="card-title">Hasil Diagnosa</h5>
                            <table class="table table-borderless">
                                <tbody>
                                    <tr>
                                    <td width="30%">Nama hama</td>
                                    <td>{{$hamas["nama"]}}</td>
                                    </tr>
                                    <tr>
                                    <td width="30%">Nama lain</td>
                                    <td>{{$hamas["nama_lain"]}}</td>
                                    </tr>
                                    <tr>
                                    <td width="30%">Gejala</td>
                                    <td>
                                            @foreach($hamas->hama_gejala as $gejala)
                                            <li> {{ $gejala->nama }} </li>
                                            @endforeach
                                    </td>
                                    </tr>
                                    <tr>
                                    <td width="30%">Penanganan</td>
                                    <td>{{$hamas["penanganan"]}}</td>
                                    </tr>
                                </tbody>
                            </table>
                            </div>
                            <div class="card-footer bg-success">
                                <medium class="text">Nilai Keyakinan</medium>
                                <medium class="text float-right">{{$nilai_keyakinan}}%</medium>
                            </div>
                        </div>               
                        <div class="float-right">
                        <a href="/DiagnosaHama" class="btn btn-secondary">Kembali</a>
                        <a href="/RiwayatDiagnosaHama" class="btn btn-primary">Lihat riwayat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection