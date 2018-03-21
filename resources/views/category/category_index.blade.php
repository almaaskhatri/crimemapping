@extends('adminlte::page')

@section('title', 'Create_Category')

@section('content_header')
    <h1>Category List</h1>
@stop

@section('content')
@if (\Session::has('success'))
      <div class="alert alert-success">
        <p>{{ \Session::get('success') }}</p>
      </div><br />
     @endif
<a class="btn btn-success pull-right" style="margin-left:38px" href="{{action('CategoryController@create')}}">Add</a>

     <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Icon</th>
        <th>Created Date</th>
        <th>Updated Date</th>
               
      </tr>
    </thead>
    <tbody>
      
      @foreach($categories as $category)
      @php
        $date=date('Y-m-d', $category['date']);
        @endphp
      <tr>
        <td>{{$category['id']}}</td>
        <td>{{$category['name']}}</td>
        <td>{{$category['icon']}}</td>
        <td>{{$category['created_at']}}</td>
        <td>{{$category['updated_at']}}</td>
        
        <td class="pull-right"><a href="{{action('CategoryController@edit', $category['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('CategoryController@destroy', $category['id'])}}" method="post">
            @csrf
            <input name="_method" type="hidden" value="DELETE">
            <button class="btn btn-danger" type="submit">Delete</button>
          </form>
        </td>
      </tr>
      @endforeach
    </tbody>
  </table>

@stop