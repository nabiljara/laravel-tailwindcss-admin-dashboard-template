import mqtt from 'mqtt'
// const mqtt = require('mqtt')
const connection = () =>{

const clientId = `mqtt_${Math.random().toString(16).slice(3)}`
const connectUrl = `ws://150.230.80.1:8083/mqtt`
const options = {
  clientId,
  clean: true,
  connectTimeout: 4000,
  username: 'Nabil',
  password: '1234',
  reconnectPeriod: 10000,
  keepalive: 60,
}
const topic = "test";
const client = mqtt.connect(connectUrl, options)
      client.on('connect', () => {
        console.log("Connected!")
      })
      client.subscribe(topic, () => {
        console.log(`Subscribe to topic '${topic}'`)
      })
      client.on('message', (topic, payload) => {
        //insert on bd mongo
        let strMessage = payload.toString();
        let objMessage = JSON.parse(strMessage);
        console.log(objMessage.msg)
      });
    }
export default connection;
