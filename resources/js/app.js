import Contact from "./components/Contact";
import Inquiry from "./components/Inquiry";
import Vuelidate from 'vuelidate';
import VueLoadingButton from 'vue-loading-button'
import VCalendar from 'v-calendar'

require('./bootstrap');
window.Vue = require('vue');

Vue.config.silent = false; /* Suppress all Vue logs and warnings */
Vue.config.productionTip = true /* development mode notice */

Vue.use(VCalendar, {
    componentPrefix: 'vc'
});

Vue.use(Vuelidate);
Vue.use(VueLoadingButton);

const contact = new Vue({
    el: '#contactForm',
    components: {
        contact: Contact
    }
});

const inquiry = new Vue({
    el: '#inquiryForm',
    components: {
        inquiry: Inquiry
    }
});
