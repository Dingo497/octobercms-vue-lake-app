import axios, { AxiosInstance, AxiosRequestConfig } from 'axios';
import { IApiTableAttributes } from '../types/general';

const BASE_URL: string = 'http://localhost:8000/api';
const LAKE_PLUGIN_PREFIX: string = '/lakemanagement';

const API: AxiosInstance = axios.create({
    baseURL: BASE_URL,
});

export { API, LAKE_PLUGIN_PREFIX };


// ----------------- HELPER FUNCTIONS FOR API -----------------
export const assignTableAttributes = (attributes: IApiTableAttributes) => {
    const config: AxiosRequestConfig = {
        params: {}
    };
    
    if (attributes !== undefined) {
        config.params.page = attributes.page ?? attributes.page; 
        config.params.perPage = attributes.perPage ?? attributes.perPage; 
        config.params.sort = attributes.sort ?? attributes.sort; 
        config.params.search = attributes.search ?? attributes.search; 
    }

    return config;
} 
