@extends ('layouts.master')

@section('title', 'Diagnosa Penyakit')

@section('content')
<div class="content-wrapper">
    <div class="content-header">
        <div class="content">
            <div class="container-fluid">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Pilih gejala</h3>
                    </div>
                        <div class="card-body table-responsive-md">
                        @if (session('danger'))
                            <div class="alert alert-danger">
                                {{ session('danger') }}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                            <form action="/HasilDiagnosaPenyakit" method="post">
                            {{ csrf_field() }}
                                <div class="form-group">
                                    <table id="datatable"class="table table-bordered" data-page-length='10'>
                                    <thead>
                                        <tr>
                                            <th scope="col" width="10%">Gejala</th>
                                            <th scope="col" width="1%"></th>         
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($gejala as $gejala)
                                        <tr>
                                            <td>{{ $gejala->nama }}</td>
                                            <td><input type="checkbox" name="gejala[]" value="{{ $gejala->id }}"></td>
                                            
                                        </tr>
                                        @endforeach
                                    </tbody>
                                    </table>
                                    <button type="submit" class="btn btn-success float-right">Diagnosa</button>
                                </div>
                            </form>
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
         
        $('form').on('submit', function(e){
            var $form = $(this);

            table.$('input[type="checkbox"]').each(function(){
                if(!$.contains(document, this)){
                    if(this.checked){
                        $form.append(
                        $('<input>')
                            .attr('type', 'hidden')
                            .attr('name', this.name)
                            .val(this.value)
                        );
                    }
                } 
            });          
        });
</script>
@endsection