$(function(){
'user strick';
var map;
var mapDiv = document.getElementById('map');
var myLalng = new google.maps.LatLng (21.0286669,105.8521484)
function initMap(){
        map = new google.maps.Map(mapDiv, {
          center: myLalng,
          zoom: 14,
        });
    var marker = new google.maps.Marker({
    position: myLalng,
    map: map,
    title: 'Hello World!'
  });
      };
      initMap();
});