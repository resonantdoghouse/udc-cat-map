var sidebarWidth,
		mapWidthLg = '80%',
		mapWidthMd = '70%',
		mapWidthSm = '65%',
		sidebarWidthLg = '20%',
		sidebarWidthMd = '30%',
		sidebarWidthSm = '35%';


// sidebar toggle out
$('#sidebar-toggle-out').click(function(e){
  e.preventDefault();

  sidebarWidth = $('#sidebar-options').width();
	
  $('.sidebar-options').animate({
    left: - sidebarWidth
  }, 500 );

  $('.map-container').animate({
    width: "100%",
    left: "0%"
  }, 500, function(){
    google.maps.event.trigger(map, "resize");
  });

  $('#sidebar-toggle-in').css({
    'display': 'block',
    'left': sidebarWidth
  });
});


// sidebar toggle in
$('#sidebar-toggle-in').click(function(e){
  e.preventDefault();
	
	sidebarWidth = $('#sidebar-options').width();
	
	var tmpMapWidth;
	var tmpSidebarWidth;
	

  $('.sidebar-options').animate({
    left: 0
  }, 500 );
	
	if ( sidebarWidth >= sidebarWidthSm  ){
		tmpSidebarWidth = sidebarWidthSm;
		tmpMapWidth = mapWidthSm;
	} 
	else if ( sidebarWidth >= sidebarWidthMd)
	{
		tmpSidebarWidth = sidebarWidthMd;
		tmpMapWidth = mapWidthMd;
	}
	else ( sidebarWidth >= sidebarWidthLg)
	{
		tmpSidebarWidth = sidebarWidthLg;
		tmpMapWidth = mapWidthLg;
	}
	
  $('.map-container').animate({
    width: tmpMapWidth,
    left: tmpSidebarWidth
  }, 500, function(){
    google.maps.event.trigger(map, "resize");
  });

  $('#sidebar-toggle-in').css({
    'display': 'none'
  });
  console.log(sidebarWidth);
});