import { IApiPaginationLink } from './general';

export interface ILake {
    id: number;
    name: string;
    depth: number;
    depth_unit: 'm' | 'ft';
    area: number;
    area_unit: 'km' | 'mi';
    description: string;
    image: string | null; 
    createdAt: string; // formatted date
}


// ----------------- API -----------------
export interface ILakes {
    data: ILake[];
    total: number;
};

