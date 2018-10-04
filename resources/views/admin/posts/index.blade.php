@extends('layouts.app')

@section('content')
  <table class="table table-hover">
      <thead>
          <th>Image</th>
          <th>Title</th>
          <th>Edit</th>
          <th>Delete</th>
      </thead>
      <tbody>
          @foreach($posts as $post)
          <tr>
              <td>
                  <img src="{{$post->featured}}" alt="post_image" width="60px">
              </td>
              <td>
                 {{$post->title}}
              </td>
              <td>
                  
              </td>
              <td>
                
              </td>
          </tr>
          @endforeach
      </tbody>
  </table>
@stop