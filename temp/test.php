<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps JavaScript API Example</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xSSwRPPsIoQEd-zoKGLyrdZf6rgiRQ5AmiMu8TJ3qrYSG3Yp9XdBqP54g"
      type="text/javascript"></script>
    <script type="text/javascript">

    var map;
    var geocoder;
    var address;

    function initialize(lat,long) {
      map = new GMap2(document.getElementById("map_canvas"));
      map.setCenter(new GLatLng(lat,long), 15);
      map.addControl(new GLargeMapControl);
      GEvent.addListener(map, "click", getAddress);
      geocoder = new GClientGeocoder();
    }
    
    function getAddress(overlay, latlng) {
      if (latlng != null) {
        address = latlng;
        geocoder.getLocations(latlng, showAddress);
      }
    }

    function showAddress(response) {
      map.clearOverlays();
      if (!response || response.Status.code != 200) {
        alert("Status Code:" + response.Status.code);
      } else {
        place = response.Placemark[0];
        point = new GLatLng(place.Point.coordinates[1],
                            place.Point.coordinates[0]);
        marker = new GMarker(point);
        map.addOverlay(marker);
        marker.openInfoWindowHtml(
        '<b>orig latlng:</b>' + response.name + '<br/>' + 
        '<b>latlng:</b>' + place.Point.coordinates[1] + "," + place.Point.coordinates[0] + '<br>' +
        '<b>Status Code:</b>' + response.Status.code + '<br>' +
        '<b>Status Request:</b>' + response.Status.request + '<br>' +
        '<b>Address:</b>' + place.address + '<br>' +
        '<b>Accuracy:</b>' + place.AddressDetails.Accuracy + '<br>' +
        '<b>Country code:</b> ' + place.AddressDetails.Country.CountryNameCode);
      }
    }


    </script>
  </head>

  <body onload="initialize('40.730885','-73.997383')">
    <div id="map_canvas" style="width: 500px; height: 400px"></div>






  </body>
</html>