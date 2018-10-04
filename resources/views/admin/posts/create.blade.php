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
                <div class="form-group">
                    <label for="title" class="col-sm-4 col-form-label">Post Title</label>
                    <div class="col-md-12">
                        <input type="text" name="title" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="categories" class="col-sm-4 col-form-label">Post Categories</label>
                    <div class="col-md-12">
                       <select name="category_id" id="category" class="form-control">
                           @foreach($categories as $category)
                              <option value="{{$category->id}}">{{$category->name}}</option>
                           @endforeach
                       </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="featured" class="col-sm-4 col-form-label">Post Featured Image</label>
                    <div class="col-md-12">
                        <input type="file" name="featured" class="form-control">
                    </div>
                </div>
                <div class="form-group">
                    <label for="featured" class="col-sm-4 col-form-label">Select Tags</label>
                    @foreach ($tags as $tag)  
                        <div class="checkbox">
                            <label class="col-sm-4 col-form-label"><input type="checkbox" value="{{$tag->id}}" name=tags[]>
                                {{$tag->tag}}
                            </label>
                        </div>
                   @endforeach
                </div>
                <div class="form-group">
                    <label for="content" class="col-sm-4 col-form-label">Post Content</label>
                    <div class="col-md-12">
                        <textarea name="content" id="content" cols="20" rows="5" class="form-control"></textarea>
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
