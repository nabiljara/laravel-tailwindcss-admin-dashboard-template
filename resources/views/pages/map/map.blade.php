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

        .property .house {
            color: #1eb9b1;
        }

        .property .rain {
            color: #889b9a;
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
    <!-- Nav -->
    <div
        class="fixed z-50 w-full h-16 max-w-md -translate-x-1/2 bg-white border border-gray-200 rounded-full bottom-4 left-1/2 dark:bg-gray-700 dark:border-gray-600">

        <div class="grid h-full max-w-lg grid-cols-3 mx-auto">
            <button data-tooltip-target="tooltip-home" type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-s-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href={{ route('dashboard') }}>
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="m19.707 9.293-2-2-7-7a1 1 0 0 0-1.414 0l-7 7-2 2a1 1 0 0 0 1.414 1.414L2 10.414V18a2 2 0 0 0 2 2h3a1 1 0 0 0 1-1v-4a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1v4a1 1 0 0 0 1 1h3a2 2 0 0 0 2-2v-7.586l.293.293a1 1 0 0 0 1.414-1.414Z" />
                    </svg>
                    <span class="sr-only">Dashboard</span>
                </a>
            </button>
            <div id="tooltip-home" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Dashboard
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <button data-tooltip-target="tooltip-mapa" type="button"
                class="inline-flex flex-col items-center justify-center px-5 hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href={{ route('map') }}>
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M8 0a7.992 7.992 0 0 0-6.583 12.535 1 1 0 0 0 .12.183l.12.146c.112.145.227.285.326.4l5.245 6.374a1 1 0 0 0 1.545-.003l5.092-6.205c.206-.222.4-.455.578-.7l.127-.155a.934.934 0 0 0 .122-.192A8.001 8.001 0 0 0 8 0Zm0 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6Z" />
                    </svg>
                    <span class="sr-only">Mapa</span>
                </a>
            </button>
            <div id="tooltip-mapa" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Mapa
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>

            <button data-tooltip-target="tooltip-profile" type="button"
                class="inline-flex flex-col items-center justify-center px-5 rounded-e-full hover:bg-gray-50 dark:hover:bg-gray-800 group">
                <a href="{{ route('profile.show') }}">
                    <svg class="w-5 h-5 mb-1 text-gray-500 dark:text-gray-400 group-hover:text-blue-600 dark:group-hover:text-blue-500"
                        aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="currentColor" viewBox="0 0 20 20">
                        <path
                            d="M10 0a10 10 0 1 0 10 10A10.011 10.011 0 0 0 10 0Zm0 5a3 3 0 1 1 0 6 3 3 0 0 1 0-6Zm0 13a8.949 8.949 0 0 1-4.951-1.488A3.987 3.987 0 0 1 9 13h2a3.987 3.987 0 0 1 3.951 3.512A8.949 8.949 0 0 1 10 18Z" />
                    </svg>
                    <span class="sr-only">Perfil</span>
                </a>
            </button>
            <div id="tooltip-profile" role="tooltip"
                class="absolute z-10 invisible inline-block px-3 py-2 text-sm font-medium text-white transition-opacity duration-300 bg-gray-900 rounded-lg shadow-sm opacity-0 tooltip dark:bg-gray-700">
                Perfil
                <div class="tooltip-arrow" data-popper-arrow></div>
            </div>
        </div>
    </div>
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
                    // console.log(stations);
                    stations.forEach(function(station) {
                        properties.push({
                            address: station.city + ", " + station.country,
                            description: station.station_name,
                            name: station.station_name,
                            id: station.station_id,
                            type: "house-signal",
                            temp: "-",
                            wind: "-",
                            hum: "-",
                            rain: "-",
                            position: {
                                lat: station.latitude,
                                lng: station.longitude,
                            },
                        });
                    });
                    // console.log(properties);
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
        <i aria-hidden="true" class="fa fa-icon fa-${property.type} house" title="${property.type}"></i>
        <span class="fa-sr-only">${property.type}</span>
    </div>
    <div class="details">
        <div class="name">${property.name}</div>
        <div class="address">${property.address}</div>
        <div id="${property.id}" class="features">
        <div>
            <i aria-hidden="true" class="fa-solid fa-temperature-low fa-lg temp" title="Temperatura"></i>
            <span class="fa-sr-only">Temperatura</span>
            <span class="{{ $topics['Temperatura'] }}">${property.temp}</span><span>°C</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-cloud fa-lg hum" title="Humedad"></i>
            <span class="fa-sr-only">Humedad</span>
            <span class="{{ $topics['Humedad'] }}">${property.hum}</span><span> %</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa fa-wind fa-lg wind" title="Viento"></i>
            <span class="fa-sr-only">Viento</span>
            <span class= "{{ $topics['Viento'] }}">${property.wind}</span><span>Km/h</span>
        </div>
        <div>
            <i aria-hidden="true" class="fa-solid fa-cloud-showers-heavy fa-lg rain" title="Lluvia"></i>
            <span class="fa-sr-only">Lluvia</span>
            <span class= "{{ $topics['Lluvia'] }}">${property.rain}</span><span> mm</span>
        </div>
        </div>
    </div>
    `;
            return content;
        }
    </script>
    <!-- prettier-ignore -->
    <script loading=async async defer src="https://maps.googleapis.com/maps/api/js?key={{ env('MAPS_GOOGLE_MAPS_ACCESS_TOKEN') }}&callback=initMap"></script>
    <script async defer src="https://polyfill.io/v3/polyfill.min.js?features=default"></script>
    <script async defer src="https://use.fontawesome.com/releases/v6.2.0/js/all.js"></script>
    <script>
        const clientId = `mapa_clima`;
        const connectUrl = `ws://150.230.80.1:8083/mqtt`;
        const options = {
            clientId,
            clean: false,
            connectTimeout: 4000,
            username: "Tomas",
            password: "1234",
            reconnectPeriod: 5000,
            keepalive: 0,
        };
        // const topic = "Estación-145839-Sensor-557448/bar-absolute";
        const client = mqtt.connect(connectUrl, options);
        client.on("connect", () => {
            console.log("Connected!");
        });

        const topics = [
            "Estación-123501-Sensor-525320/temp",
            "Estación-123501-Sensor-525320/hum",
            "Estación-123501-Sensor-464200/wind_speed_last",
            "Estación-123501-Sensor-464200/rain_storm_last_mm",
            "Estación-138225-Sensor-525327/temp",
            "Estación-138225-Sensor-525327/hum",
            "Estación-145839-Sensor-653825/temp",
            "Estación-145839-Sensor-653825/hum",
            "Estación-145839-Sensor-653824/wind_speed_last",
            "Estación-145839-Sensor-653824/rain_storm_last_mm",
            "Estación-145862-Sensor-558414/temp",
            "Estación-145862-Sensor-558414/hum",
            "Estación-167442-Sensor-653139/temp",
            "Estación-167442-Sensor-653139/hum",
        ];

        topics.forEach((topic) => {
            client.subscribe(topic, {
                qos: 0,
                retain: true
            }, () => {
                // console.log(`Subscribed to topic '${topic}'`);
            });
        });

        client.on('message', (topic, payload) => {
            if (!(topic == "Alertas")) {

                const station_id = topic.split("-")[1];
                const measure = topic.split("/").pop().split("_")[0];
                const stationId = CSS.escape(station_id);
                // console.log(measure);
                // console.log(station_id);
                // console.log(stationId)
                const element = document.querySelector(`#${stationId}`);
                // console.log(element);
                element.getElementsByClassName(`${measure}`)[1].textContent = payload;
                // document.getElementById(stationId).getElementsByClassName(`${measure}`)[1].textContent = payload;
            }
        });
        // tabs.getTab(triggerElId).targetEl.querySelector(`.${measure}`).textContent = payload;
    </script>
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
