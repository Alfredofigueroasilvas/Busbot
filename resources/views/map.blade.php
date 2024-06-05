<!DOCTYPE html>
<html>
<head>
    <title>Ruta entre Ciudades en Sonora</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvt3_sOIfzb-H_9BIKmZR92NrCxRjbHzY&libraries=places&callback=initMap"></script>
    <script>
        function initMap() {
            // Inicializa el mapa centrado en el estado de Sonora
            const sonora = { lat: 29.072967, lng: -110.955919 }; // Coordenadas aproximadas de Sonora
            const map = new google.maps.Map(document.getElementById("map"), {
                zoom: 7,
                center: sonora
            });

            // Lista de ciudades en Sonora
            const cities = [
                'San Luis Rio Colorado, Sonora, Mexico',
                'Caborca, Sonora, Mexico',
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

            // Define las solicitudes de rutas entre cada par de ciudades consecutivas
            for (let i = 0; i < cities.length - 1; i++) {
                calculateAndDisplayRoute(directionsService, directionsRenderer, cities[i], cities[i + 1]);
            }
        }

        function calculateAndDisplayRoute(directionsService, directionsRenderer, origin, destination) {
            const request = {
                origin: origin,
                destination: destination,
                travelMode: 'DRIVING'
            };

            directionsService.route(request, function(result, status) {
                if (status === 'OK') {
                    directionsRenderer.setDirections(result);
                } else {
                    console.error('Error al obtener la ruta: ' + status);
                }
            });
        }
    </script>
    <style>
        /* Añade estilo para el contenedor del mapa */
        #map {
            height: 500px;
            width: 100%;
        }
    </style>
</head>
<body>
    <h1>Ruta entre Ciudades en Sonora</h1>
    <div id="map"></div>
</body>
</html>
