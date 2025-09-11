import { createApp } from "vue";
import App from "./App.vue";
import route from "./router";
import { store, key } from "./store";

// import i18n
import i18n from "./i18n";

//axios
import axios from "axios";
axios.defaults.baseURL = "";

// Primevue
import PrimeVue from "primevue/config";
import "primeicons/primeicons.css";
import MyPreset from "./assets/ts/customePrimevuePreset";

// Global style (Which have TailwindCSS)
import "./style.css";

createApp(App)
  .use(route)
  .use(store, key)
  .use(i18n)
  .use(PrimeVue, {
    ripple: true,
    theme: {
      preset: MyPreset,
      options: {
        prefix: "p",
        darkModeSelector: ".my-app-dark",
        
      },
    },
  })
  .mount("#app");
