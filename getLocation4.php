<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Untitled Document</title>
<!--<script src="jquery.min.js"></script>-->
<script src="js/jquery-2.1.4.min.js"></script>
<script>
$(document).ready(function(){
    if (navigator.geolocation) {
        navigator.geolocation.getCurrentPosition(showLocation);
    } else { 
        $('#location').html('Geolocation is not supported by this browser.');
    }
});

function showLocation(position) {
    var latitude = position.coords.latitude;
    var longitude = position.coords.longitude;
    $.ajax({
        type:'POST',
        url:'getLocation.php',
        data:'latitude='+latitude+'&longitude='+longitude,
        success:function(msg){
            if(msg){
               $("#location").html(msg);
            }else{
                $("#location").html('Not Available');
            }
        }
    });
}
</script>
</head>

<body>
<p>Your Location: <span id="location"></span></p>
</body>
</html>