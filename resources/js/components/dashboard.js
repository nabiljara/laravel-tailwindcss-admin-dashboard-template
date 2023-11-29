import { Tabs, Dismiss } from "flowbite";
import connection from "./connection.js";
import axios from "axios";

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
    //const topic = "Alertas";

    const stations = {
        123501: {
            name: "Cielos del Sur", //
            topics: {
                temp: 525320,
                hum: 525320,
                dew_point: 525320,
                wind_speed_last: 464200,
                rain_storm_last_mm: 464200,
                battery_voltage: 462215,
                bar_absolute: 462216,
            },
        },
        138225: {
            name: "Glyn", //
            topics: {
                temp: 525327,
                hum: 525327,
                dew_point: 525327,
                battery_voltage: 525169,
                bar_absolute: 525170,
            },
        },
        145839: {
            name: "Villa Favaloro (Los Antiguos)",
            topics: {
                temp: 653825,
                hum: 653825,
                dew_point: 653825,
                wind_speed_last: 653824,
                wind_dir_last: 653824,
                rain_storm_last_mm: 653824,
                battery_voltage: 653824,
                "bar-absolute": 557448,
            },
        },
        145862: {
            name: "Las Santinas VIRCH",
            topics: {
                temp: 558414,
                hum: 558414,
                dew_point: 558414,
                battery_voltage: 557536,
                bar_absolute: 557537,
            },
        },
        167442: {
            name: "Glyn 3",
            topics: {
                temp: 653139,
                hum: 653139,
                dew_point: 653139,
                battery_voltage: 650012,
                bar_absolute: 650019,
            },
        },
    };

    const topicsAttr = {
        temp: {
            description: "Temperatura",
            unit: "° C",
        },
        hum: {
            description: "Humedad",
            unit: "%",
        },
        dew_point: {
            description: "Punto de rocio",
            unit: "° C",
        },
        wind_speed_last: {
            description: "Velocidad del viento",
            unit: "km/h",
        },
        wind_dir_last: {
            description: "Dirección del viento",
            unit: "°",
        },
        rain_storm_last_mm: {
            description: "Lluvia",
            unit: "mm",
        },
        battery_voltage: {
            description: "Batería",
            unit: "%",
        },
        bar_absolute: {
            description: "Presión",
            unit: "mbar",
        },
    };

    client.on("message", (topic, payload) => {
        const station_id = topic.split("-")[1];
        const measure = topic.split("/").pop();
        if (!(topic == "Alertas")) {

            triggerElId = CSS.escape(station_id);

            tabs
                .getTab(triggerElId)
                .targetEl.querySelector(`.${measure}`).textContent = payload;
        } else {
            var strValor = new TextDecoder().decode(payload);
            var obj = JSON.parse(strValor);
            var id = obj.topic.split("-")[1];
            var atributo = obj.topic.split("/")[1];

            var fecha = new Date(obj.timestamp);
            var titulo = topicsAttr[atributo]["description"];
            var actual = obj.data;
            var minimo = obj.min;
            var maximo = obj.max;
            var unidad = topicsAttr[atributo]["unit"];
            var cuerpo;

            if (actual > maximo) {
                cuerpo =
                    " actual de " +
                    actual +
                    unidad +
                    " exedio el maximo " +
                    maximo +
                    unidad +
                    " en " +
                    stations[id]["name"];
            } else {
                cuerpo =
                    " actual de " +
                    actual +
                    unidad +
                    " es inferior al minimo " +
                    minimo +
                    unidad +
                    " en " +
                    stations[id]["name"];
            }

            generarAlerta(titulo, cuerpo, fecha);
        }

        // const requestData = {
        //     station_id: station_id,
        //     measure: measure,
        //     payload,
        // };
        // const url = "http://localhost:3000/apiv1/saveData";
        // fetch(url, {
        //     method: "POST",
        //     headers: {
        //         "Content-Type": "application/json",
        //     },
        //     body: JSON.stringify(requestData),
        // })
        //     .then((response) => response.json())
        //     .then((data) => {
        //         console.log(data);
        //     })
        //     .catch((error) => {
        //         console.log(error);
        //     });
    });
};

export default dashboard;
