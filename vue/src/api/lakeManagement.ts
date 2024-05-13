import { AxiosResponse } from 'axios';
import { API, LAKE_PLUGIN_PREFIX, assignTableAttributes } from './api';
import { IApiTableAttributes } from '../types/general';
import { ILakes } from '../types/lakes';
import { ILakesMeterings } from '../types/lakesMeterings';

export const getLakes = (attributes: IApiTableAttributes): Promise<AxiosResponse<ILakes>> => {
    const config = assignTableAttributes(attributes);
    return API.get<ILakes>(LAKE_PLUGIN_PREFIX + '/lakes', config);
};

export const getLakesMeterings = (attributes: IApiTableAttributes): Promise<AxiosResponse<ILakesMeterings>> => {
    const config = assignTableAttributes(attributes);
    return API.get<ILakesMeterings>(LAKE_PLUGIN_PREFIX + '/lakes-meterings', config);
};
