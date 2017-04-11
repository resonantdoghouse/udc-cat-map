$(document).ready(function(){

  var imageName = '';
  var imageNameVal = '';

  $.get('//catmap.catkittycat.com/api/cats', function(data){
    var output = '<ul>';
      $.each(JSON.parse(data), function(index, cat){
        output += '<li>'+cat.name+'</li>';
      });
    output += '</ul>';

    $('#cats').html(output);
  });


  $("#file").pekeUpload({
    onSubmit: false,
    showFilename: true,
    btnText: 'Upload Cat Image',
    limit: 1,
    onFileSuccess: function(file, data){
      console.log( 'Image Uploaded' );

      imageName = $(".filename").text();
      //console.log(imageName);

      $('#img_url').val(imageName);
      imageNameVal = $('#img_url').val();

      //console.log(imageNameVal);
    }
  });

  $('#catForm').submit(function(e){
    e.preventDefault();

    var name = $('#name').val();
    var description = $('#description').val();
    var lat = $('#lat').val();
    var lng = $('#lng').val();


    $.post("//catmap.catkittycat.com/api/cat/add", {
      name: name,
      description:description,
      img_url: imageNameVal,
      lat: lat,
      lng: lng,
    }).done(function(data){
      alert( "Data Loaded: " + data );
    });
  });




  // map
  var myLatLng = {lat: 49.288312, lng: -123.0183267};

  var map = new google.maps.Map(document.getElementById('mapPicker'), {
    zoom: 13,
    center: myLatLng
  });

  var imageMarker = {
    url: '/map/img/paw.png',
    size: new google.maps.Size(34, 32),
    // The origin for this image is (0, 0).
    origin: new google.maps.Point(0, 0)
    // The anchor for this image is the base of the flagpole at (0, 32).
    //anchor: new google.maps.Point(0, 32)
  };

  var marker;

  function placeMarker(location) {
    if ( marker ) {
      marker.setPosition(location);

    } else {
      marker = new google.maps.Marker({
        position: location,
        icon: imageMarker,
        map: map
      });
    }
  }

  google.maps.event.addListener(map, 'click', function(event) {
    placeMarker(event.latLng);

    //console.log(marker.position);
    var clickLat = marker.getPosition().lat();
    var clickLng = marker.getPosition().lng();

    var clickLatLng = clickLat + ' ' + clickLng;

    $('#lat').val(clickLat);
    $('#lng').val(clickLng);

    console.log(clickLatLng);
  });







});
