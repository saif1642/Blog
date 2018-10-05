@extends('layouts.app')

@section('content')
    @if(count($errors) > 0)
       <ul class="list-group">
           @foreach($errors->all() as $error)
              <li class="list-group-item text-danger">
                  {{$error}}
              </li>
           @endforeach
       </ul>
    @endif
   <div class="card">
       <div class="card-header">
           Edit Your Profile Info
       </div>
       <div class="card-body">
           <form action="{{ route('user.profile.update') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="name" class="col-sm-4 col-form-label">User name</label>
                    <div class="col-md-12">
                        <input type="text" name="name" class="form-control" value="{{$user->name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="email" class="col-sm-4 col-form-label">User Email</label>
                    <div class="col-md-12">
                        <input type="email" name="email" class="form-control" value="{{$user->email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="password" class="col-sm-4 col-form-label">New Password</label>
                    <div class="col-md-12">
                        <input type="text" name="password" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="avatar" class="col-sm-4 col-form-label">Change Avatar</label>
                    <div class="col-md-12">
                        <input type="file" name="avatar" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="facebook" class="col-sm-4 col-form-label">Facebook Profile</label>
                    <div class="col-md-12">
                        <input type="text" name="facebook" class="form-control" value="{{$user->profile->facebook}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="youtube" class="col-sm-4 col-form-label">Youtube Profile</label>
                    <div class="col-md-12">
                        <input type="text" name="youtube" class="form-control" value="{{$user->profile->facebook}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="about" class="col-sm-4 col-form-label">About</label>
                    <div class="col-md-12">
                        <textarea name="about" id="about" cols="75" rows="5" class="form-control">{{$user->profile->about}}</textarea>
                    </div>
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </div>
                    
                </div>
        
           </form>
       </div>
   </div>
@endsection
