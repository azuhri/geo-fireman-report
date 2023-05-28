<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>WEB GIS</title>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.9.3/dist/leaflet.css" integrity="sha256-kLaT2GOSpHechhsozzB+flnD+zUyjE2LlfWPgU04xyI=" crossorigin=""/>
    @vite('resources/css/app.css')
</head>
<body>

    <div class="sm:blocks w-full p-2 md:flex">
        <div class="mx-4">
            <div id="map" class="border-4 border-green-800 min-h-[300px] sm:min-w-[300px] sm:min-w-[500px] md:min-h-[500px] max-w-[800px]"></div>
        </div>
        <form class="p-4">
            <div class="my-2 flex flex-col">
                <label for="longitude">Longitude</label>
                <input type="number" id="longitude" placeholder="enter longitude..">
            </div>
            <div class="my-2 flex flex-col">
                <label for="latitude">Latitude</label>
                <input type="number" id="latitude" placeholder="enter latitude..">
            </div>
        </form>
    </div>
<script src="https://unpkg.com/leaflet@1.9.3/dist/leaflet.js" integrity="sha256-WBkoXOwTeyKclOHuWtc+i2uENFpDZ9YPdf5Hf+D7ewM=" crossorigin=""></script> --}}
<script>
    var map = L.map('map').setView([-7.275612, 112.6301103], 13);

    // Open Street
    // L.tileLayer('https://tile.openstreetmap.org/{z}/{x}/{y}.png', {
    //     maxZoom: 19,
    //     attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
    // }).addTo(map);

    // Google Streets
    // googleStreets = L.tileLayer('http://{s}.google.com/vt/lyrs=m&x={x}&y={y}&z={z}',{
    //     maxZoom: 20,
    //     subdomains:['mt0','mt1','mt2','mt3']
    // }).addTo(map);

    // Google Hybrid
    // googleHybrid = L.tileLayer('http://{s}.google.com/vt/lyrs=s,h&x={x}&y={y}&z={z}',{
    //     maxZoom: 20,
    //     subdomains:['mt0','mt1','mt2','mt3']
    // }).addTo(map);

  
    // Google Terrain
    googleTerrain = L.tileLayer('http://{s}.google.com/vt/lyrs=p&x={x}&y={y}&z={z}',{
        maxZoom: 30,
        subdomains:['mt0','mt1','mt2','mt3']
    }).addTo(map);
    let icon = L.icon({
        iconUrl: '{{url("/")}}/icons/pin-red.png',

        iconSize:     [25, 25], // size of the icon
        shadowSize:   [50, 64], // size of the shadow
        iconAnchor:   [12, 25], // point of the icon which will correspond to marker's location
        shadowAnchor: [4, 62],  // the same for the shadow
        popupAnchor:  [-3, -76] // point from which the popup should open relative to the iconAnchor
    });
    let changeIcons = (name) => {
        return L.icon({
            iconUrl: `{{url("/")}}/icons/${name}.png`,

            iconSize:     [25, 25], // size of the icon
            shadowSize:   [50, 64], // size of the shadow
            iconAnchor:   [12, 25], // point of the icon which will correspond to marker's location
            shadowAnchor: [4, 62],  // the same for the shadow
            popupAnchor:  [2, -20] // point from which the popup should open relative to the iconAnchor
        });
    }
    map.on('click', function(ev) {
        let {lat, lng}= ev.latlng;
        console.log(`latitude: ${lat}`);
        console.log(`longitude: ${lng}`);
        
        L.circle([lat, lng], {
            color: 'pink',
            fillColor: '#f03',
            fillOpacity: 0.4,
            radius: 200
        }).addTo(map);

         L.marker([lat, lng], {icon: changeIcons('pin-red')}).addTo(map)
        .bindPopup('A pretty CSS popup.<br> Easily customizable.')
        .openPopup();
    });

    map.on('mouseover', function() {
        map.getContainer().style.cursor = 'crosshair';
    });

    // var circle = L.circle([-7.3081029, 112.7850642], {
    //     color: 'pink',
    //     fillColor: '#f03',
    //     fillOpacity: 0.4,
    //     radius: 200
    // }).addTo(map);

    // L.circle([-7.300217, 112.7477243], {
    //     color: 'pink',
    //     fillColor: '#f03',
    //     fillOpacity: 0.4,
    //     radius: 200
    // }).addTo(map);

    // L.marker([-7.3081029, 112.7850642], {icon: changeIcons('pin-red.png')}).addTo(map)
    // .bindPopup('A pretty CSS popup.<br> Easily customizable.')
    // .openPopup();
    // L.marker([-7.300217, 112.7477243], {icon: changeIcons('pin-blue.png')}).addTo(map)
    // .bindPopup('A pretty CSS popup.<br> Easily customizable.')
    // .openPopup();
</script>
</body>
</html>