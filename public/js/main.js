/* global google */


$(window).load(function () { // makes sure the whole site is loaded
    $('#status').fadeOut(); // will first fade out the loading animation
    $('#preloader').delay(350).fadeOut('slow'); // will fade out the white DIV that covers the website.
    $('body').delay(350).css({'overflow': 'visible'});
});

$('#location-Modal').on('shown.bs.modal', function () {
    getLocation();
});

$(document).ready(function () {

    $("#bg-slider").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 100,
//      autoPlay: 5000,
        paginationSpeed: 100,
        singleItem: true,
        mouseDrag: false,
        transitionStyle: "fade"

                // "singleItem:true" is a shortcut for:
                // items : 1, 
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false 
    });

    $("#testimonial-slider").owlCarousel({
        navigation: false, // Show next and prev buttons
        slideSpeed: 100,
        pagination: false,
        paginationSpeed: 100,
        singleItem: true,
        mouseDrag: false,
        transitionStyle: "goDown"

                // "singleItem:true" is a shortcut for:
                // items : 1, 
                // itemsDesktop : false,
                // itemsDesktopSmall : false,
                // itemsTablet: false,
                // itemsMobile : false 
    });


    $('.more-jobs a').click(function (e) {
        e.preventDefault();
        var $this = $(this);
        $this.toggleClass('more-jobs a');
        if ($this.hasClass('more-jobs a')) {
            $this.text('View less jobs');
        } else {
            $this.text('View more jobs');
        }
    });

    $('.more-jobs a').click(function () {
        $('.table tr.hide-jobs').toggle();
    });

    $('#Carousel').carousel({
        interval: 5000
    });

    $('#category-slider').owlCarousel({
        navigation: true, // Show next and prev buttons
        loop: true,
        margin: 10,
        autoplay: true,
        pagination: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        items: 4,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
    });
    $('#qoutes-slider').owlCarousel({
        navigation: true, // Show next and prev buttons
        loop: true,
        margin: 10,
        autoplay: true,
        pagination: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        items: 4,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
    });
    $('#services-slider').owlCarousel({
        navigation: true, // Show next and prev buttons
        loop: true,
        margin: 10,
        autoplay: true,
        pagination: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        items: 4,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
    });
    $('#trend-slider').owlCarousel({
        navigation: true, // Show next and prev buttons
        loop: true,
        margin: 10,
        autoplay: true,
        pagination: false,
        autoplayTimeout: 1000,
        autoplayHoverPause: true,
        items: 4,
        navigationText: ["<i class='fa fa-chevron-left'></i>", "<i class='fa fa-chevron-right'></i>"]
    });


//    $("body").on("click", ".progress_bar .step.complete", function () {
//        var from = $(this).parent().find('.current').data('step');
//        var to = $(this).data('step');
//        var dir = "desc";
//        if (from < to)
//            dir = "asc";
//
//        step_process(from, to, dir);
//    });

    $(".btn-pref .btn").click(function () {
        $(".btn-pref .btn").removeClass("btn-primary").addClass("btn-default");
        // $(".tab").addClass("active"); // instead of this do the below 
        $(this).removeClass("btn-default").addClass("btn-primary");
    });
});

$("#signupform").formToWizard({
    submitButton: 'submitBtn',
    nextBtnName: 'next',
    prevBtnName: 'prev',
//    showStepNo: true,
    nextBtnClass: 'btn btn-primary next butt',
    prevBtnClass: 'btn btn-primary prev butt',
    buttonTag: 'button',
    progress: function (i, count) {
        $("#progress-complete").width('' + (i / count * 100) + '%');
        $("#progress-percent").html('' + (i / count * 100) + '%' + ' complete');
//         getLocation();
        if (i === 3) {
            getLocation();
        }
    }
});
$("#msform").formToWizard({
    submitButton: 'submitBtn',
    nextBtnName: 'next',
    prevBtnName: 'prev',
//    showStepNo: true,
    nextBtnClass: 'btn btn-primary next butt',
    prevBtnClass: 'btn btn-primary prev butt',
    buttonTag: 'button',
    progress: function (i, count) {
        $("#progress-complete").width('' + parseInt(i / count * 100) + '%');
        $("#progress-percent").html('' + parseInt(i / count * 100) + '%' + ' complete');
    }

});

