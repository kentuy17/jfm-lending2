import {createApp} from 'vue'
import axios from 'axios';
import Excel from './components/Excel.vue'
import VueExcelEditor from 'vue3-excel-editor'

//create an axios instance in order to use it globally with same config
const instance = axios.create({
  baseURL: import.meta.env.VUE_APP_API_URL,
  withCredentials: false,
  headers: {
    Accept: 'application/json',
    'Content-Type': 'application/json',
  },

})

const app = createApp(Excel)

app.config.globalProperties.axios = instance;
app.use(VueExcelEditor)
app.mount("#kt_datatable_sub")
