<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
  "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8"/>
    <title>Google Maps JavaScript API Example</title>
    <script src="http://maps.google.com/maps?file=api&amp;v=2&amp;key=ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xSSwRPPsIoQEd-zoKGLyrdZf6rgiRQ5AmiMu8TJ3qrYSG3Yp9XdBqP54g"
      type="text/javascript"></script>
	  
	<script src="http://www.google.com/uds/api?file=uds.js&v=1.0&key=ABQIAAAAU2JjzZGVyxxE7vZTsdFB1xSSwRPPsIoQEd-zoKGLyrdZf6rgiRQ5AmiMu8TJ3qrYSG3Yp9XdBqP54g" type="text/javascript"></script>
	<script src="/assets/javascript/shared/gmapShared.js" type="text/javascript"></script>

    <script type="text/javascript">
	
    function showAddress(response) {
    //alert('show address');
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
		alert('country is '+place.AddressDetails.Country.CountryNameCode);
		/*alert('city is '+place.AddressDetails.Country.AdministrativeArea.AdministrativeAreaName);
		alert('county is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.SubAdministrativeAreaName);
		alert('locality is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.LocalityName);
		alert('Thoroughfare is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.Thoroughfare.ThoroughfareName);
		alert('postcode is '+place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.PostalCode.PostalCodeNumber); */
		document.getElementById('address').value = place.address;
		document.getElementById('addressLine1').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.Thoroughfare.ThoroughfareName;
		document.getElementById('addressLine2').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.LocalityName;
		document.getElementById('city').value     = place.AddressDetails.Country.AdministrativeArea.AdministrativeAreaName;
		document.getElementById('county').value   = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.SubAdministrativeAreaName;
		document.getElementById('country').value  = place.AddressDetails.Country.CountryNameCode;
		document.getElementById('postcode').value = place.AddressDetails.Country.AdministrativeArea.SubAdministrativeArea.Locality.PostalCode.PostalCodeNumber;
		
      }
    }
    </script>
  </head>

  
  <body onload="initialize('52.5250677','-1.2135337')">
  <input type="text" id="postcodeEntry" size="10" />

<input type="image" src="/images/buttonSearch.gif" value="search" onclick="javascript:usePointFromPostcode(document.getElementById('postcodeEntry').value,
    function (point) {
      //alert('Latitude: ' + point.lat() + '\nLongitude: ' + point.lng());
	  initialize(point.lat(),point.lng());
	  usePointFromPostcode(document.getElementById('postcodeEntry').value, placeMarkerAtPoint);
      })" />
  
    <div id="map_canvas" style="width: 500px; height: 400px"></div>
	Full Address <input type ="text" name="address" id="address"><br />
	Add Line 1 <input type ="text" name="addressLine1" id="addressLine1"><br />
	Add Line 2 <input type ="text" name="addressLine2" id="addressLine2"><br />
	City <input type ="text" name="city" id="city"><br />
	County <input type ="text" name="county" id="county"><br />
	Country <input type ="text" name="country" id="country"><br />
	Postcode <input type ="text" name="postcode" id="postcode"><br />
</html>
