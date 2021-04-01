@extends('adminlte::page')

@section('title', 'Data User')

@section('content_header')

@stop

@section('content')
<div class="container mt-15">
   
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 240rem;">
            <div class="card-header">
            Tambah User
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <form method="post" action="{{ route('users.store') }}" id="myForm">
            @csrf
                <div class="form-group">
                    <label for="name">Name</label>                    
                    <input type="text" name="name" class="form-control" id="name" aria-describedby="name" >                
                </div>
                <div class="form-group">
                    <label for="email">Email</label>                    
                    <input type="email" name="email" class="form-control" id="email" aria-describedby="email" >                
                </div>
                <div class="form-group">
                    <label for="password">Password</label>                    
                    <input type="password" name="password" class="form-control" id="password" aria-describedby="password" >                
                </div>
            <button type="submit" class="btn btn-primary">Submit</button>
            </form>
            </div>
        </div>
    </div>
    </div>

@push('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.js"></script>

    
@endpush
@stop
