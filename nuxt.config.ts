// https://nuxt.com/docs/api/configuration/nuxt-config

import svgLoader from "vite-svg-loader";
import tailwindcss from "@tailwindcss/vite";

export default defineNuxtConfig({
  runtimeConfig: {
    public: {
      apiBase: "",
    },
  },
  compatibilityDate: "2025-07-15",
  vite: {
    plugins: [tailwindcss()],
  },
  ui: {
    colorMode: false
  },
  css: ["~/assets/css/main.css"],
  devtools: { enabled: true },
  components: [
    {
      path: "~/components",
      pathPrefix: false,
    },
  ],
  i18n: {
    locales: [
      { code: "el", file: "el.json", name: "Ελληνικά", flag: "gr" },
      { code: "en", file: "en.json", name: "English", flag: "gb" },
    ],
    defaultLocale: "el",
    strategy: "prefix_except_default",
    detectBrowserLanguage: false,
  },
  googleFonts: {
    families: {
      "Playfair Display": [400, 700],
      "Rubik Spray Paint": 400,
      "Joti One": 400,
      "Knewave": 400,
    },
  },
  modules: [
    "@nuxtjs/google-fonts",
    "@nuxtjs/i18n",
    // "@nuxt/icon",
    "@vueuse/nuxt",
    "nuxt-icon-tw",
    '@nuxt/ui'
  ],
  build: {
    transpile: ["vue-countup-v3"],
  },
});