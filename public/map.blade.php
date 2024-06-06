<!DOCTYPE html>
<html>
<head>
    <title>VIAJA SEGURO, VIAJA CON BUSBOT</title>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAvt3_sOIfzb-H_9BIKmZR92NrCxRjbHzY&libraries=places&callback=initMap"></script>
    <script>
        function initMap() {
            const sonora = { lat: 29.072967, lng: -110.955919 };
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
            const travelCostElement = document.getElementById('travelCost');

            cities.forEach(city => {
                const option = document.createElement('option');
                option.textContent = city;
                originSelect.appendChild(option.cloneNode(true));
                destinationSelect.appendChild(option);
            });

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
                        travelTimeElement.textContent = "Tiempo aproximado de viaje en Busbot: " + time;
                        const cost = calculateTravelCost(route.legs[0].duration);
                        travelCostElement.textContent = "Costo estimado del viaje: $" + cost.toFixed(2) + " MXN";
                    } else {
                        console.error('Error al obtener la ruta: ' + status);
                    }
                });
            }

            function calculateTravelCost(duration) {
                const timeParts = duration.text.match(/(\d+)(?:\s+hora[s]*\s+)?(?:\s+(\d+)\s+minuto[s]*)?/);
                let hours = parseInt(timeParts[1]) || 0;
                let minutes = parseInt(timeParts[2]) || 0;
                const totalMinutes = hours * 60 + minutes;

                if (totalMinutes <= 90) {
                    return 450.00;
                } else if (totalMinutes <= 135) {
                    return 680.00;
                } else if (totalMinutes <= 210) {
                    return 820.00;
                } else if (totalMinutes <= 330) {
                    return 950.00;
                } else if (totalMinutes <= 510) {
                    return 1020.00;
                } else {
                    return 1300.00;
                }
            }
        }

        function handlePayment() {
            alert("Redirigiendo a la página de pago...");
            // Aquí puedes añadir la lógica para redirigir a la página de pago
        }

        function handleExit() {
            window.close();
        }
    </script>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
            background-color: #f7f7f7;
        }
        h1 {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            margin: 0;
            width: 100%;
            text-align: center;
        }
        .container {
            width: 90%;
            max-width: 1200px;
            margin: 20px 0;
            padding: 20px;
            background-color: white;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
        }
        label {
            display: block;
            margin: 10px 0 5px;
            font-weight: bold;
        }
        select {
            width: 100%;
            padding: 10px;
            margin-bottom: 20px;
            border-radius: 4px;
            border: 1px solid #ccc;
        }
        #travelTime, #travelCost {
            margin: 20px 0;
            font-size: 18px;
            color: #333;
        }
        #map {
            height: 500px;
            width: 100%;
            border-radius: 8px;
        }
        .button-container {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }
        button {
            padding: 10px 20px;
            font-size: 16px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }
        .pay-button {
            background-color: #4CAF50;
            color: white;
        }
        .exit-button {
            background-color: #f44336;
            color: white;
        }
    </style>
</head>
<body>
    <h1>VIAJA SEGURO, VIAJA CON BUSBOT</h1>
    <div class="container">
        <label for="originSelect">Selecciona la ciudad de origen:</label>
        <select id="originSelect">
            <option value="" disabled selected>Elige una ciudad</option>
        </select>
        <label for="destinationSelect">Selecciona la ciudad de destino:</label>
        <select id="destinationSelect">
            <option value="" disabled selected>Elige una ciudad</option>
        </select>
        <div id="travelTime"></div>
        <div id="travelCost"></div>
        <div id="map"></div>
        <div class="button-container">
            <button class="pay-button" onclick="handlePayment()">Pagar</button>
            <button class="exit-button" onclick="handleExit()">Salir</button>
        </div>
    </div>
</body>
</html>
