@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        @if(session('success'))
        <div class="col-md-8 alert alert-success mb-3">
            {{ session('success') }}
        </div>
        @endif

        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Client Management') }}</div>

                <div class="card-body">
                    @can('client_create')
                        <a href="{{ route('client.create') }}" class="btn btn-primary btn-sm px-3 mb-3">Add New Client</a>                        
                    @elsecan('create')
                        <button class="btn btn-primary btn-sm px-3 mb-3" disabled>Add New Client</button>
                    @endcan

                    <table class="table table-bordered">
                        <tr>
                            <th>Client Name</th>
                            <th>Client Email</th>
                            <th>Action</th>
                        </tr>                        
                        @foreach ($users as $user)
                        <tr>    
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>
                                @can('client_update') 
                                    @if ($user->id == Auth::id())
                                        <a href="{{ route('client.edit',['id' => $user->id]) }}" class="btn btn-warning btn-sm px-3">Edit</a>                                        
                                    @else
                                        <button class="btn btn-warning btn-sm px-3" disabled>Edit</button>
                                    @endif
                                @endcan
                                @can('client_delete')
                                    <a href="{{ route('client.delete',['id' => $user->id]) }}" class="btn btn-danger btn-sm px-3">Delete</a>
                                @else
                                
                                @endcan
                            </td>
                        </tr>
                        @endforeach
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
