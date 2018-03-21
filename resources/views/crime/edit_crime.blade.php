@extends('adminlte::page')

@section('title', 'Edit Crime')

@section('content_header')
    <h1>Edit Crime</h1>
@stop

@section('content')
<form method="post" action="{{action('CrimeController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address" value="{{$crime->address}}">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{$crime->description}}">
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="crime_date_time">Crime Date Time</label>
              
              <div class="input-group date" id="datetimepicker1">
                <input type="text" class="form-control" name="crime_date_time"  value="{{$crime->crime_date_time}}"/>  <span class="input-group-addon" ><span class="glyphicon-calendar glyphicon"></span></span>
            </div>
            </div>
          </div>
         <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="category_id">Crime Category:</label>
              <select  class="form-control"  name="category_id">
              @foreach($categories as $category)
      
                  <option value="{{$category['id']}}">
        {{$category['name']}}</option>  
               @endforeach
                </select>
            </div>
          </div>

<div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div></form>
      

  <script src="{{ asset('js/jquery-2.2.4.min.js') }}" ></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
 <script src="{{ asset('js/bootstrap-datetimepicker.js') }}" ></script>
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

<script type="text/javascript">
    $('#datetimepicker1').datetimepicker({format : "YYYY-MM-DD hh:mm:ss"});
</script>

@stop