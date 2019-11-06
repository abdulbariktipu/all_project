@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <table class="table table-user-information">
                        <tbody>
                            @foreach ($profileArr as $row)
                            <div class="span2" align="center">
                                <img src="/upload/{{ $row->image_file }}"  class="imgcircle" alt="{{ $row->image_file }}" width="200" height="200" />
                            </div>
                            <br>
                            <tr>
                                <td>Name:</td>
                                <td>{{ $row->name }}</td>
                            </tr>
                            <tr>
                                <td>Email</td>
                                <td>{{ $row->email }}</td>
                            </tr>
                            <tr>
                                <td>User Type:</td>
                                <td>@if($row->user_type==="admin") admin @endif
                                @if($row->user_type==="super_admin") Super Admin @endif
                                @if($row->user_type==="member") Member @endif</td>
                            </tr>
                            <tr>
                                <td>Date of Birth</td>
                                <td>01/24/1988</td>
                            </tr>
                            <tr>
                                <td>Gender</td>
                                <td>Male</td>
                            </tr>
                            <tr>
                                <td>Home Address</td>
                                <td>Dhaka Bangladesh</td>
                            </tr>
                            <tr>
                                <td>Phone Number</td>
                                <td>01737498458</td>
                            </tr>
                            
                            @endforeach
                        </tbody>
                    </table>
                    <hr>
                    <div class="span2" align="center">
                        <a href="{{ route('profileEdit',$row->id) }}">Edit Profile</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
