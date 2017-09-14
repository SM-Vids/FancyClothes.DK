<?php session_start();
        $title = "Om os";
        $description = "Se et kort over hvor vi holder til. Kom kig ind i vores tøjbutik i Fredensvang";
        ?>
        <?php require "sections/top.php"; ?>
        <main>
        <h2>Vores butik</h2>
        <!-- div to contain a google map -->
        <div id="map" style="width:100%;height:50vh;"></div>
        <script>
function myMap() {
  var mapCanvas = document.getElementById("map"); //Find #map
  var myCenter = new google.maps.LatLng(56.512787, 8.574592);//Set the marker to theese corod. 
  var mapOptions = {center: myCenter, zoom: 18, mapTypeId: 'satellite'};//Set center to mycenter, zoom 18 and set type to satekitte
  var map = new google.maps.Map(mapCanvas,mapOptions);//Create the map
  var marker = new google.maps.Marker({
    position: myCenter,//set marker position
  });
  marker.setMap(map);
}
</script>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBMMOx249aa7oRIDfxO2iSbQx59lRb7CYo&callback=myMap"></script><!-- Get the map API with the specified key
        </main>
        <?php require "sections/bottom.php"; ?>