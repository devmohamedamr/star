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

                $.each(response.cities,function(key,value)
                {
                    city.html('<option value=' + value.id + '>' + value.city_name + '</option>');
                });
            }
        });

    }

    country.on('change',GetCity);




});