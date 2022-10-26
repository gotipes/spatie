@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    Create New Client
                </div>
                <div class="card-body">
                    
                    @if(session('error'))
                    <div class="alert alert-danger mb-3">
                        {{ session('error') }}
                    </div>
                    @endif

                    <form method="post" action="{{ route('client.store') }}">
                        @csrf
                        <div class="form-group mb-3">
                            <label for="">Name</label>
                            <input name="name" type="text" class="form-control form-control-sm @error('name') is-invalid @enderror" autocomplete="off">
                            @error('name')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Email</label>
                            <input name="email" type="email" class="form-control form-control-sm @error('email') is-invalid @enderror" autocomplete="off">
                            @error('email')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Password</label>
                            <input name="password" type="password" class="form-control form-control-sm @error('password') is-invalid @enderror" autocomplete="off">
                            @error('password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mb-3">
                            <label for="">Password Confirmation</label>
                            <input name="confirm_password" type="password" class="form-control form-control-sm @error('confirm_password') is-invalid @enderror" autocomplete="off">
                            @error('confirm_password')
                                <span class="invalid-feedback">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary px-3">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection