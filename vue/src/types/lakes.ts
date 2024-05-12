export interface IState {
    lakes: ILakes | {};
    alert: IAlert;
}

export interface ILake {
    id: number;
    name: string;
    depth: number | string; // before/after format
    depth_unit: 'm' | 'ft';
    area: number | string; // before/after format
    area_unit: 'km' | 'mi';
    description: string;
    image: string | null; 
    createdAt: string;
}

export interface IAlert {
    status: string;
    message: string;
}



// ----------------- API -----------------
// General
interface IApiPaginationLink {
    url: string | null;
    label: string;
    active: boolean;
};

export interface ILakes {
    current_page: number;
    data: ILake[];
    first_page_url: string;
    from: number;
    last_page: number;
    last_page_url: string;
    links: IApiPaginationLink[];
    next_page_url: string | null;
    path: string;
    per_page: number;
    prev_page_url: string | null;
    to: number;
    total: number;
};


// API Attributes
export interface IApiLakesAttributes {
    ?page: number;
    ?perPage: number;
    ?sort: string;
    ?search: string;
}
