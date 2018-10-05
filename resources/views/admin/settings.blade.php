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
           Update site settings
       </div>
       <div class="card-body">
           <form action="{{ route('setting.update') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title" class="col-sm-4 col-form-label">Site Name</label>
                    <div class="col-md-12">
                        <input type="text" name="site_name" class="form-control" value="{{$setting->site_name}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-4 col-form-label">Address</label>
                    <div class="col-md-12">
                        <input type="text" name="address" class="form-control" value="{{$setting->address}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-4 col-form-label">Contact Email</label>
                    <div class="col-md-12">
                        <input type="email" name="contact_email" class="form-control" value="{{$setting->contact_email}}">
                    </div>
                </div>
                <div class="form-group">
                    <label for="title" class="col-sm-4 col-form-label">Contact Number</label>
                    <div class="col-md-12">
                        <input type="text" name="contact_number" class="form-control" value="{{$setting->contact_number}}">
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
