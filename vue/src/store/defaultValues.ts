import { ILakes } from '../types/lakes';
import { ILakesMeterings } from '../types/lakesMeterings';

export const defaultLakes: ILakes = {
    data: [{
        id: 0,
        name: '',
        depth: 0,
        depth_unit: 'm',
        area: 0,
        area_unit: 'km',
        description: '',
        image: null, 
        createdAt: '',
    }],
    total: 0,
}

export const defaultLakesMeterings: ILakesMeterings = {
    data: [{
        id: 0,
        temperature: 0,
        measuredAt: '',
        description: '',
        createdAt: '',
        lake: {
            id: 0,
            name: '',
            depth: 0,
            depth_unit: 'm',
            area: 0,
            area_unit: 'km',
            description: '',
            image: null, 
            createdAt: '',
        }
    }],
    total: 0,
}
