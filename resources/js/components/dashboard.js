import {
    Tabs
} from 'flowbite';
import connection from './connection.js';

const dashboard = () =>{

const tabsElement = document.getElementById('tabs');

// create an array of objects with the id, trigger element (eg. button), and the content element
// const tabElements = [{
//         id: 'profile',
//         triggerEl: document.querySelector('#profile-tab-example'),
//         targetEl: document.querySelector('#profile-example'),
//     },
//     {
//         id: 'dashboard',
//         triggerEl: document.querySelector('#dashboard-tab-example'),
//         targetEl: document.querySelector('#dashboard-example'),
//     },
//     {
//         id: 'settings',
//         triggerEl: document.querySelector('#settings-tab-example'),
//         targetEl: document.querySelector('#settings-example'),
//     },
//     {
//         id: 'contacts',
//         triggerEl: document.querySelector('#contacts-tab-example'),
//         targetEl: document.querySelector('#contacts-example'),
//     },
// ];
const tabElements = [];

const buttons = document.querySelectorAll("button.station");
const targets = document.querySelectorAll("div.station-target");

// buttons.forEach(function(button) {
    
//     console.log(button); // Puedes acceder a las propiedades de cada nodo
// });
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
                })
    });

// options with default values
const options = {
    defaultTabId: CSS.escape(buttons[0].id),
    // activeClasses: 'text-blue-600 hover:text-blue-600 dark:text-blue-500 dark:hover:text-blue-400 border-blue-600 dark:border-blue-500',
    // inactiveClasses: 'text-gray-500 hover:t ext-gray-600 dark:text-gray-400 border-gray-100 hover:border-gray-300 dark:border-gray-700 dark:hover:text-gray-300'
};

// instance options with default values
const instanceOptions = {
    id: 'tabs',
    override: true
};

const tabs = new Tabs(tabsElement, tabElements, options, instanceOptions);
// shows another tab element
tabs.show(CSS.escape(buttons[0].id));

const client = connection();
const topic = "Estación-145839-Sensor-557448/bar-absolute";

client.subscribe(topic, () => {
      console.log(`Subscribe to topic '${topic}'`)
    })
    client.on('message', (topic, payload) => {
    tabs.getTab(triggerElId).targetEl.querySelector(".measure").textContent = payload;
    });
// get the tab object based on ID
// console.log(tabs.getTab(triggerElId).targetEl.querySelector(".measure"));
// tabs.getTab(triggerElId).targetEl.querySelector(".measure").textContent = "Hola"; //Forma de acceder al componente correctamente.
// get the current active tab object
// tabs.getActiveTab();

}

export default dashboard;