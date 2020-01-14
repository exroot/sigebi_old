import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { getCopias } from "../services/biblioteca";
import { localization } from "../utils/traduccion";
import { columnasCopias } from "../utils/columnas";
import { FormCopia } from "./forms";

export const TablaCopias = () => {
    const [copias, setCopias] = useState([]);
    const [show, setShow] = useState(false);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

    useEffect(() => {
        const fetchCopias = async () => {
            try {
                const copias = await getCopias();
                setCopias(copias);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchCopias();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasCopias}
                localization={localization}
                data={copias}
                title="Copias"
                isLoading={loading}
                actions={[
                    {
                        icon: "add",
                        tooltip: "Agregar copia",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormCopia show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("copias")) {
    ReactDOM.render(<TablaCopias />, document.getElementById("copias"));
}
