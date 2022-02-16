winW = window.innerWidth;
var zoom;
var icon;
var center;
var size;
var visible;
if(winW <= 576){
	zoom = 11.5;
	icon = .5;
	center = [-104.786435, 39.471063];
	size = .5;
	visible = 'none';
} else if(winW > 576 && winW < 992){
	zoom = 12.5;
	icon = 1;
	size = .75;
	center = [-104.786435, 39.471063];
	visible = 'none';
} else {
	zoom = 12.5;
	icon = 1;
	center = [-104.786435, 39.471063];
	size = 1;
	visible = 'visible';
}



mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrMmc5cmE2dDAwM2UzbWtob3gwdmJveHAifQ.eOlvMW20i4FKMtQxVAni1g';
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/bpdavis81/ckf5xsnt92evz19pcuamtqkda',
  zoom: zoom,
  center: [-104.786435, 39.471063]
});
var lgPos = [-104.787, 39.472];
var size  = 200;


var pulsingDot = {
	width: size,
	height: size,
	data: new Uint8Array(size * size * 4),

	// get rendering context for the map canvas when layer is added to the map
	onAdd: function () {
		var canvas = document.createElement('canvas');
		canvas.width = this.width;
		canvas.height = this.height;
		this.context = canvas.getContext('2d');
	},

	// called once before every frame where the icon will be used
	render: function () {
		var duration = 1000;
		var t = (performance.now() % duration) / duration;

		var smRadius = (size / 5) * 0.2;
		var radius = (size / 2) * 0.4;
		var outerRadius = (size / 2) * 0.6 * t + radius;
		var context = this.context;

		// draw outer circle
		context.clearRect(0, 0, this.width, this.height);
		context.beginPath();
		context.arc(
			this.width / 2,
			this.height / 2,
			outerRadius,
			0,
			Math.PI * 2
		);
		context.fillStyle = 'rgba(221, 114, 64,' + (1 - t) + ')';
		context.fill();

		// draw inner circle
		context.beginPath();
		context.arc(
			this.width / 2,
			this.height / 2,
			radius,
			0,
			Math.PI * 2
		);
		context.fillStyle = 'rgba(230, 128, 80, 1)';
		context.lineWidth = 2 + 4 * (1 - t);
		context.fill();

		//draw inner-inner circle
		context.beginPath();
		context.arc(
			this.width / 2,
			this.height / 2,
			smRadius,
			0,
			Math.PI * 2
		);
		context.fillStyle = 'rgba(255,255,255,.8)';
		context.fill();

		// update this image's data with data from the canvas
		this.data = context.getImageData(
			0,
			0,
			this.width,
			this.height
		).data;

		// continuously repaint the map, resulting in the smooth animation of the dot
		map.triggerRepaint();

		// return `true` to let the map know that the image was updated
		return true;
	}
};

