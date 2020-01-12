import axios from "axios";
const API_URI = "//localhost:8000/admin/api";

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

export const post = async (endpoint, data) => {
    try {
        const response = await axios.post(API_URI + endpoint, data);
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

export const getUsuarios = async () => {
    try {
        const usuarios = await axios.get(`${API_URI}/usuarios`);
        return usuarios.data;
    } catch (err) {
        console.log(err);
    }
};

export const getRoles = async () => {
    try {
        const roles = await axios.get(`${API_URI}/roles`);
        return roles.data;
    } catch (err) {
        console.log(err);
    }
};

export const getCarreras = async () => {
    try {
        const carreras = await axios.get(`${API_URI}/carreras`);
        return carreras.data;
    } catch (err) {
        console.log(err);
    }
};
