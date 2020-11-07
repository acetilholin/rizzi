import Contact from "./components/Contact";
import Inquiry from "./components/Inquiry";
import Chart from "./components/Chart";
import Vuelidate from 'vuelidate';
import VueLoadingButton from 'vue-loading-button'
import VCalendar from 'v-calendar'
import VueCharts from 'vue-chartjs'
import VueI18n from "vue-i18n"
import messages from './lang/messages'

require('./bootstrap');
window.Vue = require('vue');

Vue.config.silent = true; /* Suppress all Vue logs and warnings */
Vue.config.productionTip = false /* development mode notice */

Vue.use(VCalendar, {
    componentPrefix: 'vc'
});

Vue.use(Vuelidate);
Vue.use(VueLoadingButton);
Vue.use(VueCharts)
Vue.use(VueI18n)

const i18n = new VueI18n({
    locale: 'it',
    messages
})

const contact = new Vue({
    el: '#contactForm',
    components: {
        contact: Contact
    },
    i18n
});

const inquiry = new Vue({
    el: '#inquiryForm',
    components: {
        inquiry: Inquiry
    },
    i18n
});

const chart = new Vue({
    el: '#chart',
    components: {
        chart: Chart
    }
});

