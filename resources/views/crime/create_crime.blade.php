@extends('adminlte::page')

@section('title', 'Create_Category')

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')
    <form method="post" action="{{url('/storeCrime')}}" enctype="multipart/form-data">
        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="address">Address:</label>
            <input type="text" class="form-control" name="address">
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">description:</label>
              <input type="text" class="form-control" name="description">
            </div>
          </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">Crime Date and Time:</label>
             <div class="input-group date" id="datetimepicker1">
                <input type="text" class="form-control" name="crime_date_time" />  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>
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
          <div class="form-group col-md-4">
            <input type="file" name="filename">    
         </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success">Submit</button>
          </div>
        </div>
      </form>

  <script src="{{ asset('js/jquery-2.2.4.min.js') }}" ></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
 <script src="{{ asset('js/bootstrap-datetimepicker.js') }}" ></script>
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

<script type="text/javascript">
    $('#datetimepicker1').datetimepicker({format : "YYYY-MM-DD hh:mm:ss"});
</script>

@stop
