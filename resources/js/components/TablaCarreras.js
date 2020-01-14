import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { localization } from "../utils/traduccion";
import { columnasCarreras } from "../utils/columnas";
import { getCarreras } from "../services/usuarios";
import { FormCarrera } from "./forms";

export const TablaCarreras = () => {
    const [carreras, setCarreras] = useState([]);
    const [show, setShow] = useState(false);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

    useEffect(() => {
        const fetchCarreras = async () => {
            try {
                const carreras = await getCarreras();
                setCarreras(carreras);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchCarreras();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasCarreras}
                localization={localization}
                data={carreras}
                title="Carreras"
                isLoading={loading}
                actions={[
                    {
                        icon: "add",
                        tooltip: "Agregar carrera",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormCarrera show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("carreras")) {
    ReactDOM.render(<TablaCarreras />, document.getElementById("carreras"));
}
