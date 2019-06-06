$(function(){

    var country = $('#country'),
        city = $('#city'),
        csrf = $("input[name=_token]").val(),
        currentCountry = country.find(":selected").val(),
        currentCityID = $('#currentCityID').val();

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


});