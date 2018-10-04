@extends('layouts.app')

@section('content')
  <table class="table table-hover">
      <thead>
          <th>Category Name</th>
          <th>Editing</th>
          <th>Deleting</th>
      </thead>
      <tbody>
          @if($categories->count()>0)
            @foreach($categories as $category)
            <tr>
                <td>
                    {{ $category->name }}
                </td>
                <td>
                    <a href="{{route('category.edit',[ 'id' => $category->id])}}" class="btn btn-xs btn-info">
                        Edit
                        <span class="gylphicon gylphicon-pencil"></span>
                    </a>
                </td>
                <td>
                    <a href="{{route('category.delete',[ 'id' => $category->id])}}" class="btn btn-xs btn-danger">
                        Delete
                        <span class="gylphicon gylphicon-danger"></span>

                    </a>
                </td>
            </tr>
            @endforeach
          @else
            <tr>
                <th colspan="5">No categories Found!!</th>
            </tr>
          @endif
      </tbody>
  </table>
@stop