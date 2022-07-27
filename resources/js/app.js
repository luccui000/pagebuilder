import './bootstrap';
import { createApp } from "vue";
import App from './layouts/App.vue'
import Header from "./components/LHeader.vue";
import Footer from "./pages/Footer.vue";
import Slider from "./pages/Slider.vue";
import router from "./router";

const app = createApp(App);
app.component('l-header', Header)
app.component('l-footer', Footer)
app.component('v-slider', Slider)
app.use(router)
app.mount("#app")

