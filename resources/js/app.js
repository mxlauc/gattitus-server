require('./bootstrap');


import {createApp, provide} from 'vue';
import HeaderComponent from './components/HeaderComponent.vue';

window.app = createApp({
    components: {
        HeaderComponent,
    }
});



