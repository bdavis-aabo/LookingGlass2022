mapboxgl.accessToken = 'pk.eyJ1IjoiYnBkYXZpczgxIiwiYSI6ImNrMmc5cmE2dDAwM2UzbWtob3gwdmJveHAifQ.eOlvMW20i4FKMtQxVAni1g';
var map = new mapboxgl.Map({
  container: 'map',
  style: 'mapbox://styles/bpdavis81/ckf5xsnt92evz19pcuamtqkda',
  zoom: 12,
  center: [-104.786435, 39.471063]
});

var nav = new mapboxgl.NavigationControl();
map.addControl(nav, 'bottom-right');

if($(window).innerWidth() < 728){
  map.scrollZoom.disable();
}

map.on('load', function(){
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
      'visibility': 'visible',
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
      'icon-allow-overlap': true,
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
      'icon-allow-overlap': true,
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
      'icon-allow-overlap': true,
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
      'icon-allow-overlap': true,
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
      'icon-allow-overlap': true,
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
      'icon-allow-overlap': true,
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
      'icon-allow-overlap': true,
    },
    'source-layer': 'LG-Medical'
  });
});


// Layer IDs
var toggleLayerIds = ['grocery','coffee','shopping','dining','trails','parks','schools','medical'];

// Create Buttons
for(var i = 0; i < toggleLayerIds.length; i++){
  var id = toggleLayerIds[i];
  var link = document.createElement('a');
  link.href = '#';
  link.className = 'active menu-link';
  link.id = id + '-btn';
  link.textContent = id;

  link.onclick = function(e) {
    var clickedLayer = this.textContent;
    e.preventDefault();
    e.stopPropagation();

    var visibility = map.getLayoutProperty(clickedLayer, 'visibility');

    if(visibility === 'visible'){
      map.setLayoutProperty(clickedLayer, 'visibility', 'none');
      this.className = 'menu-link';
    } else {
      this.className = 'active menu-link';
      map.setLayoutProperty(clickedLayer, 'visibility', 'visible');
    }
  };
  var layers = document.getElementById('menu');
  layers.appendChild(link);
}