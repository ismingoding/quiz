@extends('layout.layout')
@section('content')
 <div class="content-body">
    
    <div class="row page-titles mx-0">
        <div class="col p-md-0">
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="javascript:void(0)">{{ $title }}</a></li>
                    <li class="breadcrumb-item active"><a href="javascript:void(0)">{{ $title }}</a></li>
            </ol>
    </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    @foreach ($data_profile as $d)
                    <form method="POST" action="/profile/updateprofile/{{ $d->id }}">
                    @csrf
                        <div class="card-body">
                            <div class="d-flex align-items-center">
                                <h4 class="card-title">{{ $title }}</h4>
                            </div>
                            <hr>
                            <input type="hidden" name="role" value="{{ $d->role }}" required>
                            <div class="form-group">
                                <label for="">Nama Lengkap</label>
                                <input type="text" class="form-control" name="name" value="{{ $d->name }}" placeholder="Nama Lengkap ...">
                            </div>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Email</label>
                                        <input type="email" class="form-control" value="{{ $d->email }}" name="email" placeholder="Email ...">  
                                    </div> 
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="">Password</label>
                                        <input type="password" class="form-control"  name="password" placeholder="Password ...">  
                                    </div>     
                                </div>
                            </div>       
                        </div>
                        <div class="card-footer">
                                <button type="submit" class="btn btn-primary"><i class="fa fa-save">Save Changes</i></button>
                        </div>
                    </form>
                    @endforeach
                </div>
            </div>
        </div>
    </div>

@endsection