@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">{{ __('Role Has Permissions') }}</div>

                <div class="card-body">                    
                    <table class="table table-bordered table-stripped">
                        <tr>
                            <th>User</th>
                            <th>Role</th>
                        </tr>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $user->name }}</td>
                            <td>
                                <ul class="mb-0">
                                @foreach ($user->roles as $role)
                                    <li><i>{{ $role->name }}</i></li>
                                @endforeach
                                </ul>
                            </td>
                        </tr>
                        @endforeach
                    </table>

                </div>
            </div>
        </div>

        <div class="col-md-8 mb-3">
            <div class="card">
                <div class="card-header">{{ __('Role Has Permissions') }}</div>

                <div class="card-body">                    
                    <table class="table table-bordered table-stripped">
                        <tr>
                            <th>Role</th>
                            <th>Permissions</th>
                        </tr>
                        @foreach ($roles as $role)
                        <tr>
                            <td>{{ $role->name }}</td>
                            <td>
                                <ul class="mb-0">
                                @foreach ($role->permissions as $permission)
                                    <li><i>{{ $permission->name }}</i></li>
                                @endforeach
                                </ul>
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
