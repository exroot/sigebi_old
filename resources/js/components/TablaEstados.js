import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { localization } from "../utils/traduccion";
import { columnasEstados } from "../utils/columnas";
import { getEstados } from "../services/biblioteca";
import { FormEstado } from "./forms";

export const TablaEstados = () => {
    const [estados, setEstados] = useState([]);
    const [show, setShow] = useState(false);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

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
                actions={[
                    {
                        icon: "add",
                        tooltip: "Agregar estado",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormEstado show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("estados")) {
    ReactDOM.render(<TablaEstados />, document.getElementById("estados"));
}
