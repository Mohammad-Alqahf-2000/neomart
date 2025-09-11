import type { InjectionKey } from "vue";
import type { Store } from "vuex";
import { createStore, useStore as baseUseStore } from "vuex";

// define your typings for the store state
export interface State {}

// define injection key
export const key: InjectionKey<Store<State>> = Symbol();

export const store = createStore<State>({
  state: {},
  mutations: {},
  actions: {},
  getters: {},
  modules: {},
});

// Optional: create a composition function for useStore
export function useStore() {
  return baseUseStore(key);
}
