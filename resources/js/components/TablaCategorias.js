import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { getCategorias } from "../services/biblioteca";
import { localization } from "../utils/traduccion";
import { columnasCategorias } from "../utils/columnas";

export const TablaCategorias = () => {
    const [categorias, setCategorias] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    useEffect(() => {
        const fetchCategorias = async () => {
            try {
                const categorias = await getCategorias();
                setCategorias(categorias);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchCategorias();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasCategorias}
                localization={localization}
                data={categorias}
                title="Categorias"
                isLoading={loading}
            />
        </div>
    );
};

if (document.getElementById("categorias")) {
    ReactDOM.render(<TablaCategorias />, document.getElementById("categorias"));
}
