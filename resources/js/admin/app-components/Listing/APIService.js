import axios from "axios";

// const API_URL = process.env.APP_URL; //'http://sim-bawaslu2.local';

export class APIService {

    constructor() {
    }

    getWilayah(query) {
        var params = '';

        if (query.length > 0) {
            params = '?search=' + query.toLowerCase();
        }

        const url = `/refference/wilayah` + params;

        return axios.get(url).then(response => response.data);
    }

    getAllWilayah(query) {
        var params = '';

        if (query.length > 0) {
            params = '?all=true&search=' + query.toLowerCase();
        }

        const url = `/refference/wilayah` + params;

        return axios.get(url).then(response => response.data);
    }

    getAllResponden(query) {
        var params = '';

        if (query.length > 0) {
            params = '?search=' + query.toLowerCase();
        }

        const url = `/admin/respondens` + params;

        return axios.get(url).then(response => response.data);
    }

}

