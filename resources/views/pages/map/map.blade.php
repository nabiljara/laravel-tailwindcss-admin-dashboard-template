<x-app-layout>

  

 
    <div id="map"></div>


    <x-maps-leaflet leafletVersion='1.9.4' :markers="[{{ $markers }}]"></x-maps-leaflet>


    {{--
    <x-maps-leaflet leafletVersion='1.9.4' :markers="[['lat' => 52.16444513293423, 'long' => 5.985622388024091, 'info' => 'kdajslkjasjdlwqjijdoiwqjjwqo']]"></x-maps-leaflet>

           
 
       <x-maps-google :markers={{$markers}} :centerToBoundsCenter="true" :zoomLevel="7" ></x-maps-google>
           
    <x-maps-leaflet :markers="{{$markers}}"></x-maps-leaflet> 

<x-maps-google
    :markers="[
        ['lat' => 46.056946, 'long' => 14.505752],
        ['lat' => 41.902782, 'long' => 12.496365]
    ]"            
    :centerToBoundsCenter="true"
    :zoomLevel="7"
></x-maps-google>
   
--}}

</x-app-layout>

{{-- 
<script>
  fetch('/json-key-feed')
      .then(a => {
          return a.json();
      })
      .then(result => {
          console.log(result.api_key)
          
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
                  //console.log('Respuesta del servidor:', data);

                 var componente = "<x-maps-google :markers=["; 

                  data.stations.forEach((station) => 
                    componente += "[\'lat\' =>" + station.latitude + ", \'long\' =>" + station.longitude + ", \'title\' =>\'" + station.station_name +"\'],"; 
                  );

                  componente += '] :centerToBoundsCenter=\"true\" :zoomLevel=\"7\">';

                  componente += '</x-maps-google>';
                  console.log(componente);
                  document.getElementById("map").innerHtml =componente;
                      
              })
              .catch(error => {
                  console.error('Error en la solicitud:', error);
              });
      });
</script> --}}
