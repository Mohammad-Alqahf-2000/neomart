/* eslint-disable */
import { createI18n } from "vue-i18n";
import en from "./locale/en.json";
import ar from "./locale/ar.json";

const messages = { en, ar };

function getStartingLocal(): string {
  const saved = localStorage.getItem("locale");
  if (saved && Object.keys(messages).includes(saved)) {
    return saved;
  }
  const browserLang = navigator.language.split("-")[0];
  return Object.keys(messages).includes(browserLang) ? browserLang : "en";
}
function loadLocalMessages() {
  const locales = [{ en: en }, { ar: ar }];
  const messages: Record<string, any> = {};
  locales.forEach((lang) => {
    const key = Object.keys(lang)[0];
    messages[key] = lang[key as keyof typeof lang];
  });
  return messages;
}

const i18n = createI18n({
  legacy: false,
  locale: getStartingLocal(),
  fallbackLocale: "en",
  globalInjection: true,
  messages: loadLocalMessages(),
});

export default i18n;
