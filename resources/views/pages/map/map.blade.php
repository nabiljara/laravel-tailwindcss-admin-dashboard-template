<x-app-layout>

    <style>
        :root {
            --building-color: #FF9800;
            --house-color: #0288D1;
            --house-signal-color: #0288D1;
            --shop-color: #7B1FA2;
            --warehouse-color: #558B2F;
        }

        #map {
            height: 100vh;
            width: 100%;
        }

        .property {
            align-items: center;
            background-color: #ffffff;
            border-radius: 50%;
            color: #263238;
            display: flex;
            font-size: 14px;
            gap: 15px;
            height: 30px;
            justify-content: center;
            padding: 4px;
            position: relative;
            position: relative;
            transition: all 0.3s ease-out;
            width: 30px;
        }

        .property::after {
            border-left: 9px solid transparent;
            border-right: 9px solid transparent;
            border-top: 9px solid #FFFFFF;
            content: "";
            height: 0;
            left: 50%;
            position: absolute;
            top: 95%;
            transform: translate(-50%, 0);
            transition: all 0.3s ease-out;
            width: 0;
            z-index: 1;
        }

        .property .icon {
            align-items: center;
            display: flex;
            justify-content: center;
            color: #FFFFFF;
        }

        .property .icon svg {
            height: 20px;
            width: auto;
        }

        .property .details {
            display: none;
            flex-direction: column;
            flex: 1;
        }

        .property .address {
            color: #9E9E9E;
            font-size: 10px;
            margin-bottom: 10px;
            margin-top: 5px;
        }

        .property .features {
            align-items: flex-end;
            display: flex;
            flex-direction: row;
            gap: 10px;
        }

        .property .features>div {
            align-items: center;
            background: #F5F5F5;
            border-radius: 5px;
            border: 1px solid #ccc;
            display: flex;
            font-size: 10px;
            gap: 5px;
            padding: 5px;
        }

        /*
 * Property styles in highlighted state.
 */
        .property.highlight {
            background-color: #FFFFFF;
            border-radius: 8px;
            box-shadow: 10px 10px 5px rgba(0, 0, 0, 0.2);
            height: 80px;
            padding: 8px 15px;
            width: auto;
        }

        .property.highlight::after {
            border-top: 9px solid #FFFFFF;
        }

        .property.highlight .details {
            display: flex;
        }

        .property.highlight .icon svg {
            width: 50px;
            height: 50px;
        }

        .property .temp {
            color: #ff0000;
        }

        .property .wind {
            color: #03A9F4;
        }

        .property .hum {
            color: #388E3C;
        }

        /*
 * House icon colors.
 */
        .property.highlight:has(.fa-house) .icon {
            color: var(--house-color);
        }

        .property:not(.highlight):has(.fa-house) {
            background-color: var(--house-color);
        }

        .property:not(.highlight):has(.fa-house)::after {
            border-top: 9px solid var(--house-color);
        }

        /*
 * Building icon colors.
 */
        .property.highlight:has(.fa-building) .icon {
            color: var(--building-color);
        }

        .property:not(.highlight):has(.fa-building) {
            background-color: var(--building-color);
        }

        .property:not(.highlight):has(.fa-building)::after {
            border-top: 9px solid var(--building-color);
        }

        /*
 * Warehouse icon colors.
 */
        .property.highlight:has(.fa-warehouse) .icon {
            color: var(--warehouse-color);
        }

        .property:not(.highlight):has(.fa-warehouse) {
            background-color: var(--warehouse-color);
        }

        .property:not(.highlight):has(.fa-warehouse)::after {
            border-top: 9px solid var(--warehouse-color);
        }

        /*
 * Shop icon colors.
 */
        .property.highlight:has(.fa-shop) .icon {
            color: var(--shop-color);
        }

        .property:not(.highlight):has(.fa-shop) {
            background-color: var(--shop-color);
        }

        .property:not(.highlight):has(.fa-shop)::after {
            border-top: 9px solid var(--shop-color);
        }

        .property.highlight:has(.fa-house-signal) .icon {
            color: var(--house-signal-color);
        }

        .property:not(.highlight):has(.fa-house-signal) {
            background-color: var(--house-signal-color);
        }

        .property:not(.highlight):has(.fa-house-signal)::after {
            border-top: 9px solid var(--house-signal-color);
        }
    </style>
    <div id="map"></div>
    <script>
        async function initMap() {
            // Request needed libraries.
            const {
                Map
            } = await google.maps.importLibrary("maps");
            const {
                AdvancedMarkerElement
            } = await google.maps.importLibrary("marker");
            const center = {
                lat: -43.815053,
                lng: -67.819730
            };
            const map = new Map(document.getElementById("map"), {
                zoom: 7,
                center,
                mapId: "4504f8b37365c3d0",
            });
            var properties = [];
            (async () => {
                try {
                    const responseA = await fetch('/json-key-feed');
                    const result = await responseA.json();

                    const url = 'http://localhost:3000/apiv1/estaciones';
                    const data = {
                        api_key: result.api_key,
                        x_api_secret: result.x_api_secret
                    };

                    const responseB = await fetch(url, {
                        method: 'POST',
                        headers: {
                            'Content-Type': 'application/json'
                        },
                        body: JSON.stringify(data)
                    });

                    const responseData = await responseB.json();
                    const stations = responseData.stations;

                    stations.forEach(function(station) {
                        properties.push({
                            address: station.city + ", " + station.country,
                            description: station.station_name,
                            price: station.station_name,
                            type: "house-signal",
                            temp: 5,
                            wind: 4.5,
                            hum: 300,
                            position: {
                                lat: station.latitude,
                                lng: station.longitude,
                            },
                        });
                    });
                    console.log(properties);
                    for (const property of properties) {
                        const AdvancedMarkerElement = new google.maps.marker.AdvancedMarkerElement({
                            map,
                            content: buildContent(property),
                            position: property.position,
                            title: property.description,
                        });

                        AdvancedMarkerElement.addListener("click", () => {
                            toggleHighlight(AdvancedMarkerElement, property);
                        });
                    }
                } catch (error) {
                    console.error('Error en la solicitud:', error);
                }
            })();
        }

        function toggleHighlight(markerView, property) {
            if (markerView.content.classList.contains("highlight")) {
                markerView.content.classList.remove("highlight");
                markerView.zIndex = null;
            } else {
                markerView.content.classList.add("highlight");
                markerView.zIndex = 1;
            }
        }

        function buildContent(property) {
            const content = document.createElement("div");

            content.classList.add("property");
            content.innerHTML = `
    <div class="icon">
        <i aria-hidden="true" class="fa fa-icon fa-${property.type}" title="${property.type}"></i>
        <span class="fa-sr-only">${property.type}</span>
    </div>
    <div class="details">
        <div class="price">${property.price}</div>
        <div class="address">${property.address}</div>
        <div class="features">
        <div>
            <i aria-hidden="true" class="fa-solid fa-temperature-low fa-lg temp" title="bedroom"></i>
            <span class="fa-sr-only">Temperatura</span>
            <span>${property.temp} °C</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-wind fa-lg wind" title="bathroom"></i>
            <span class="fa-sr-only">Viento</span>
            <span>${property.wind}</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-cloud fa-lg hum" title="size"></i>
            <span class="fa-sr-only">Humedad</span>
            <span>${property.hum} ft<sup>2</sup></span>
        </div>
        </div>
    </div>
    `;
            return content;
        }
    </script>
    <!-- prettier-ignore -->
    <script async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('MAPS_GOOGLE_MAPS_ACCESS_TOKEN') }}&callback=initMap"></script>
    <script async defer src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script async defer src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>
</x-app-layout>


{{-- <script>
  fetch('/json-key-feed')
      .then(a => {
          return a.json();
      })
      .then(result => {          
          const url = 'http://localhost:3000/apiv1/estaciones';
          const data = {
              api_key: result.api_key,
              x_api_secret:  result.x_api_secret
          };
          fetch(url, {
                  method: 'POST',
                  headers: {
                      'Content-Type': 'application/json'
                  },
                  body: JSON.stringify(data)
              })
              .then(response => response.json())
              .then(data => {
                console.log(data.stations);
              })
              .catch(error => {
                  console.error('Error en la solicitud:', error);
              });
      });
</script> --}}
