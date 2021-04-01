@extends('adminlte::page')

@section('title', 'Artikel')

@section('content_header')
    <h1>Article</h1>
@stop

@section('content')
<div class="row">
    <div class="col">
        @if (auth()->user()->level==1 OR
             auth()->user()->level==2 OR
             auth()->user()->level==3 OR
             auth()->user()->level==4  )
        <a href="{{ route('posts.create') }}" class="btn radius-5 padding-2 btn-success mb-3 btn-space">
            <i class="fas fa-plus mr-2"></i> Create Article</a>
            @endif
            <div class="text-center">
                @if(session('pesan'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{session('pesan')}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                @endif
            </div>
        <div class="panel panel-table">
            <div class="panel-heading">
                
            </div>
            <?php $no = 1; ?>
            <div class="panel-body">
                <table id="myTable" class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <!-- <tbody> -->
                        @foreach($posts as $post)
                        <tr>

                            <td>{{ $no++ }}</td>
                            <td>{{ $post->title}}</td>
                            <td>
                                <form action="{{ route('posts.destroy',$post->id) }}" method="POST">
                                <a href="{{ route('posts.show',$post->id) }}" class="badge-pill badge badge-info">Show</a>
                                @if (auth()->user()->level==3 OR
                                auth()->user()->level==4 OR
                                auth()->user()->level==6 )
                                <a href="{{ route('posts.edit',$post->id) }}" class="badge-pill badge badge-primary">Edit</a>
                                @endif
                                @csrf
                                @method('DELETE')
                                
                                @if (auth()->user()->level==5 OR
                                auth()->user()->level==6 OR
                                auth()->user()->level==7 )
                                <button type="submit" class="badge-pill badge badge-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
                                @endif
                            </form>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.box-body -->
        </div>
        <!-- /.box -->
    </div>
</div>
<!-- /.row -->

{!! $posts->links() !!}
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    
@endpush
@stop
