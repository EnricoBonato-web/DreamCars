function myMap() {
document.getElementById("googleMap").style.height='300px';

    var mapProp= {
    center:new google.maps.LatLng(45.411331,11.8854431),
    zoom:14 ,
};
 src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAaUkxp5oyLvwG5UI0jY5EmMg2InF-uMUA&callback=myMap"

    var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
 var marker = new google.maps.Marker({
          position: new google.maps.LatLng(45.411331,11.8854431),
          map: map,
          title: 'Hello World!'});
}

