/**
* location-hero-banner JS
* -----------------------------------------------------------------------------
*
* All the JS for the location-hero-banner component.
*/
( function( app ) {

  var COMPONENT = {

    className: 'll-location-hero-banner',
    mapPinIcon: 'M12 11.484q1.031 0 1.758-0.727t0.727-1.758-0.727-1.758-1.758-0.727-1.758 0.727-0.727 1.758 0.727 1.758 1.758 0.727zM12 2.016q2.906 0 4.945 2.039t2.039 4.945q0 1.453-0.727 3.328t-1.758 3.516-2.039 3.070-1.711 2.273l-0.75 0.797q-0.281-0.328-0.75-0.867t-1.688-2.156-2.133-3.141-1.664-3.445-0.75-3.375q0-2.906 2.039-4.945t4.945-2.039z',
    pinColor: '#0e6b8d',
    pinStroke: '#FFFFFF',


    selector : function() {
      return '.' + this.className;
    },


    // Fires after common.init, before .finalize and common.finalize
    init: function() {

      var _this = this;
      $('.ll-location-hero-banner .google-map__wrapper').each( function(index, el) {

        var map;
        var locations = $(el).data('locations');
        var bounds = new google.maps.LatLngBounds();
        var mapId = $(el).attr('id');

        function initialize_map() {
          var center_coordinates = new google.maps.LatLng('43.0299189', '-77.505776');
          var mapOptions = {
            zoom: 11,
            scrollwheel: false,
            draggable: false,
            disableDefaultUI: true,
            maxZoom: 11,
            center: center_coordinates,
            styles: [
                {
                    "featureType": "water",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#5b8cbc"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "landscape",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#8493a7"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#8e99b6"
                        },
                        {
                            "lightness": 17
                        }
                    ]
                },
                {
                    "featureType": "road.highway",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#8e99b6"
                        },
                        {
                            "lightness": 29
                        },
                        {
                            "weight": 0.2
                        }
                    ]
                },
                {
                    "featureType": "road.arterial",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#8e99b6"
                        },
                        {
                            "lightness": 18
                        }
                    ]
                },
                {
                    "featureType": "road.local",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#8e99b6"
                        },
                        {
                            "lightness": 16
                        }
                    ]
                },
                {
                    "featureType": "poi",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#77919b"
                        },
                        {
                            "lightness": 21
                        }
                    ]
                },
                {
                    "featureType": "poi.park",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#75959e"
                        },
                        {
                            "lightness": 15
                        }
                    ]
                },
                {
                    "elementType": "labels.text.stroke",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "elementType": "labels.text.fill",
                    "stylers": [
                        {
                            "color": "#4d5e6b"
                        }
                    ]
                },
                {
                    "elementType": "labels.icon",
                    "stylers": [
                        {
                            "visibility": "off"
                        }
                    ]
                },
                {
                    "featureType": "transit",
                    "elementType": "geometry",
                    "stylers": [
                        {
                            "color": "#8e99b6"
                        },
                        {
                            "lightness": 19
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.fill",
                    "stylers": [
                        {
                            "color": "#8e99b6"
                        },
                        {
                            "lightness": 20
                        }
                    ]
                },
                {
                    "featureType": "administrative",
                    "elementType": "geometry.stroke",
                    "stylers": [
                        {
                            "color": "#8e99b6"
                        },
                        {
                            "lightness": 17
                        },
                        {
                            "weight": 1.2
                        }
                    ]
                }
            ]
          };

          map = new google.maps.Map(document.getElementById( mapId ), mapOptions);

          $.each( locations, function() {
            var newMarker = this;
            var latLng = {lat: parseFloat( newMarker['lat'] ), lng: parseFloat( newMarker['lng'] )};
            //console.log( newMarker );

            var icon = {
              path: google.maps.SymbolPath.CIRCLE,
              fillColor: _this.pinColor,
              fillOpacity: 1,
              anchor: new google.maps.Point( 12, 16 ),
              strokeWeight: 3,
              strokeColor: _this.pinStroke,
              scale: 8
            };

            var marker = new google.maps.Marker({
              position: latLng,
              map: map,
              icon: icon
            });

            bounds.extend(marker.position);

          });

          map.fitBounds(bounds);

        }

        if ( typeof $(el) !== 'undefined' && $( el ).length > 0 ) {
          google.maps.event.addDomListener(window, 'load', initialize_map);
        }
        /* Dev Note: this was here a second time. Seems like it should be nested in an "else"?
        //initialize_map();
        */

      });

    },


    finalize: function() {

      var _this = this;
    }
  };

  // Hooks the component into the app
  app.registerComponent( 'location-hero-banner', COMPONENT );
} )( app );
