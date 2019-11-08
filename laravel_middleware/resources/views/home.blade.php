@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - {{ auth()->user()->isAdmin==1 ? 'Admin':'User' }}</div>

                <div class="card-body">
                    @if (session('errors'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('errors') }}
                        </div>
                    @endif

                    <a href="{{ url('/students') }}">All Student</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
