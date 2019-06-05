$(function(){

    var country = $('#country'),
        city = $('#city'),
        csrf = $("input[name=_token]").val();

    $('.sidebar-menu').tree();
    $('#table_id').DataTable();
    /****************************************************/
    function GetCity() {
        var _this = $(this),
        countryID = _this.val();

        $.ajax({
            type:'POST',
            url:'/getCity',
            data:{_token:csrf,countryID:countryID},

            success:function(response) {

                var cityOptionsData = '',
                cities = response.cities;

                for (var counter = 0;cities.length>counter;counter++)
                {
                    var cityData =  cities[counter];

                    cityOptionsData+='<option value= '+ cityData.id +' > '+cityData.city_name+' </option>';
                }

                city.html(cityOptionsData);

            }
        });

    }

    country.on('change',GetCity);




});