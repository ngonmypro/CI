<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
<style type="text/css">
html { height: 100% }
body { height: 100%; margin: 0; padding: 0 }
#map-canvas { height: 100% }
</style>
<script type="text/javascript"
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDpHRMOgSP--n56_Dm1XcAhLElZa_OyUh8&sensor=true&language=th">
</script>
<script type="text/javascript">
function initialize() {
var mapOptions = {
center: new google.maps.LatLng(13.795406203132826, 100.458984375),
zoom: 5,
mapTypeId: google.maps.MapTypeId.ROADMAP
};
var map = new google.maps.Map(document.getElementById("map-canvas"),
mapOptions);
}
</script>
</head>
<body onload="initialize()">
<div id="map-canvas"/>
</body>
</html>