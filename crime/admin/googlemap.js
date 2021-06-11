Query(function($) {
    // Asynchronously Load the map API 
    var script = document.createElement('script');
    script.src = "//maps.googleapis.com/maps/api/js?sensor=false&callback=initialize";
    document.body.appendChild(script);
});

function initialize() {
    var map;
    var bounds = new google.maps.LatLngBounds();
    var mapOptions = {
        mapTypeId: 'roadmap'
    };
                    
    // Display a map on the page
    map = new google.maps.Map(document.getElementById("map_canvas"), mapOptions);
    map.setTilt(45);
        
    // Multiple Markers
    var markers = [
        ['Bandra, Mumbai', 19.0596,72.8295],
        ['Andheri, Mumbai', 19.1136,72.8697],
        ['Dadar, Mumbai', 19.0178,72.8478],
        ['Worli, Mumbai', 18.9986,72.8174],
        ['Churchgate, Mumbai', 18.9322,72.8264],
        ['Sakinaka, Mumbai', 19.0962,72.8877],
        ['Versova, Mumbai', 19.1351,72.8146],
    ];
                        
    // Info Window Content
    var infoWindowContent = [
        ['<div class="info_content">' +
        '<h3>Bandra, Mumbai</h3>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Andheri, Mumbai</h3>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Dadar, Mumbai</h3>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Worli, Mumbai</h3>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Churchgate, Mumbai</h3>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Sakinaka, Mumbai</h3>' +
        '</div>'],
        ['<div class="info_content">' +
        '<h3>Versova, Mumbai</h3>' +
        '</div>'],

    ];
        
    // Display multiple markers on a map
    var infoWindow = new google.maps.InfoWindow(), marker, i;
    
    // Loop through our array of markers & place each one on the map  
    for( i = 0; i < markers.length; i++ ) {
        var position = new google.maps.LatLng(markers[i][1], markers[i][2]);
        bounds.extend(position);
        marker = new google.maps.Marker({
            position: position,
            map: map,
            title: markers[i][0]
        });
        
        // Allow each marker to have an info window    
        google.maps.event.addListener(marker, 'click', (function(marker, i) {
            return function() {
                infoWindow.setContent(infoWindowContent[i][0]);
                infoWindow.open(map, marker);
            }
        })(marker, i));

        // Automatically center the map fitting all markers on the screen
        map.fitBounds(bounds);
    }

    // Override our map zoom level once our fitBounds function runs (Make sure it only runs once)
    var boundsListener = google.maps.event.addListener((map), 'bounds_changed', function(event) {
        this.setZoom(14);
        google.maps.event.removeListener(boundsListener);
    });
    
}
