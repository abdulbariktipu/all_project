@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard - {{ auth()->user()->user_type==1 ? 'Admin':'User' }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    
                    <table class="table table-bordered">
                        <thead>
                            <th>Name</th>
                            <th>Email</th>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <th>{{ $student->name }}</th>
                                <th>{{ $student->email }}</th>
                            </tr>
                             @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
