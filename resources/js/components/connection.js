import mqtt from "mqtt";
// const mqtt = require('mqtt')
const connection = () => {
    const clientId = `pagina_web_clima`;
    const connectUrl = `ws://150.230.80.1:8083/mqtt`;
    const options = {
        clientId,
        clean: false,
        connectTimeout: 4000,
        username: "Nabil",
        password: "1234",
        reconnectPeriod: 10000,
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
        "Alertas",
    ];

    topics.forEach((topic) => {
        client.subscribe(topic,{ qos: 2, retain: true }, () => {
            console.log(`Subscribed to topic '${topic}'`);
        });
    });
    
    // client.subscribe(topic, () => {
    //   console.log(`Subscribe to topic '${topic}'`)
    // })
    // client.on('message', (topic, payload) => {
    //   //insert on bd mongo
    //   let strMessage = payload.toString();
    //   let objMessage = JSON.parse(strMessage);
    //   console.log(strMessage)
    // });

    return client;
};
export default connection;
