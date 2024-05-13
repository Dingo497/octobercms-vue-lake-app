import { ILakes } from './lakes';
import { ILakesMeterings } from './lakesMeterings';

export interface IState {
    lakes: ILakes;
    lakesMeterings: ILakesMeterings;
    alert: IAlert;
}

export interface IAlert {
    status: string;
    message: string;
}

export interface IApiTableAttributes {
    page?: number;
    perPage?: number;
    sort?: string;
    search?: string;
}

export interface IApiPaginationLink {
    url: string | null;
    label: string;
    active: boolean;
};

export interface ITableColumn {
    label: string;
    field: string;
    sortable: boolean;
    width: string;
    isKey?: boolean;
}
