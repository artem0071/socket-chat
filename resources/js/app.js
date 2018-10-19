require('./bootstrap');

window.Vue = require('vue');

import moment from 'moment'
moment.locale('ru')

moment.setUtcLocal = (time) => {
    return moment.utc(time).local()
}
moment.timeFromNow = (time) => {
    return moment.setUtcLocal(time).fromNow()
}

Vue.prototype.$moment = moment

import VueSimpleMarkdown from 'vue-simple-markdown'
import 'vue-simple-markdown/dist/vue-simple-markdown.css'

Vue.use(VueSimpleMarkdown)

Vue.component('messanger-component', require('./components/MessangerComponent'));

const app = new Vue({
    el: '#app'
});
