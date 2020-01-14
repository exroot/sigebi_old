import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { getCategorias } from "../services/biblioteca";
import { localization } from "../utils/traduccion";
import { columnasCategorias } from "../utils/columnas";
import { FormCategoria } from "./forms";

export const TablaCategorias = () => {
    const [categorias, setCategorias] = useState([]);
    const [show, setShow] = useState(false);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

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
                actions={[
                    {
                        icon: "add",
                        tooltip: "Agregar categoría",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormCategoria show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("categorias")) {
    ReactDOM.render(<TablaCategorias />, document.getElementById("categorias"));
}
