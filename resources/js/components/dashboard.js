import { Tabs, Dismiss } from "flowbite";
import connection from "./connection.js";
import axios from 'axios';

const dashboard = () => {
    const tabsElement = document.getElementById("tabs");
    const tabElements = [];
    const buttons = document.querySelectorAll("button.station");
    const targets = document.querySelectorAll("div.station-target");

    var triggerElId = null;
    var targetElId = null;

    buttons.forEach((button, i) => {
        const target = targets[i];
        triggerElId = CSS.escape(button.id);
        targetElId = CSS.escape(target.id);
        // console.log(triggerElId);
        // console.log(targetElId);
        tabElements.push({
            id: triggerElId,
            triggerEl: document.querySelector(`#${triggerElId}`),
            targetEl: document.querySelector(`#${targetElId}`),
        });
    });

    const options = {
        defaultTabId: CSS.escape(buttons[0].id),
        // activeClasses: 'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
        // inactiveClasses: 'text-gray-500 hover:t ext-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300'
    };

    // instance options with default values
    const instanceOptions = {
        id: "tabs",
        override: true,
    };

    const tabs = new Tabs(tabsElement, tabElements, options, instanceOptions);
    // shows another tab element
    tabs.show(CSS.escape(buttons[0].id));

    const client = connection();
    const topic = "Alertas";

    const topics = [
        "Estación-123501-Sensor-525320/temp",
        "Estación-123501-Sensor-525320/hum",
        "Estación-123501-Sensor-525320/dew_point",
        "Estación-123501-Sensor-464200/wind_speed_last",
        "Estación-123501-Sensor-464200/wind_dir_last",
        "Estación-123501-Sensor-464200/rain_storm_last_mm",
        "Estación-123501-Sensor-462215/battery_voltage",
        "Estación-123501-Sensor-462216/bar_absolute",
        "Estación-138225-Sensor-525327/temp",
        "Estación-138225-Sensor-525327/hum",
        "Estación-138225-Sensor-525327/dew_point",
        "Estación-138225-Sensor-525169/battery_voltage",
        "Estación-138225-Sensor-525170/bar_absolute",
        "Estación-145839-Sensor-653825/temp",
        "Estación-145839-Sensor-653825/hum",
        "Estación-145839-Sensor-653825/dew_point",
        "Estación-145839-Sensor-653824/wind_speed_last",
        "Estación-145839-Sensor-653824/wind_dir_last",
        "Estación-145839-Sensor-653824/rain_storm_last_mm",
        "Estación-145839-Sensor-653824/battery_voltage",
        "Estación-145839-Sensor-557448/bar-absolute",
        "Estación-145862-Sensor-558414/temp",
        "Estación-145862-Sensor-558414/hum",
        "Estación-145862-Sensor-558414/dew_point",
        "Estación-145862-Sensor-557536/battery_voltage",
        "Estación-145862-Sensor-557537/bar_absolute",
        "Estación-167442-Sensor-653139/temp",
        "Estación-167442-Sensor-653139/hum",
        "Estación-167442-Sensor-653139/dew_point",
        "Estación-167442-Sensor-650012/battery_voltage",
        "Estación-167442-Sensor-650019/bar_absolute",
    ];

    //topics.forEach((topic) => {
        client.subscribe(topic, () => {
            console.log(`Subscribed to topic '${topic}'`);
    // Aquí puedes realizar otras acciones una vez que te suscribas al tema
       });
    //});

    client.on("message", (topic, payload) => {
        
        if (!topic == "Alertas"){

            const station_id = topic.split("-")[1];
            const measure = topic.split("/").pop();
            //console.log(station_id);
            //console.log(measure);
    
            triggerElId = CSS.escape(station_id);
            //console.log(triggerElId);
    
            tabs
                .getTab(triggerElId)
                .targetEl.querySelector(`.${measure}`).textContent = payload;
        }else{
            console.log(payload.data.temp);
        }
    });

    // get the tab object based on ID
    // console.log(tabs.getTab(triggerElId).targetEl.querySelector(".measure"));
    // tabs.getTab(triggerElId).targetEl.querySelector(".measure").textContent = "Hola"; //Forma de acceder al componente correctamente.
    // get the current active tab object

   
     
};

export default dashboard;

// Cielos del sur:

// Estación-123501-Sensor-525320/temp
// Estación-123501-Sensor-525320/hum
// Estación-123501-Sensor-525320/dew_point
// Estación-123501-Sensor-464200/wind_speed_last
// Estación-123501-Sensor-464200/wind_dir_last
// Estación-123501-Sensor-464200/rain_storm_last_mm
// Estación-123501-Sensor-462215/battery_voltage
// Estación-123501-Sensor-462216/bar_absolute

// GLYN:
// Estación-138225-Sensor-525327/temp
// Estación-138225-Sensor-525327/hum
// Estación-138225-Sensor-525327/dew_point
// Estación-138225-Sensor-525169/battery_voltage
// Estación-138225-Sensor-525170/bar_absolute

// FAVALORO:
// Estación-145839-Sensor-653825/temp
// Estación-145839-Sensor-653825/hum
// Estación-145839-Sensor-653825/dew_point
// Estación-145839-Sensor-653824/wind_speed_last
// Estación-145839-Sensor-653824/wind_dir_last
// Estación-145839-Sensor-653824/rain_storm_last_mm
// Estación-145839-Sensor-653824/battery_voltage
// Estación-145839-Sensor-557448/bar-absolute

// Las Santinas:
// Estación-145862-Sensor-558414/temp
// Estación-145862-Sensor-558414/hum
// Estación-145862-Sensor-558414/dew_point
// Estación-145862-Sensor-557536/battery_voltage
// Estación-145862-Sensor-557537/bar_absolute

// Glyn 3:

// Estación-167442-Sensor-653139/temp
// Estación-167442-Sensor-653139/hum
// Estación-167442-Sensor-653139/dew_point
// Estación-167442-Sensor-650012/battery_voltage
// Estación-167442-Sensor-650019/bar_absolute

// Temperatura, presión, humedad, punto de rocío, viento, dirección del viento, lluvia
