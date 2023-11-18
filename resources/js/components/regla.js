import {
    Tabs
} from 'flowbite';
import connection from './connection.js';
import { forEach } from 'lodash';

const regla = () =>{

addEventListener("submit", (event) => {
    const client = connection();

    stationName = tabs.getActiveTab().targetEl.getAttribute('aria-labelledby');

    var query = "SELECT * FROM "+ stationName + " WHERE"; // stationName
    var payload = '{"topic": " + stationName + ", "data": {'; // stationName

    ids = {
        'temperatura_max': ' payload.data.temp <=  ', 
        'temperatura_min': ' payload.data.temp >= ', 
        'viento,_max': ' payload.data.wind_speed_hi_last_2_min <= ', 
        'viento_min': ' payload.data.wind_speed_hi_last_2_min >= ', 
        'humedad_max': ' payload.data.hum <= ', 
        'humedad_min': ' payload.data.hum >= ', 
        'rocio_max': ' payload.data.dew_point <= ', 
        'rocio_min': ' payload.data.dew_point >= '
    };
 
    atributos = {}; // setear

    var valor;
    var primero = true;
    var atributo;
    ids.forEach(function(id) {
        valor = document.getElementById(id);
        if (valor != ''){
            primero = false;
        };
        query += (primero? 'AND' : '') + ids[id] + valor;

        atributo = id.slice(0, id.indexOf('_')); 
        if (!atributos[artributo] && (document.getElementById(atributo+'_max') != ''  || document.getElementById(atributo+'_min'))) {
            atributos[artributo] = true;
            payload += ((ids[id].split('.'))[3]).slice(0, id.indexOf(' ')) + ': ' + ; // dato actual     
            // payload += '"temp": \${payload.data.temp}, ';
        }

    });

    query += ';';

    payload = payload.substring(0, payload.length - 2);
    payload += '}}';

    client.emit('message', payload);
});

}

export default regla;