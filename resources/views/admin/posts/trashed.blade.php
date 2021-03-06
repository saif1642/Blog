@extends('layouts.app')

@section('content')
  <table class="table table-hover">
      <thead>
          <th>Image</th>
          <th>Title</th>
          <th>Edit</th>
          <th>Restore</th>
          <th>Delete</th>
      </thead>
      <tbody>
          @if($posts->count() >0)
            @foreach($posts as $post)
            <tr>
                <td>
                    <img src="{{$post->featured}}" alt="post_image" width="50px">
                </td>
                <td>
                    {{$post->title}}
                </td>
                <td>
                    Edit
                </td>
                    <td>
                        <a href="{{route('post.restore',[ 'id' => $post->id])}}" class="btn btn-xs btn-success">
                            Restore
                        </a>
                    </td>
                    <td>
                        <a href="{{route('post.kill',[ 'id' => $post->id])}}" class="btn btn-xs btn-danger">
                            Delete
                        </a>
                    </td>
                
            </tr>
            @endforeach
          @else
             <tr>
                 <th colspan="5">No Trashed Post</th>
             </tr>
          @endif
      </tbody>
  </table>
@stop