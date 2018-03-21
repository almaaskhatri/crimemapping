@extends('adminlte::page')

@section('title', 'Create_Category')

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')
    <form method="post" action="{{url('/store')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="category_name">Category Name:</label>
            <input type="text" class="form-control" name="category_name">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="icon">Icon:</label>
              <input type="text" class="form-control" name="icon">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>
@stop
