
document.addEventListener("DOMContentLoaded", ()=>{

	/* MODAL */
	// Get the modal
	var modal = document.getElementById( "myModal" );
	// Get the button that opens the modal
	var btn = document.getElementById( "myBtn" );
	// Get the <span> element that closes the modal
	var span = document.getElementsByClassName( "close" )[0];
	// When the user clicks on the button, open the modal
	btn.onclick = function () {
		modal.style.display = "block";
	}
	// When the user clicks on <span> (x), close the modal
	span.onclick = function () {
		modal.style.display = "none";
	}
	// When the user clicks anywhere outside of the modal, close it
	window.onclick = function ( event ) {
		if ( event.target == modal ) {
			modal.style.display = "none";
		}
	}
	/* // MODAL */


	//=== open city ===
	var loc_title            = document.getElementById('loc_box_head_subtitle');
	var loc_box_w            = document.getElementById('loc_box_w');
	var search_txt           = document.getElementById('loc_box_head_search_field');
	var loc_box_errmsg       = document.getElementById('loc_box_errmsg');
	var loc_box_head_navi    = document.getElementById('loc_box_head_navi');
	var state_titles         = document.querySelectorAll('.loc_box_state_title');
	var loc_box_state_cityes = document.querySelectorAll('.loc_box_state_cityes');
	var loclist_box          = document.querySelectorAll('.loc_box_state_cityes_locations');
	var city_titles          = document.querySelectorAll('.loc_box_city_title');
	var loc_titles           = document.querySelectorAll('.loc_box_state_city_location_title');
	var srv_boxes            = document.querySelectorAll('.loc_box_state_city_location_srv_box');
	var loc_sbox_item        = document.querySelectorAll('.loc_sbox_item');
	var loc_box_state_city_location = document.querySelectorAll('.loc_box_state_city_location');

	document.addEventListener( "click", ( event )=>{

		/* STATE click */
		if( event.target.classList.contains('loc_box_state_title') ){
			let city = document.getElementById( event.target.getAttribute('data-ciy_box') );

			state_titles.forEach(function( title_item) {
				title_item.classList.add('loc_box_state_title_hiden');
			});

			loc_title.innerHTML = event.target.getAttribute('data-loc_title');
			city.classList.add( 'loc_box_state_cityes_open' );
		}

		/* CITY click */
		if( event.target.classList.contains('loc_box_city_title') ){
			let locs = document.getElementById( event.target.getAttribute('data-ciy_box') );

			loclist_box.forEach(function( title_item) {
				title_item.classList.remove('loc_box_state_cityes_locations_open');
			});

			loc_title.innerHTML = event.target.getAttribute('data-loc_title');
			locs.classList.add( 'loc_box_state_cityes_locations_open' );
		}

		/* LOCATION click */
		if(
			event.target.parentElement != null &&
			( event.target.classList.contains('loc_box_state_city_location_title') ||
		    event.target.parentElement.classList.contains('loc_box_state_city_location_title') )
		){
			if( event.target.classList.contains('loc_box_state_city_location_title') ){
				var cel = event.target;
			}else{
				var cel = event.target.parentElement;
			}

			var box = document.getElementById( cel.getAttribute('data-servs_box') );

			city_titles.forEach(function( title_item) {
				title_item.classList.add('loc_box_city_title_hiden');
			});

			loc_titles.forEach(function( title_item) {
				title_item.classList.add('loc_box_state_city_location_hidden');
			});

			loc_title.innerHTML = cel.getAttribute('data-loc_title');
			box.classList.add( 'loc_box_state_city_location_opened' );
		}

		/* SERVICE click */
		if( event.target.classList.contains('loc_box_state_city_location_srv_title') ){
			var cel = event.target;
			var box = document.getElementById( cel.getAttribute('data-servslist_box') );

			srv_boxes.forEach(function( title_item) {
				title_item.classList.remove('loc_box_state_city_location_srv_box_opened');
			});

			box.classList.add( 'loc_box_state_city_location_srv_box_opened' );
		}

		/* SEARCH click */
		if( event.target.classList.contains('loc_box_head_search_subm') ){
			var s_zip = search_txt.value;

			loc_box_w.classList.add( 'loc_box_w_hide' );
			loc_box_errmsg.classList.remove( 'loc_box_errmsg_show' );

			reset_location_boxes();

			var i = 0;
			arr_loc_ltln.forEach( element => {
				if( element.zip == s_zip ){
					document.getElementById( element.id ).classList.add('loc_sbox_item_opened');
					i++;
				}
			});

			if( i==0 ){ // google search
				codeAddress( s_zip );
			}

		}

	}, false );


	//=== go back button ===
	loc_box_head_navi.addEventListener( "click", ( event )=>{
		reset_location_boxes();
		loc_box_w.classList.remove('loc_box_w_hide');
	}, false );



	//=== reset search locations ===
	function reset_location_boxes(){
		loc_sbox_item.forEach(function( b_item) {
			b_item.classList.remove('loc_sbox_item_opened');
			b_item.classList.remove('loc_sbox_item_0');
			b_item.classList.remove('loc_sbox_item_1');
			b_item.classList.remove('loc_sbox_item_2');
			b_item.querySelector('.loc_box_state_city_location_title_dist').innerHTML = '';
		});

		loc_box_state_cityes.forEach(function( b_item) {
			b_item.classList.remove('loc_box_state_cityes_open');
		});

		loclist_box.forEach(function( b_item) {
			b_item.classList.remove('loc_box_state_cityes_locations_open');
		});

		loc_box_state_city_location.forEach(function( b_item) {
			b_item.classList.remove('loc_box_state_city_location_opened');
		});

		city_titles.forEach(function( b_item) {
			b_item.classList.remove('loc_box_city_title_hiden');
		});

		state_titles.forEach(function( b_item) {
			b_item.classList.remove('loc_box_state_title_hiden');
		});

		state_titles.forEach(function( b_item) {
			b_item.classList.remove('loc_box_state_title_hiden');
		});

		loc_titles.forEach(function( b_item) {
			b_item.classList.remove('loc_box_state_city_location_hidden');
		});
	}

	//=== ZIP to Lat&Lng ===
	function codeAddress( zipcode ){
		var geocoder = new google.maps.Geocoder();
		geocoder.geocode({ 'address':'zipcode '+zipcode }, function (results, status) {
			if ( status == google.maps.GeocoderStatus.OK ) {
				var lat = results[0].geometry.location.lat();
				var lng = results[0].geometry.location.lng();

				arr_loc_ltln.forEach( element => {
					var dist = calcCrow ( element.lat, element.lng, lat, lng );
					element.dist = Math.round( dist );
				});

				arr_loc_ltln.sort((a,b) =>  a.dist-b.dist );

				for( i=0; i<arr_loc_ltln.length; i++ ){ //310145
					el = document.getElementById( arr_loc_ltln[i].id );
					el.classList.add('loc_sbox_item_opened');
					el.classList.add('loc_sbox_item_'+i);
					el.querySelector('.loc_box_state_city_location_title_dist').innerHTML = '&nbsp;('+arr_loc_ltln[i].dist+' km)';
					if( i > 1 ){ break; }
				};

			} else {
				loc_box_errmsg.classList.add( 'loc_box_errmsg_show' );
			}
		});
	}

	function calcCrow( lat1, lon1, lat2, lon2 ){
		var R = 6371; // km
		var dLat = (lat2-lat1) * Math.PI / 180;
		var dLon = (lon2-lon1) * Math.PI / 180;
		var lat1 = lat1 * Math.PI / 180;
		var lat2 = lat2 * Math.PI / 180;

		var a = Math.sin(dLat/2 ) * Math.sin(dLat/2 ) + Math.sin(dLon/2 ) * Math.sin(dLon/2 ) * Math.cos( lat1 ) * Math.cos( lat2 );
		var c = 2 * Math.atan2( Math.sqrt( a ), Math.sqrt(1-a ) );
		var d = R * c;
		return d;
	}

});