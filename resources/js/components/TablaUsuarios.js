import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { columnasUsuarios } from "../utils/columnas";
import { getUsuarios } from "../services/usuarios";
import { localization } from "../utils/traduccion";
import { FormUser } from "./forms";

export const TablaUsuarios = () => {
    const [usuarios, setUsuarios] = useState([]);
    const [show, setShow] = useState(false);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

    useEffect(() => {
        const fetchUsuarios = async () => {
            try {
                const usuarios = await getUsuarios();
                setUsuarios(usuarios);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchUsuarios();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasUsuarios}
                localization={localization}
                data={usuarios}
                title="Usuarios"
                isLoading={loading}
                actions={[
                    {
                        icon: "add",
                        tooltip: "Agregar usuario",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormUser show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("usuarios")) {
    ReactDOM.render(<TablaUsuarios />, document.getElementById("usuarios"));
}
