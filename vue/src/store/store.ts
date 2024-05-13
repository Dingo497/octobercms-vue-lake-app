import { createStore } from 'vuex'
import axios from 'axios'
import { getLakes, getLakesMeterings } from "../api/lakeManagement";
import { defaultLakes, defaultLakesMeterings } from './defaultValues';

import { IState } from '../types/general';
import { ILakes } from '../types/lakes';
import { ILakesMeterings } from '../types/lakesMeterings';

export default createStore<IState>({
    state: {
        lakes: defaultLakes,
        lakesMeterings: defaultLakesMeterings,
        alert: {
            status: '',
            message: ''
        }
    },


    getters: {
        formattedLakes(state: IState) {
            const data = state.lakes.data.map((item) => {
                const { depth, area, depth_unit, area_unit, ...rest } = item;
                return {
                    ...rest,
                    depth: parseFloat(depth.toPrecision(3)) + ' ' + depth_unit,
                    area: parseFloat(area.toPrecision(3)) + ' ' + area_unit,
                };
            });
            return { data, total: state.lakes.total };
        },
        formattedLakesMeterings(state: IState) {
            const data = state.lakesMeterings.data.map((item) => {
                const { temperature, lake, ...rest } = item;
                return {
                    ...rest,
                    temperature: parseFloat(temperature.toPrecision(3)) + '°C',
                    lakeName: item.lake.name
                };
            });
            return { data, total: state.lakesMeterings.total };
        },
        // errorMessage(state: IState): string {
        //     return state.errorMessage;
        // }
    },


    mutations: {
        SET_LAKES(state: IState, lakes: ILakes ): void {
            state.lakes = lakes;
        },
        SET_LAKES_METERINGS(state: IState, lakesMeterings: ILakesMeterings ): void {
            state.lakesMeterings = lakesMeterings;
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
        },
        async fetchLakesMeterings({ commit }, attributes): Promise<void> {
            try {
                const { data } = await getLakesMeterings(attributes);
                commit('SET_LAKES_METERINGS', data);
                // commit('SET_ALERT', {status: 'success', message: 'Lakes data loaded'});
            } catch (error) {
                console.error('FetchLakes Error:', error);
                // commit('SET_ALERT', {status: 'error', message: 'Lakes data loading failed'});
            }
        }
    },
    modules: {}
})
