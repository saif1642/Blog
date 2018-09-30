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
           Create a new Post
       </div>
       <div class="card-body">
           <form action="{{ route('post.store') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-control row">
                    <label for="title" class="col-sm-4 col-form-label">Post Title</label>
                    <div class="col-md-12">
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="form-control row">
                    <label for="featured" class="col-sm-4 col-form-label">Post Featured Image</label>
                    <div class="col-md-12">
                        <input type="file" name="featured" class="form-control">
                    </div>
                </div>
                <div class="form-control row">
                    <label for="content" class="col-sm-4 col-form-label">Post Content</label>
                    <div class="col-md-12">
                        <textarea name="content" id="content" cols="20" rows="5" class="form-control"></textarea>
                    </div>
                </div>
                
                <div class="form-control row">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit" name="submit">Submit</button>
                    </div>
                    
                </div>
        
           </form>
       </div>
   </div>
@endsection
