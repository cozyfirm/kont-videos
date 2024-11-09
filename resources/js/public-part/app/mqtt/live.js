// import { Notify } from '../../../style/layout/notify.ts';
// import { MqttInit } from '../../../mqtt/mqtt-init.ts';
//
// import mqtt from "mqtt"; // import namespace "mqtt"
//
// $(document).ready(function(){
//     let mqttConnected = false, mqttSubscribed = false, subscribedTopic = '';
//
//     const client   = mqtt.connect("wss://mqtt.cozyfirm.com:8083", MqttInit.options);
//     client.on('error', (err) => { client.end() });
//     client.on('reconnect', () => { console.log('Reconnecting...'); });
//
//     client.on('connect', () => {
//         mqttConnected = true;
//
//         subscribedTopic = import.meta.env.VITE_GLOBAL_CH;
//         client.subscribe(import.meta.env.VITE_GLOBAL_CH, { qos: 0 });
//
//         console.log("Connected to MQTT. Subscribed to " + subscribedTopic + "!");
//     });
//
//     client.on('message', (topic, message, packet) => {
//         console.log(message.toString());
//     });
// });
