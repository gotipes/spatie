@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Admin Management') }}</div>

                <div class="card-body">
                    <a href="" class="btn btn-primary btn-sm px-3 mb-3">Add New Admin</a>
                    <table class="table table-bordered">
                        <tr>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Action</th>
                        </tr>
                        <tr>                            
                        @foreach ($users as $user)
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                <a href="" class="btn btn-warning btn-sm px-3">Edit</a>
                                <a href="" class="btn btn-danger btn-sm px-3">Delete</a>
                            </td>
                        @endforeach
                        </tr>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
