import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { localization } from "../utils/traduccion";
import { columnasAutores } from "../utils/columnas";
import { getAutores } from "../services/biblioteca";
import { FormAutor } from "./forms";

export const TablaAutores = () => {
    const [autores, setAutores] = useState([]);
    const [show, setShow] = useState(false);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

    useEffect(() => {
        const fetchAutores = async () => {
            try {
                const autores = await getAutores();
                setAutores(autores);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchAutores();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasAutores}
                localization={localization}
                data={autores}
                title="Autores"
                isLoading={loading}
                actions={[
                    {
                        icon: "add",
                        tooltip: "Agregar autor",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormAutor show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("autores")) {
    ReactDOM.render(<TablaAutores />, document.getElementById("autores"));
}
