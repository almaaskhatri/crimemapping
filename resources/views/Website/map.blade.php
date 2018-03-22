<!DOCTYPE html>
<html>
  <head>
    <title>Custom Markers</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
    <meta charset="utf-8">
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 100%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 100%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>
  <body>
    <div id="map"></div>
    <script>
      var map;
      function initMap() {
        map = new google.maps.Map(document.getElementById('map'), {
          zoom: 16,
          center: new google.maps.LatLng(
            @if (count($crimes)>0) {{$crimes[0]->latitude}}, {{$crimes[0]->longitude}}
            @else
            {{30.375321}},{{69.341565}}
            @endif),
          mapTypeId: 'roadmap'
        });


        var iconBase = 'http://localhost/crime222/public/icons/';
        var icons = {
           @foreach($categories as $category)
     
          {{$category['name']}}: {
            icon: iconBase + "{{$category['icon']}}"
                      },
      @endforeach
        };

        var features = [
           @foreach($crimes as $crime)
     {
             
            position: new google.maps.LatLng({{$crime->latitude}}, {{$crime->longitude}}),
            type: "{{$crime->name}}"
          }, 
@endforeach
        ];

        // Create markers.
        features.forEach(function(feature) {
          var marker = new google.maps.Marker({
            position: feature.position,
            icon: icons[feature.type].icon,
            map: map
          });
        });
      }
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key={{env('GOOGLE_MAP_API_KEY')}}&callback=initMap">
    </script>
  </body>
</html>