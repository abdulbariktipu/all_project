@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div style="font-size: 20px;"><span class="badge badge-primary">Edit User Profile</span></div><br><br>
                <div class="card-body" style="margin-bottom: 200px;">
                    <form class="form-horizontal" action="{{ route('profileUpdate', $profileId->id) }}" method="post" enctype="multipart/form-data">

                        {{ csrf_field() }}

                        <div class="form-group row">
                          <label for="user_type" class="col-md-4 col-form-label text-md-right" >Image Upload:</label>
                          <div class="col-md-6">
                              <input type="file" name="filename[]" id="filename">
                              <img src="/upload/{{ $profileId->image_file }}"  class="" alt="{{ $profileId->image_file }}" width="100" height="100" />
                          </div>
                        </div>

                        <div class="form-group row">
                          <label for="user_type" class="col-md-4 col-form-label text-md-right" >Name:</label>
                          <div class="col-md-6">
                              <input type="text" class="form-control" name="user_name" id="user_name" value="{{ $profileId->name }}" required>
                          </div>
                        </div>
                        <div class="form-group row">
                          <label for="user_type" class="col-md-4 col-form-label text-md-right" >User Type:</label>
                          <div class="col-md-6">
                              <select class="form-control" name="user_type" id="user_type">
                                <option value="{{ $profileId->user_type }}">
                                  @if($profileId->user_type==="admin") admin @endif
                                  @if($profileId->user_type==="super_admin") Super Admin @endif
                                  @if($profileId->user_type==="member") Member @endif
                                </option>
                                <option value="admin">Admin</option>
                                <option value="super_admin">Super Admin</option>
                                <option value="member">Member</option>
                              </select>
                          </div>
                        </div>
                        
                        <div class="form-group" align="center">
                            <div class="col-sm-offset-2 col-sm-10">
                                <button type="submit" class="btn btn-default">Submit</button>
                            </div>
                        </div>
                            <iframe src="https://www.facebook.com/plugins/share_button.php?href=http%3A%2F%2F127.0.0.1%3A8000%2FprofileEdit%2F2&layout=button_count&size=small&width=78&height=20&appId" width="78" height="20" style="border:none;overflow:hidden" scrolling="no" frameborder="0" allowTransparency="true" allow="encrypted-media"></iframe>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
