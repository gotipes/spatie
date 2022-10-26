@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Forbidden') }}</div>

                <div class="card-body">
                    You do not have the required authorization.
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
