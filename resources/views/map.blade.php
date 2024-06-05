<!DOCTYPE html>
<html>
<head>
    <title>Ruta entre Ciudades en Sonora</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvt3_sOIfzb-H_9BIKmZR92NrCxRjbHzY&libraries=places&callback=initMap"></script>
    <script>
        function initMap() {
            const sonora = { lat: 29.072967, lng: -110.955919 }; // Coordenadas aproximadas de Sonora
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: sonora
            });

            const cities = [
                'San Luis Rio Colorado, Sonora, Mexico',
                'Caborca, Sonora, Mexico',
                'Nogales, Sonora, Mexico',
                'Hermosillo, Sonora, Mexico',
                'Guaymas, Sonora, Mexico',
                'Moctezuma, Sonora, Mexico',
                'Arizpe, Sonora, Mexico',
                'Empalme, Sonora, Mexico',
                'Cajeme, Sonora, Mexico',
                'Navojoa, Sonora, Mexico',
                'Huatabampo, Sonora, Mexico'
            ];

            const directionsService = new google.maps.DirectionsService();
            const directionsRenderer = new google.maps.DirectionsRenderer({ suppressMarkers: true });
            directionsRenderer.setMap(map);

            const originSelect = document.getElementById('originSelect');
            const destinationSelect = document.getElementById('destinationSelect');
            const travelTimeElement = document.getElementById('travelTime');

            // Llena los select con las ciudades
            cities.forEach(city => {
                const option = document.createElement('option');
                option.textContent = city;
                originSelect.appendChild(option.cloneNode(true));
                destinationSelect.appendChild(option);
            });

            // Define la solicitud de ruta cuando se selecciona una ciudad
            originSelect.addEventListener('change', function() {
                calculateAndDisplayRoute(directionsService, directionsRenderer, originSelect.value, destinationSelect.value);
            });

            destinationSelect.addEventListener('change', function() {
                calculateAndDisplayRoute(directionsService, directionsRenderer, originSelect.value, destinationSelect.value);
            });

            function calculateAndDisplayRoute(directionsService, directionsRenderer, origin, destination) {
                const request = {
                    origin: origin,
                    destination: destination,
                    travelMode: 'DRIVING'
                };

                directionsService.route(request, function(result, status) {
                    if (status === 'OK') {
                        directionsRenderer.setDirections(result);
                        const route = result.routes[0];
                        const time = route.legs[0].duration.text;
                        travelTimeElement.textContent = "Tiempo de viaje en vehículo: " + time;
                    } else {
                        console.error('Error al obtener la ruta: ' + status);
                    }
                });
            }
        }
    </script>
    <style>
        /* Estilo para el contenedor del mapa */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Ruta entre Ciudades en Sonora</h1>
    <div>
        <label for="originSelect">Selecciona la ciudad de origen:</label>
        <select id="originSelect">
            <option value="" disabled selected>Elige una ciudad</option>
        </select>
    </div>
    <div>
        <label for="destinationSelect">Selecciona la ciudad de destino:</label>
        <select id="destinationSelect">
            <option value="" disabled selected>Elige una ciudad</option>
        </select>
    </div>
    <div id="travelTime"></div>
    <div id="map"></div>
</body>
</html>