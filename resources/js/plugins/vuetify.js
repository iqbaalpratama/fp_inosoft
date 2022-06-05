import Vue from 'vue'
import Vuetify from 'vuetify/lib'
import config from '../config'
import 'vuetify/dist/vuetify.min.css'
import '@mdi/font/css/materialdesignicons.css'

Vue.use(Vuetify)

export default new Vuetify({
    icons: {
        iconfont: 'mdi',
      },
    theme: {
        themes: {
            light: config.light
        }
    }
});
