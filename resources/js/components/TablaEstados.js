import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { localization } from "../utils/traduccion";
import { columnasEstados } from "../utils/columnas";
import { getEstados } from "../services/biblioteca";

export const TablaEstados = () => {
    const [estados, setEstados] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    useEffect(() => {
        const fetchEstados = async () => {
            try {
                const estados = await getEstados();
                setEstados(estados);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchEstados();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasEstados}
                localization={localization}
                data={estados}
                title="Estados"
                isLoading={loading}
            />
        </div>
    );
};

if (document.getElementById("estados")) {
    ReactDOM.render(<TablaEstados />, document.getElementById("estados"));
}
