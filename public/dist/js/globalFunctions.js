$(function(){

    var country = $('#country'),
        city = $('#city'),
        csrf = $("input[name=_token]").val(),
        currentCountry = country.find(":selected").val(),
        currentCityID = $('#currentCityID').val(),
        showHotelsButton = $('#showHotels'),
        hotelsTable = $('#hotelTable tbody');


    $('.sidebar-menu').tree();
    $('#table_id').DataTable();

    /****************************************************/

    function GetCityAjax(countryID,currentCityID = null)
    {
        $.ajax({
            type:'POST',
            url:'/getCity',
            data:{_token:csrf,countryID:countryID},

            success:function(response) {

                var cityOptionsData = '',
                    cities = response.cities;

                for (var counter = 0;cities.length>counter;counter++)
                {
                    var cityData =  cities[counter],
                        selected = '';

                    if(currentCityID == cityData.id)
                    {
                        selected = ' selected'
                    }


                    cityOptionsData+='<option value= '+ cityData.id +' '+ selected +' > '+cityData.city_name+' </option>';
                }

                city.html(cityOptionsData);

            }
        });
    }

    /****************************************************/
    function GetCity() {
        var _this = $(this),
            countryID = _this.val();

        GetCityAjax(countryID);

    }

    country.on("change",GetCity);
    /*********************************************************/

    function GetCityOnload() {

        GetCityAjax(currentCountry,currentCityID);

    }
    GetCityOnload();

    /*********************************************************/

    function ShowHotelsTables()
    {
        var CityId = city.find(":selected").val();

        $.ajax({
            type:'POST',
            url:'/getHotels',
            data:{_token:csrf,CityId:CityId},

            success:function(response) {

                var  hotels = response.hotels,
                table = '<tr>';
                console.log(hotels);

                for (var counter = 0;hotels.length>counter;counter++) {
                    var hotelDate = hotels[counter];
                    table+='<td>'+
                        hotelDate.hotel_name +
                        '</td>'+
                        '<td>'+
                        hotelDate.hotel_description +
                        '</td>'+
                        '<td>' +
                        '<a href=hotels/' +
                        + hotelDate.id +
                        '/edit>' +
                        '<button class="btn btn-info">Edit</button></a>'+
                        '<a href=hotels/delete/' +
                        + hotelDate.id +
                        '>' +
                        '<button class="btn btn-danger">Delete</button></a>'+

                        '</td>'+

                    '</tr>'
                }

                hotelsTable.html(table);
            }
        });



    }

    showHotelsButton.on('click',ShowHotelsTables);

    /*********************************************************/


});


var map,
    markers = [],
    latitude =  parseFloat(document.getElementById('lat').value),
    longitude = parseFloat(document.getElementById('long').value);

function initMap() {
    // var haightAshbury = {lat: 26.8206, lng: 30.8025};
    var haightAshbury = {lat: latitude, lng: longitude};

    map = new google.maps.Map(document.getElementById('map'), {
        zoom: 10,
        center: haightAshbury,
        mapTypeId: 'terrain'
    });

    // This event listener will call addMarker() when the map is clicked.
    map.addListener('click', function(event) {
        addMarker(event.latLng);
    });

    // Adds a marker at the center of the map.
    addMarker(haightAshbury);
}

// Adds a marker to the map and push to the array.
function addMarker(location) {
    var marker = new google.maps.Marker({
        position: location,
        map: map
    });
    setMapOnAll(null);
    markers.push(marker);

    var lat = location.lat;
    var lng = location.lng;

    $('#lat').val(lat);
    $('#long').val(lng);


}



// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}

// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}

// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}

// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}
