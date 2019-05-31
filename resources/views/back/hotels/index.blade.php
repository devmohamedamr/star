@extends('back.dashboard')

@section('content')


<!-- 
<head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
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

<html>
  <body>
    <div id="map"></div>

    <script>
      var customLabel = {
        restaurant: {
          label: 'R'
        },
        bar: {
          label: 'B'
        }
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 12
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBq-lJ9rJ8NIkNWdL3vm2NqiMNOS5Jkh0U&callback=initMap">
    </script>
  </body>
</html> -->




                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="gridSystemModalLabel">Choose location</h4>
                </div>
                <div class="modal-body">
                    <form method="post">

                        <div class="bordered">
                            <div class="form-group ">
                                <label class="control-label " for="date">
                                    Choose your location on map
                                </label>
                                <div class="input-group demo1">
                                    <!--                                                <div class="pure-button pure-button-primary"><i class="fa fa-map-marker"></i></div>-->
                                    <div class="result" id="map-result"></div>
                                    <div id="floating-panel">
                                        <input id="address" type="textbox" value="Egypt">
                                        <input id="submit" type="button" value="Search">
                                        <input name="longitude" type="hidden" id="longitude" value="31.203095700000002" />
                                        <input name="latitude" type="hidden" id="latitude" value="30.037489700000002" />
                                        <input name='service_id' type='hidden' value="{$service_id}" id="service_id" />
                                        <input type="hidden" id="user_id" value="{$pro_id}" />
                                    </div>
                                    <div id="map"></div>
                                </div>
                            </div>
                        </div>



                        <script src="{{asset('bower_components/jquery/dist/jquery.min.js')}}"></script>

<script type="text/javascript">

$(document).ready(function () {
            lng = $('#longitude').val();
            lat = $('#latitude').val();
            $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&key=AIzaSyBq-lJ9rJ8NIkNWdL3vm2NqiMNOS5Jkh0U", function (data) {
                if (data.results[0] != null) {
                    var msssg = data.results[0].formatted_address;
                }
                msg = 'Your Location is : ' + msssg;
                $('#latitude').val(lat);
                $('#longitude').val(lng);
                outputResult(msg);
            });
            var LocText = $("#map-result").text();
            $('#result-location').text(LocText);
            function outputResult(msg) {
                $('#result-location').html(msg);
            }
        });

</script>
                        

    <!-- <h1>category</h1>
    <div class="listar-description">
    </div>
    <li> 
    <a class="btn btn-success" href="{{route('hotels.create')}}">
                            <i class="icon-plus"></i>
                            <span>Add Category</span>
                        </a>
	</li>
<br>
	<table id="table_id" class="display">
    <thead>
        <tr>
            <th>title</th>
            <th>description</th>
            <th>control</th>
        </tr>
    </thead>
    <tbody> -->
{{--        @foreach($category as $cat)--}}
{{--        <tr>--}}
{{--            <td>{{$cat->title}}</td>--}}
{{--            <td>{{$cat->description}}</td>--}}
{{--            <th>--}}
{{--                <div class="dropdown">--}}
{{--                <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">action--}}
{{--                <span class="caret"></span></button>--}}
{{--                <ul class="dropdown-menu">--}}
{{--                    <li><a href="{{url('hotels/'.$cat->id.'/edit')}}">update</a></li>--}}
{{--                    <li><a href="{{ url('delete/'.$cat->id )}}">delete</a></li>--}}
{{--                </ul>--}}
{{--                </div>--}}
{{--            </th>--}}
{{--        </tr>--}}
{{--        @endforeach--}}
    </tbody>
</table>


@endsection