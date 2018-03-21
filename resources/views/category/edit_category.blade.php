@extends('adminlte::page')
@section('title', 'Create_Category')

@section('content_header')
    <h1>Edit Category</h1>
@stop

@section('content')
<form method="post" action="{{action('CategoryController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="name">Name:</label>
            <input type="text" class="form-control" name="name" value="{{$category->name}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="icon">Email</label>
              <input type="text" class="form-control" name="icon" value="{{$category->icon}}">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div></form>
      


@stop