$('#Get-Start').click(function () {
    $('#main-form').css({'display': 'block'});
    $('.start-page').css({'display': 'none'});

});
$('#submitBtn').click(function () {
    $('#main-form').css({'display': 'none'});
//    $('.start-page').css("display", "none");
    $('.end-page').css({'display': 'block'});

});


//$('#form-Modal').modal({
//    backdrop: 'static',
//    keyboard: false
//})
// Initializing WOW.JS

new WOW().init();

function step_process(from, to, dir) {
    if (typeof (dir) === 'undefined')
        dir = 'asc';
    var old_move = '';
    var new_start = '';

    var speed = 500;

    if (dir === 'asc') {
        old_move = '-';
        new_start = '';
    } else if (dir === 'desc') {
        old_move = '';
        new_start = '-';
    }

    $('#block' + from).animate({left: old_move + '100%'}, speed, function () {
        $(this).css({left: '100%', 'background-color': 'transparent', 'z-index': '2'});
    });
    $('#block' + to).css({'z-index': '3', left: new_start + '100%'}).animate({left: '0%'}, speed, function () {
        $(this).css({'z-index': '2'});
    });

    if (Math.abs(from - to) === 1) {
        // Next Step
        if (from < to) {
            $("#Workstep" + from).addClass('complete').removeClass('incomplete');
            $("#Workstep" + (from + 1)).addClass('current').removeClass('incurrent');
        } else {
            $("#Workstep" + (from - 1)).addClass('incomplete').removeClass('complete');
            $("#Workstep" + from).addClass('incurrent').removeClass('current');

        }
    }

}


$('#Cat-Modal').on('shown.bs.modal', function () {
    $('#myInput').focus();
});

$('#Map-Modal').on('shown.bs.modal', function () {
    getLocation();
});

$('#submitmap').click(function () {
    var LocText=$("#map-result").text();
    $('#result-location').text(LocText);
    
});





