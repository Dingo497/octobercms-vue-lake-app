import { createStore } from 'vuex'
import axios from 'axios'
import { getLakes } from "../api/lakeManagement";
import { IState, ILakes } from '../types/lakes';


export default createStore<IState>({
    state: {
        lakes: {},
        alert: {
            status: '',
            message: ''
        }
    },


    getters: {
        formattedLakes(state: IState) {
            return state.lakes;
        },
        // errorMessage(state: IState): string {
        //     return state.errorMessage;
        // }
    },


    mutations: {
        SET_LAKES(state: IState, lakes: ILakes | {} ): void {
            state.lakes = lakes;
        },
        // SET_ALERT(state: IState, alertData: any): void {
        //     state.alert = alertData;
        // }
    },


    actions: {
        async fetchLakes({ commit }, attributes): Promise<void> {
            try {
                const { data } = await getLakes(attributes);
                commit('SET_LAKES', data);
                // commit('SET_ALERT', {status: 'success', message: 'Lakes data loaded'});
            } catch (error) {
                console.error('FetchLakes Error:', error);
                // commit('SET_ALERT', {status: 'error', message: 'Lakes data loading failed'});
            }
        }
    },
    modules: {}
})
