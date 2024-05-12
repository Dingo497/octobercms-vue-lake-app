import { AxiosResponse, AxiosRequestConfig } from 'axios';
import { API, LAKE_PREFIX } from './api';
import { IApiLakesAttributes, ILakes } from '../types/lakes';

export const getLakes = (attributes: IApiLakesAttributes): Promise<AxiosResponse<ILakes>> => {
    const config: AxiosRequestConfig = {
        params: {}
    };
    
      // TODO docasne riesenie...
    if (attributes !== undefined) {
        if (attributes.page) {
            config.params.page = attributes.page;
        }
    
        if (attributes.perPage) {
            config.params.perPage = attributes.perPage;
        }
    
        if (attributes.sort) {
            config.params.sort = attributes.sort;
        }
    
        if (attributes.search) {
            config.params.search = attributes.search;
        }
    }

    return API.get<ILakes>(LAKE_PREFIX + '/lakes', config);
};
