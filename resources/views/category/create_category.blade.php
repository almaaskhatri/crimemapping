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
            <label for="name">Category Name:</label>
            <input type="text" class="form-control" name="name">
             @if ($errors->has('name'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                           
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="icon">Icon:</label>
              <input type="file" class="form-control" name="icon">
                 @if ($errors->has('icon'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('icon') }}</strong>
                                    </span>
                                @endif
      
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
