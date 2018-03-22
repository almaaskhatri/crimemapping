@extends('adminlte::page')

@section('title', 'Create_Category')

@section('content_header')
    <h1>Add Category</h1>
@stop

@section('content')
    <form method="post" action="{{url('/storeCrime')}}" enctype="multipart/form-data">
         <input id="longitude" type="number" step="any" name="longitude"  style="visibility:hidden">
            <input id="latitude" type="number" step="any" name="latitude" style="visibility:hidden">

        @csrf
        <div class="row">
          <div class="col-md-4"></div>
          <div class="form-group col-md-4">
            <label for="address">Address:</label>
            <input id="pac-input" type="text" class="form-control" name="address" onchange="get_Long_Lat()">
                        <div id="map"></div>
    <div id="infowindow-content">
      <img src="" width="16" height="16" id="place-icon">
      <span id="place-name"  class="title"></span><br>
      <span id="place-address"></span>
    </div>
 @if ($errors->has('address'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('address') }}</strong>
                                    </span>
                                @endif
               
          </div>
        </div>

                <div class="row">
          <div class="col-md-4"></div>
            <div class="form-group col-md-4">
              <label for="description">description:</label>
              <input type="text" class="form-control" name="description">

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
              <label for="crime_date_time">Crime Date and Time:</label>
             <div class="input-group date" id="datetimepicker1">
                <input type="text" class="form-control" name="crime_date_time" />  <span class="input-group-addon"><span class="glyphicon-calendar glyphicon"></span></span>

                     
            </div>
           @if ($errors->has('crime_date_time'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('crime_date_time') }}</strong>
                                    </span>
                                @endif
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
          <div class="form-group col-md-4">
                        <label for="filename">Upload Image, Audio or Video:</label>

            <input type="file" name="filename" class="form-control" accept="file_extension|audio/*|video/*|image/*|media_type">    

             @if ($errors->has('filename'))
                                    <span class="invalid-feedback">
                                        <strong>{{ $errors->first('filename') }}</strong>
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




<!-- Convert Address to Long and Latitude
-->
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
