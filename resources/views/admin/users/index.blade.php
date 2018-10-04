@extends('layouts.app')

@section('content')
  <table class="table table-hover">
      <thead>
          <th>Image</th>
          <th>Name</th>
          <th>Permission</th>
          <th>Delete</th>
      </thead>
      <tbody>
          @if($users->count()>0)
            @foreach($users as $user)
            <tr>
                <td>
                    <img src="{{asset($user->profile->avatar )}}" alt="user_image" width="50px">
                </td>
                <td>
                    {{$user->name}}
                </td>
                <td>
                    Permission
                </td>
                
                <td>
                    Delete
                </td>
            </tr>
            @endforeach
          @else
            <tr>
                <th colspan="5">No Post Found!!</th>
                
            </tr>
          @endif
      </tbody>
  </table>
@stop