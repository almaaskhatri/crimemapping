@extends('adminlte::page')

@section('title', 'Edit Crime')

@section('content_header')
    <h1>Edit Crime</h1>
@stop

@section('content')
<form method="post" action="{{action('CrimeController@update', $id)}}">
        @csrf
        <input name="_method" type="hidden" value="PATCH">
         <input id="longitude" type="number" step="any" name="longitude" value="{{$crime->longitude}}" style="visibility:hidden">
            <input id="latitude" type="number"  step="any" name="latitude" value="{{$crime->latitude}}" style="visibility:hidden">

        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="address">Address:</label>
            <input id="pac-input" type="text" class="form-control" name="address" value="{{$crime->address}}" onchange="get_Long_Lat()">
             
             <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
@if ($errors->has('Address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('Address') }}</strong>
                                    </span>
                                @endif
 
          </div>
        </div>
        <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">Description</label>
              <input type="text" class="form-control" name="description" value="{{$crime->description}}">
              @if ($errors->has('description'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('description') }}</strong>
                                    </span>
                                @endif
 
            </div>
          </div>
          <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="crime_date_time">Crime Date Time</label>
              
              <div class="input-group date" id="datetimepicker1">
                <input type="text" class="form-control" name="crime_date_time"  value="{{$crime->crime_date_time}}"/>  <span class="input-group-addon" ><span class="glyphicon-calendar glyphicon"></span></span>
                @if ($errors->has('crime_date_time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('crime_date_time') }}</strong>
                                    </span>
                                @endif
 
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
                @if ($errors->has('category_id'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('category_id') }}</strong>
                                    </span>
                                @endif
 
            </div>
          </div>

<div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4" style="margin-top:60px">
            <button type="submit" class="btn btn-success" style="margin-left:38px">Update</button>
          </div>
        </div></form>
      

    <script src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&libraries=places&callback=initMap"
        async defer></script>

  <script src="{{ asset('js/show_address.js') }}" ></script>

  <script src="{{ asset('js/jquery-2.2.4.min.js') }}" ></script>
    <script src="{{ asset('js/moment-with-locales.js') }}"></script>
 <script src="{{ asset('js/bootstrap-datetimepicker.js') }}" ></script>
    <link href="{{ asset('css/bootstrap-datetimepicker.css') }}" rel="stylesheet">

<script type="text/javascript">
    $('#datetimepicker1').datetimepicker({format : "YYYY-MM-DD hh:mm:ss"});
</script>

<script type="text/javascript" src="http://maps.google.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&sensor=false"></script>
<script type="text/javascript">
function get_Long_Lat(){
var geocoder = new google.maps.Geocoder();
var address = document.getElementById("pac-input").value ;

geocoder.geocode( { 'address': address}, function(results, status) {

if (status == google.maps.GeocoderStatus.OK) {
    var latitude = results[0].geometry.location.lat();
    var longitude = results[0].geometry.location.lng();
    document.getElementById("latitude").value= latitude;
    document.getElementById("longitude").value= longitude;
    }
    else{
      alert(status)
    } 
}); 
}
</script>


@stop