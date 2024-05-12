import axios, { AxiosInstance } from 'axios';

const BASE_URL: string = 'http://localhost:8000/api';
const LAKE_PREFIX: string = '/lakemanagement';

const API: AxiosInstance = axios.create({
    baseURL: BASE_URL,
});

export { API, LAKE_PREFIX };
