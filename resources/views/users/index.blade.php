@extends('adminlte::page')

@section('title', 'Data User')

@section('content_header')
    <h1>Data User</h1>
@stop

@section('content')
<div class="row">
    <div class="col">
        <a href="{{ route('users.create') }}" class="btn radius-5 padding-2 btn-success mb-3 btn-space">
            <i class="fas fa-plus mr-2"></i> Create User</a>
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
                            <th>Name</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                     <!-- <tbody> -->
                        @foreach($users as $user)
                        <tr>

                            <td>{{ $no++ }}</td>
                            <td>{{ $user->name}}</td>
                            <td>{{ $user->email}}</td>
                            <td>{{ $user->idakses}}</td>
                            <td>
                                <form action="{{ route('users.destroy',$user->id) }}" method="POST">

                    
                                    <a class="badge-pill badge badge-primary" href="{{ route('users.edit',$user->id) }}">Edit</a>
                   
                                    @csrf
                                    @method('DELETE')
                      
                                    <button type="submit" class="badge-pill badge badge-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')">Delete</button>
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

{!! $users->links() !!}
@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    
@endpush
@stop
