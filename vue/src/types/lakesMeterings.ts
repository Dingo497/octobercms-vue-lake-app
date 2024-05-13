import { ILake } from './lakes';
import { IApiPaginationLink } from './general';

export interface IMeterings {
    id: number;
    temperature: number;
    measuredAt: string; // formatted date
    description: string;
    createdAt: string; // formatted date
    lake: ILake;
}

// ----------------- API -----------------
export interface ILakesMeterings {
    data: IMeterings[];
    total: number;
};
