import axios from "axios";
const API_URI = "//localhost:8000/admin/api";

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
