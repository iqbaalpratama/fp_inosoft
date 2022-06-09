import Vuex from 'vuex';
import Vue from 'vue';
import { instruction } from './instruction.module'

Vue.use(Vuex);

export const store = new Vuex.Store({
  modules: {
    instruction
  }
})