function getLocation() {
    var msg;
    
    console.log('here');
    
    /** 
     first, test for feature support
     **/
    if ('geolocation' in navigator) {
        // geolocation is supported :)
        requestLocation();
    } else {
        // no geolocation :(
        msg = "Sorry, looks like your browser doesn't support geolocation";
        outputResult(msg); // output error message
    }



    /*** 
     requestLocation() returns a message, either the users coordinates, or an error message
     **/
    function requestLocation() {
        /**
         getCurrentPosition() below accepts 3 arguments:
         a success callback (required), an error callback  (optional), and a set of options (optional)
         **/

        var options = {
            // enableHighAccuracy = should the device take extra time or power to return a really accurate result, or should it give you the quick (but less accurate) answer?
            enableHighAccuracy: false,
            // timeout = how long does the device have, in milliseconds to return a result?
            timeout: 5000,
            // maximumAge = maximum age for a possible previously-cached position. 0 = must return the current position, not a prior cached position
            maximumAge: 0
        };

        // call getCurrentPosition()
        navigator.geolocation.getCurrentPosition(success, error, options);

        // upon success, do this
        function success(pos) {
            // get longitude and latitude from the position object passed in
            var lng = pos.coords.longitude;
            var lat = pos.coords.latitude;
            var marker;
            var markersArray = [];
            var coords = new google.maps.LatLng(lat, lng);
            var map = new google.maps.Map(document.getElementById('map'), {
                center: {lat: lat, lng: lng},
                zoom: 10,
                zoomControl: true,
                streetViewControl: false,
                fullscreenControlOptions: {
                    position: google.maps.ControlPosition.RIGHT_BOTTOM
                },
                zoomControlOptions: {
                    position: google.maps.ControlPosition.LEFT_BOTTOM
                }
            });

            marker = new google.maps.Marker({
                position: coords,
                map: map
            });
            markersArray.push(marker);
            Displayname(lat, lng);
            google.maps.event.addListener(map, 'click', function (event) {
                placeMarker(event.latLng);
            });

            $('#floating-panel').css({'display': 'block'});



            function clearOverlays() {
                for (var i = 0; i < markersArray.length; i++) {
                    markersArray[i].setMap(null);
                }
                markersArray.length = 0;
            }

            function placeMarker(location) {
                clearOverlays();
                marker = new google.maps.Marker({
                    position: location,
                    map: map
                });
                markersArray.push(marker);
//                var infowindow = new google.maps.InfoWindow({
////                    content: 'Latitude: ' + location.lat() + '<br>Longitude: ' + location.lng()
//                    content: msg
//                });
//                infowindow.open(map, marker);
                var lat = location.lat();
                var lng = location.lng();
                Displayname(lat, lng);
            }

            var geocoder = new google.maps.Geocoder();
            document.getElementById('submit').addEventListener('click', function () {
                geocodeAddress(geocoder, map);
            });
            function geocodeAddress(geocoder, resultsMap) {
                var address = document.getElementById('address').value;
                geocoder.geocode({'address': address}, function (results, status) {
                    if (status === 'OK') {
                        clearOverlays();
                        resultsMap.setCenter(results[0].geometry.location);
                        marker = new google.maps.Marker({
                            position: results[0].geometry.location,
                            map: map
                        });
                        var lat = results[0].geometry.location.lat();
                        var lng = results[0].geometry.location.lng();
                        markersArray.push(marker);
                        Displayname(lat, lng);
                    } else {
                        alert('Search was not successful for the following reason: ' + status);
                    }
                });
            }
            function Displayname(lat, lng) {
                $.getJSON("https://maps.googleapis.com/maps/api/geocode/json?latlng=" + lat + "," + lng + "&key=AIzaSyBq-lJ9rJ8NIkNWdL3vm2NqiMNOS5Jkh0U", function (data) {
                    if (data.results[0] != null) {
                        var msssg = data.results[0].formatted_address;
                    }
                    msg = 'Your Location is : ' + msssg;
                    $('#latitude').val(lat);
                    $('#longitude').val(lng);
                    outputResult(msg);
                });
            }
        }


        // upon error, do this
        function error(err) {
            // return the error message
            msg = 'Error: ' + err + ' :(';
            outputResult(msg); // output button
        }
    } // end requestLocation();
//    google.maps.event.addDomListener(window, 'load', initialize);
    /*** 
     outputResult() inserts msg into the DOM  
     **/
    function outputResult(msg) {
        $('.result').addClass('result').html(msg);
    }
} // end getLocation()



// attach getLocation() to button click
$('.pure-button').on('click', function () {
    // show spinner while getlocation() does its thing
    $('.result').html('<i class="fa fa-spinner fa-spin"></i>');
    getLocation();
});




var field = 1;
//function location_fields() {
//
//    field++;
//    var objTo = document.getElementById('location_fields');
//    var divtest = document.createElement("div");
//    divtest.setAttribute("class", "form-group  removeclass" + field);
//    var rdiv = 'removeclass' + field;
//    divtest.innerHTML = '<div class="col-sm-6 nopadding">\n\
//<div class="form-group">\n\
//<select class="form-control" id=" ' + field + '" name="workplace[' + field + '][gov]">\n\
//<option value="">Governorate</option>\n\
//</select>\n\
//</div>\n\
//</div>\n\
//<div class="col-sm-6 nopadding">\n\
//<div class="form-group">\n\
//<div class="input-group"> \n\
//<select class="form-control" id=" sector_' + field + '" name="workplace[' + field + '][sector]">\n\
//<option value="">sector</option>\n\
//</select>\n\
//<div class="input-group-btn"> \n\
//<button class="btn btn-danger" type="button" onclick="remove_location_fields(' + field + ');"> <span class="glyphicon glyphicon-minus" aria-hidden="true"></span> </button></div></div></div></div><div class="clear"></div>';
//
//    objTo.appendChild(divtest);
//}






