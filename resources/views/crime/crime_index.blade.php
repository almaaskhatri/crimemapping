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
<a class="btn btn-success pull-right" style="margin-left:38px" href="{{action('CrimeController@create')}}">Add</a>

     <table class="table table-striped">
    <thead>
      <tr>
        <th>ID</th>
        <th>Address</th>
        <th>Description</th>
        <th>Crime DateTime</th>
        <th>CategoryID</th>
        <th>Created Date</th>
        <th>Updated Date</th>
        
      </tr>
    </thead>
    <tbody>
      
      @foreach($crimes as $crime)
      @php
        $date=date('Y-m-d', $crime['date']);
        @endphp
      <tr>
        <td>{{$crime['id']}}</td>
        <td>{{$crime['address']}}</td>
        <td>{{$crime['description']}}</td>
        <td>{{$crime['crime_date_time']}}</td>
        <td>{{$crime['category_id']}}</td>
        <td>{{$crime['created_at']}}</td>
        <td>{{$crime['updated_at']}}</td>
        
        <td class="pull-right"><a href="{{action('CrimeController@edit', $crime['id'])}}" class="btn btn-warning">Edit</a></td>
        <td>
          <form action="{{action('CrimeController@destroy', $crime['id'])}}" method="post">
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