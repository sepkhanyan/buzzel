
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import '../bootstrap';
import '../plugins';
import VueMuuri from 'vue-muuri';
import BootstrapVue from 'bootstrap-vue'


import 'bootstrap/dist/css/bootstrap.css'
import 'bootstrap-vue/dist/bootstrap-vue.css'
// You need a specific loader for CSS files like https://github.com/webpack/css-loader
//import 'vue-muuri/dist/vue-muuri.css';
import { Slide } from 'vue-burger-menu'
import * as VueGoogleMaps from 'vue2-google-maps'

import Vue from 'vue';
import VueSlideoutPanel from 'vue2-slideout-panel';
import VueQrcode from '@chenfengyuan/vue-qrcode';
import CKEditor from '@ckeditor/ckeditor5-vue';
Vue.use( CKEditor );

Vue.use(VueGoogleMaps, {
    load: {
      key: 'AIzaSyAddazTu6MeLaef_NguCtT7SC-f56q1Kus',
      libraries: 'places', // This is required if you use the Autocomplete plugin
      // OR: libraries: 'places,drawing'
      // OR: libraries: 'places,drawing,visualization'
      // (as you require)
  
      //// If you want to set the version, you can do so:
      // v: '3.26',
    },
  
    //// If you intend to programmatically custom event listener code
    //// (e.g. `this.$refs.gmap.$on('zoom_changed', someFunc)`)
    //// instead of going through Vue templates (e.g. `<GmapMap @zoom_changed="someFunc">`)
    //// you might need to turn this on.
    // autobindAllEvents: false,
  
    //// If you want to manually install components, e.g.
    //// import {GmapMarker} from 'vue2-google-maps/src/components/marker'
    //// Vue.component('GmapMarker', GmapMarker)
    //// then set installComponents to 'false'.
    //// If you want to automatically install all the components this property must be set to 'true':
    installComponents: true
  })


Vue.component(VueQrcode.name, VueQrcode);
Vue.use(VueSlideoutPanel);
Vue.use(Slide);
window.Vue = Vue;

//support vuex
import Vuex from 'vuex'
Vue.use(Vuex)


import storeData from "./components/guide/store"

const store = new Vuex.Store(
   storeData
)

window.Vue.use(VueMuuri);
window.Vue.use(BootstrapVue);

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i);
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default));

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('guide-component', require('./components/guide/GuideComponent.vue').default);
Vue.component('chose-category-component', require('./components/guide/ChoseCategoryComponent.vue').default);
Vue.component('chose-template-component', require('./components/guide/ChoseTemplateComponent.vue').default);
Vue.component('chose-guide-details', require('./components/guide/ChoseGuideDetailsComponent.vue').default);
Vue.component('learn-more-template', require('./components/guide/LearnTemplateComponent.vue').default);
Vue.component('widget-setting', require('./components/guide/WidgetSettingComponent.vue').default);
Vue.component('edit-guide-details', require('./components/guide/EditGuideComponent.vue').default);
Vue.component('device-preview-code', require('./components/guide/DevicePreviewCodeComponent.vue').default);
Vue.component('add-widget-component', require('./components/guide/AddWidgetComponent.vue').default);
Vue.component('pending-guides-component', require('./components/guide/PendingGuidesComponent.vue').default);

Vue.component('widget-input-slot', require('./components/guide/widget_inputs/SlotsComponent.vue').default);
Vue.component('slot-facebook', require('./components/guide/widget_inputs/slots/FacebookComponent.vue').default);
Vue.component('slot-twitter', require('./components/guide/widget_inputs/slots/TwitterComponent.vue').default);
Vue.component('slot-instagram', require('./components/guide/widget_inputs/slots/InstagramComponent.vue').default);
Vue.component('slot-youtube', require('./components/guide/widget_inputs/slots/YoutubeComponent.vue').default);
Vue.component('slot-vimeo', require('./components/guide/widget_inputs/slots/VimeoComponent.vue').default);
Vue.component('slot-album', require('./components/guide/widget_inputs/slots/AlbumComponent.vue').default);
Vue.component('slot-map', require('./components/guide/widget_inputs/slots/MapComponent.vue').default);
Vue.component('slot-view', require('./components/guide/widget_inputs/slots/ViewComponent.vue').default);
Vue.component('slot-webview', require('./components/guide/widget_inputs/slots/WebViewComponent.vue').default);
Vue.component('slot-list', require('./components/guide/widget_inputs/slots/ListComponent.vue').default);
Vue.component('slot-venue', require('./components/guide/widget_inputs/slots/VenueComponent.vue').default);
Vue.component('slot-ads', require('./components/guide/widget_inputs/slots/AdsComponent.vue').default);
Vue.component('slot-qrcode', require('./components/guide/widget_inputs/slots/QrCodeComponent.vue').default);

Vue.component('slot-todo', require('./components/guide/widget_inputs/slots/TodoComponent.vue').default);
Vue.component('slot-notes', require('./components/guide/widget_inputs/slots/NotesComponent.vue').default);
Vue.component('slot-myschedule', require('./components/guide/widget_inputs/slots/MyScheduleComponent.vue').default);
Vue.component('slot-inbox', require('./components/guide/widget_inputs/slots/InboxComponent.vue').default);
//Vue.component('main-component', require('./components/guide/MainComponent.vue').default);


/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    store, //vuex

});