map.on('load', function(){
	map.resize();
	map.addImage('pulsing-dot', pulsingDot, { pixelRatio: 2 });

	// add location pin
	map.addSource('points', {
		'type': 	'geojson',
		'data': 	{
			'type':	'FeatureCollection',
			'features':	[
				{
					'type':	'Feature',
					'properties':	{
						'description':
							'<img src="https://livelookingglass.com/wp-content/themes/lookingglass/assets/images/lg-logo.png" alt="Looking Glass - Parker, CO" class="img-fluid" />' +
							'<br/>' +
							'<a href="" title="Get Directions to Looking Glass" class="btn orange-btn">Get Directions</a>'
					},
					'geometry': {
						'type':	'Point',
						'coordinates': lgPos
					}
				}
			]
		}
	});
	map.addLayer({
		'id':	'points',
		'type':	'symbol',
		'source': 'points',
		'layout': {
			'icon-image': 'pulsing-dot'
		}
	});

	// Add sources for surrounding area pins
	map.addSource('grocery', {
    type: 'vector',
    url: 'mapbox://bpdavis81.ckhl760hb0ebq22pj979ungt7-1vc46'
  });
  map.addSource('coffee', {
    type: 'vector',
    url: 'mapbox://bpdavis81.ckhmke1i51hr326nuxy1b3jbo-46qhe'
  });
  map.addSource('shopping', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckhmkppo00npw25odpkcdheuj-1qec3'
  });
  map.addSource('dining', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckhns8o4m00on23rt93vzy7io-27xc5'
  })
  map.addSource('trails', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckhnslggk06ht2ao29ul7j2nu-2hx47'
  });
  map.addSource('parks', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckhnstzau06ut24o21tewea57-49id3'
  });
  map.addSource('schools', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckhnx2o2l1jf02epenc9ovi12-2ua38'
  });
  map.addSource('medical', {
    type: 'vector',
    url:  'mapbox://bpdavis81.ckhnxaeye06if29mnho7vj3g6-5el2w'
  });

  map.addLayer({
    'id': 'grocery',
    'type': 'symbol',
    'source': 'grocery',
    'layout': {
      'visibility': visible,
      'icon-image': 'grocery',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Grocery'
  });
  map.addLayer({
    'id': 'coffee',
    'type': 'symbol',
    'source': 'coffee',
    'layout': {
      'visibility': 'none',
      'icon-image': 'coffee',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Coffee'
  });
  map.addLayer({
    'id': 'shopping',
    'type': 'symbol',
    'source': 'shopping',
    'layout': {
      'visibility': 'none',
      'icon-image': 'shopping',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Shopping'
  });
  map.addLayer({
    'id': 'dining',
    'type': 'symbol',
    'source': 'dining',
    'layout': {
      'visibility': 'none',
      'icon-image': 'dining',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Dining'
  });
  map.addLayer({
    'id': 'trails',
    'type': 'symbol',
    'source': 'trails',
    'layout': {
      'visibility': 'none',
      'icon-image': 'trails',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Trails'
  });
  map.addLayer({
    'id': 'parks',
    'type': 'symbol',
    'source': 'parks',
    'layout': {
      'visibility': 'none',
      'icon-image': 'parks',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Parks'
  });
  map.addLayer({
    'id': 'schools',
    'type': 'symbol',
    'source': 'schools',
    'layout': {
      'visibility': 'none',
      'icon-image': 'schools',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Schools'
  });
  map.addLayer({
    'id': 'medical',
    'type': 'symbol',
    'source': 'medical',
    'layout': {
      'visibility': 'none',
      'icon-image': 'hospitals',
      'icon-size':  .75,
      'icon-allow-overlap': true
    },
    'source-layer': 'LG-Medical'
  });

}); // end map.on('load') function

// Layer IDs
var toggleLayerIds = ['grocery','coffee','shopping','dining','trails','parks','schools','medical'];

// Create Buttons
for(var i = 0; i < toggleLayerIds.length; i++){
 var id = toggleLayerIds[i];
 var link = document.createElement('a');
 link.href = '#';

 link.className = 'active menu-link';
 link.id = id.replace(/\s+/g,'-') + '-btn';
 link.textContent = id;


 link.onclick = function(e) {
   var clickedLayer = this.textContent;

   e.preventDefault();
   e.stopPropagation();

   for(var j = 0; j < toggleLayerIds.length; j++){
     if(clickedLayer === toggleLayerIds[j]){
       layers.children[j].className = 'menu-link active';
       map.setLayoutProperty(toggleLayerIds[j], 'visibility', 'visible');
     } else {
       layers.children[j].className = 'menu-link';
       map.setLayoutProperty(toggleLayerIds[j], 'visibility', 'none');
     }
   }
 };
 var layers = document.getElementById('menu');
 layers.appendChild(link);
}

var popup = new mapboxgl.Popup({offset: 35})
	.setHTML(
		'<img src="/wp-content/themes/lookingglass/assets/images/map-icons/lgPos-logo.svg" alt="Looking Glass - Parker, CO Logo" class="img-fluid">' +
		'<br/>' +
		'<a href="https://www.google.com/maps/dir//Broomtail+Trl,+Parker,+CO+80134/@39.4692191,-104.7899431,16.31z/data=!4m8!4m7!1m0!1m5!1m1!1s0x876c911b9e442ab5:0xfca2d0ec3e573f59!2m2!1d-104.7916899!2d39.4679855" title="Get Directions to Looking Glass" class="btn outline-btn" target="_blank">Get Directions</a>'
);
map.on('click', 'points', function(e){
	map.getCanvas().style.cursor = 'pointer';
	popup.setLngLat(lgPos).addTo(map);
});


var nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'bottom-right');

// Zoom & Pan when menu-btn is clicked
//$('.map-menu .menu-link').click(function(){
//	var target = $(this).attr('id');
//	console.log(target);
//});

if($(window).innerWidth() < 728){
  map.scrollZoom.disable();
}
