import axios from "axios";
const API_URI = "//localhost:8000/api";

const logger = ({ response: { status, headers, data } }) => {
    let satanizedResponse = {
        status: status,
        headers: headers,
        data: ""
    };
    switch (status) {
        case 400:
            satanizedResponse.data = "Solicitud del cliente inválida.";
            break;
        case 401:
            satanizedResponse.data = "Se necesita autenticación.";
            break;
        case 403:
            satanizedResponse.data = "Se necesita autenticación.";
            break;
        case 404:
            satanizedResponse.data =
                "El servidor no pudo encontrar el contenido solicitado.";
            break;
        case 408:
            satanizedResponse.data =
                "Tiempo de espera agotado, recargue el cliente (presione F5).";
            break;
        case 419:
            satanizedResponse.data =
                "Se necesita autenticacion (token o csrf cookie).";
            break;
        case 422:
            satanizedResponse.data =
                "La informacion proporcionada es invalida.";
            break;
        case 500:
            satanizedResponse.data = "Error interno en el servidor.";
            break;
        case 502:
            satanizedResponse.data = "Respuesta invalida del servidor.";
            break;
        case 503:
            satanizedResponse.data =
                "Servicio no disponible. Servidor en mantenimiento o sobrecargado.";
            break;
        case 504:
            satanizedResponse.data = "Servidor no responde a tiempo.";
            break;
        default:
            satanizedResponse.data = data.message || data;
            break;
    }
    return satanizedResponse;
};

export const getLibros = async () => {
    try {
        const libros = await axios.get(`${API_URI}/libros`);
        return libros.data;
    } catch (err) {
        console.log(err);
    }
};

export const getAutores = async () => {
    try {
        const autores = await axios.get(`${API_URI}/autores`);
        return autores.data;
    } catch (err) {
        console.log(err);
    }
};

export const postAutores = async autorData => {
    try {
        const response = await axios.post(`${API_URI}/autores`, autorData);
        return response;
    } catch (err) {
        if (!err.response) {
            const servidorCaido = {
                status: 500,
                headers: "",
                data: "Servidor caido, no hay respuesta."
            };
            return Promise.reject(servidorCaido);
        }
        return Promise.reject(logger(err));
    }
};

export const getCategorias = async () => {
    try {
        const categorias = await axios.get(`${API_URI}/categorias`);
        return categorias.data;
    } catch (err) {
        console.log(err);
    }
};

export const postCategoria = async categoriaData => {
    try {
        const response = await axios.post(
            `${API_URI}/categorias`,
            categoriaData
        );
        return response;
    } catch (err) {
        if (!err.response) {
            const servidorCaido = {
                status: 500,
                headers: "",
                data: "Servidor caido, no hay respuesta."
            };
            return Promise.reject(servidorCaido);
        }
        return Promise.reject(logger(err));
    }
};

export const getCopias = async () => {
    try {
        const copias = await axios.get(`${API_URI}/copias`);
        return copias.data;
    } catch (err) {
        console.log(err);
    }
};

export const getEstados = async () => {
    try {
        const estados = await axios.get(`${API_URI}/estados`);
        return estados.data;
    } catch (err) {
        console.log(err);
    }
};

export const postEstado = async data => {
    try {
        const response = await axios.post(`${API_URI}/autores`, data);
        return response;
    } catch (err) {
        if (!err.response) {
            const servidorCaido = {
                status: 500,
                headers: "",
                data: "Servidor caido, no hay respuesta."
            };
            return Promise.reject(servidorCaido);
        }
        return Promise.reject(logger(err));
    }
};

export const getPrestamosRealizados = async () => {
    try {
        const prestamos = await axios.get(`${API_URI}/prestamos/realizados`);
        return prestamos.data;
    } catch (err) {
        console.log(err);
    }
};

export const getPrestamosActivos = async () => {
    try {
        const prestamos = await axios.get(`${API_URI}/prestamos/activos`);
        return prestamos.data;
    } catch (err) {
        console.log(err);
    }
};

export const post = async (endpoint, data) => {
    try {
        const response = await axios.post(API_URI + endpoint, data);
        return response;
    } catch (err) {
        if (!err.response) {
            const servidorCaido = {
                status: 500,
                headers: "",
                data: "No hay respuesta del servidor."
            };
            return Promise.reject(servidorCaido);
        }
        return Promise.reject(logger(err));
    }
};