// Starrr plugin (https://github.com/dobtco/starrr)
var Starslice = [].slice;

(function ($, window) {
    var Stars;

    Stars = (function () {
        Stars.prototype.defaults = {
            rating: void 0,
            numStars: 5,
            change: function (e, value) {}
        };

        function Stars($el, options) {
            var i, _, _ref,
                    _this = this;

            this.options = $.extend({}, this.defaults, options);
            this.$el = $el;
            _ref = this.defaults;
            for (i in _ref) {
                _ = _ref[i];
                if (this.$el.data(i) != null) {
                    this.options[i] = this.$el.data(i);
                }
            }
            this.createStars();
            this.syncRating();
            this.$el.on('mouseover.stars', 'span', function (e) {
                return _this.syncRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('mouseout.stars', function () {
                return _this.syncRating();
            });
            this.$el.on('click.stars', 'span', function (e) {
                return _this.setRating(_this.$el.find('span').index(e.currentTarget) + 1);
            });
            this.$el.on('stars:change', this.options.change);
        }

        Stars.prototype.createStars = function () {
            var _i, _ref, _results;

            _results = [];
            for (_i = 1, _ref = this.options.numStars; 1 <= _ref ? _i <= _ref : _i >= _ref; 1 <= _ref ? _i++ : _i--) {
                _results.push(this.$el.append("<span class='glyphicon .glyphicon-star-empty'></span>"));
            }
            return _results;
        };

        Stars.prototype.setRating = function (rating) {
            if (this.options.rating === rating) {
                rating = void 0;
            }
            this.options.rating = rating;
            this.syncRating();
            return this.$el.trigger('stars:change', rating);
        };

        Stars.prototype.syncRating = function (rating) {
            var i, _i, _j, _ref;

            rating || (rating = this.options.rating);
            if (rating) {
                for (i = _i = 0, _ref = rating - 1; 0 <= _ref ? _i <= _ref : _i >= _ref; i = 0 <= _ref ? ++_i : --_i) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star-empty').addClass('glyphicon-star');
                }
            }
            if (rating && rating < 5) {
                for (i = _j = rating; rating <= 4 ? _j <= 4 : _j >= 4; i = rating <= 4 ? ++_j : --_j) {
                    this.$el.find('span').eq(i).removeClass('glyphicon-star').addClass('glyphicon-star-empty');
                }
            }
            if (!rating) {
                return this.$el.find('span').removeClass('glyphicon-star').addClass('glyphicon-star-empty');
            }
        };

        return Stars;

    })();
    return $.fn.extend({
        stars: function () {
            var args, option;

            option = arguments[0], args = 2 <= arguments.length ? Starslice.call(arguments, 1) : [];
            return this.each(function () {
                var data;

                data = $(this).data('star-rating');
                if (!data) {
                    $(this).data('star-rating', (data = new Stars($(this), option)));
                }
                if (typeof option === 'string') {
                    return data[option].apply(data, args);
                }
            });
        }
    });
})(window.jQuery, window);

$(function () {
    return $(".stars").stars();
});

$(document).ready(function () {

    $('#stars').on('stars:change', function (e, value) {
        $('#count').html(value);
    });
    $('#starsEff').on('stars:change', function (e, value) {
        $('#countEff').html(value);
    });
    $('#starsAcu').on('stars:change', function (e, value) {
        $('#countAcu').html(value);
    });

});


///////////////////search filter//////////////////
(function () {
    // TODO: be more elegant here
    function format(text) {
        return text.replace(/ /g, '').replace(/(<([^>]+)>)/ig, '').toLowerCase();
    }

    var SearchOnList = {
        $LIST: '[data-search-on-list=list]',
        $SEARCH: '[data-search-on-list=search]',
        $LIST_ITEM: '[data-search-on-list=list-item]',
        $COUNTER: '[data-search-on-list=counter]',
        TEMPLATE_EMTPY: '<li class="list-item list-item--disable">No results found</li>',
        init: function ($element) {
            this.items = [];
            this.itemsMatched = [];

            this.$element = $element;
            this.$list = this.$element.find(this.$LIST);
            this.$search = this.$element.find(this.$SEARCH);
            this.$counter = this.$element.find(this.$COUNTER);

            this.items = this.getAllItems();
            this.itemsMatched = this.items;

            this.updateCounter();
            this.handleResults();
            this.setEventListeners();
        },
        setEventListeners: function () {
            this.$search
                    .on('keyup', $.proxy(this.onKeyup, this))
                    .on('query:changed', $.proxy(this.handleQueryChanged, this))
                    .on('query:results:some', $.proxy(this.handleResults, this))
                    .on('query:results:none', $.proxy(this.handleNoResults, this))
        },
        onKeyup: function () {
            var query = this.$search.val(),
                    previousQuery = this.$search.data('previousQuery', query);

            if (this.queryChanged()) {
                this.$search.trigger('query:changed', {
                    query: query,
                    previousQuery: previousQuery
                });
            }
            else if ($.trim(query).length === 0 && this.$search.data('previousQuery') === undefined) {
                $('.key-list').css({'display': 'none'});
            }
        },
        queryChanged: function () {
            var query = this.$search.val();
            if ($.trim(query).length === 0 && this.$search.data('previousQuery') === undefined) {
                return false;
            }
            return true;
        },
        handleQueryChanged: function (e, data) {
            this.itemsMatched = this.items.map(function (item) {
                if (format(item.name).match(format(data.query))) {
                    $('.key-list').css({'display': 'block'});
                    return {
                        name: item.name,
                        visible: true
                    }
                }
                return {
                    name: item.name,
                    visible: false
                }
            });

            this.render();
            this.updateCounter();
        },
        handleNoResults: function () {
            this.$list.html(this.TEMPLATE_EMTPY);
        },
        handleResults: function () {
            this.$list.empty().append(this.renderItemsVisible())
        },
        someItemsVisible: function () {
            return this.itemsMatched.some(function (item) {
                return item.visible;
            });
        },
        render: function () {
            (this.someItemsVisible()) ?
                    this.$search.trigger('query:results:some') :
                    this.$search.trigger('query:results:none');
        },
        updateCounter: function () {
            (this.someItemsVisible()) ?
                    this.$counter.text(this.renderItemsVisible().length) :
                    this.$counter.text('');
        },
        getAllItems: function () {
            var $items = this.$list.find(this.$LIST_ITEM);

            return $items.map(function () {
                var $item = $(this);

                return {
                    name: $item.html(),
                    visible: true
                };
            }).toArray();
        },
        renderItemsVisible: function () {
            var itemInTemplate;
            return this.itemsMatched.sort(function (a, b) {
                if (a.name < b.name)
                    return -1
                if (a.name > b.name)
                    return 1;
                return 0;
            }).reduce(function (items, item) {
                itemInTemplate = '<li class="list-item" data-search-on-list="list-item">' + item.name + '</li>';
                if (item.visible) {
                    items.push(itemInTemplate);
                }
                return items;
            }, []);
        }
    };

    window.SearchOnList = SearchOnList;
})();

SearchOnList.init($('[data-behaviour=search-on-list]'));
$('.search-box').mouseleave(function () {
    $('.key-list').css({'display': 'none'});
});


