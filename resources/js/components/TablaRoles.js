import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { columnasRoles } from "../utils/columnas";
import { getRoles } from "../services/usuarios";
import { localization } from "../utils/traduccion";
import { FormRol } from "./forms";

export const TablaRoles = () => {
    const [roles, setRoles] = useState([]);
    const [show, setShow] = useState(false);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

    useEffect(() => {
        const fetchRoles = async () => {
            try {
                const roles = await getRoles();
                setRoles(roles);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchRoles();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasRoles}
                localization={localization}
                data={roles}
                title="Roles"
                isLoading={loading}
                actions={[
                    {
                        icon: "add_box",
                        tooltip: "Agregar rol",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormRol show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("roles")) {
    ReactDOM.render(<TablaRoles />, document.getElementById("roles"));
}
