/**
 *  This script is only executed while playing videos
 *      - route('public.episodes.*')
 *
 *  At this point, script is used for establish MQTT connection to episode channels, and retrieve data dedicated to
 *  episodes and videos:
 *
 *      1. Number of loads (views)
 *      2. Average rating
 */

import './../bootstrap';

import { Notify } from './../style/layout/notify.ts';
import { MqttInit } from '../mqtt/mqtt-init.ts';

import mqtt from "mqtt"; // import namespace "mqtt"

$(document).ready(function(){
    let mqttConnected = false, mqttSubscribed = false, subscribedTopic = '';
    let mqttHost = 'wss://' + import.meta.env.VITE_MQTT_HOST + ':' + import.meta.env.VITE_MQTT_WS_PORT;

    const client   = mqtt.connect(mqttHost, MqttInit.options);
    client.on('error', (err) => { client.end() });
    client.on('reconnect', () => { console.log('Reconnecting...'); });

    client.on('connect', () => {
        mqttConnected = true;

        subscribedTopic = import.meta.env.VITE_GLOBAL_EP_CH;
        client.subscribe(subscribedTopic, { qos: 0 });

        // console.log("Connected to MQTT. Subscribed to " + subscribedTopic + "!");
    });

    client.on('message', (topic, message, packet) => {
        let msg = JSON.parse(message.toString());
        let msgCode = msg['code'];
        let msgData = msg['data'];

        if(msgCode === '20001'){
            /* Number of loads of episode increased; Increase in GUI */

            $(".episode-total-views").text(msgData['views']);
        }
    });
});

