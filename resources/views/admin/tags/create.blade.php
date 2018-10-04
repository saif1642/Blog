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
           Create a new Tag
       </div>
       <div class="card-body">
           <form action="{{ route('tag.store') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="title" class="col-sm-4 col-form-label">Tag name</label>
                    <div class="col-md-12">
                        <input type="text" name="tag" class="form-control">
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
