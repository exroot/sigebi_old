import axios from "axios";
const API_URI = "//localhost:8000/api";

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

export const getCategorias = async () => {
    try {
        const categorias = await axios.get(`${API_URI}/categorias`);
        return categorias.data;
    } catch (err) {
        console.log(err);
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
