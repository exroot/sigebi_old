import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import MaterialTable from "material-table";
import { localization } from "../utils/traduccion";
import { columnasPrestamosActivos } from "../utils/columnas";
import { getPrestamosActivos, getCopias } from "../services/biblioteca";
import { getUsuarios } from "../services/usuarios";
import { FormPrestamo } from "./forms";

const TablaPrestamosActivos = () => {
    const [prestamos, setPrestamos] = useState([]);
    const [show, setShow] = useState(false);
    const [cedulas, setCedulas] = useState([]);
    const [copias, setCopias] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState("");

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

    useEffect(() => {
        const fetchData = async () => {
            try {
                const prestamos = await getPrestamosActivos();
                const usuarios = await getUsuarios();
                const cedulasData = usuarios.map(usuario => usuario.cedula);
                const copiasData = await getCopias();
                setPrestamos(prestamos);
                setCedulas(cedulasData);
                setCopias(copiasData);
            } catch (err) {
                setError(err);
                console.error(err);
            } finally {
                setLoading(false);
            }
        };
        fetchData();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasPrestamosActivos}
                localization={localization}
                data={prestamos}
                title="Prestamos"
                isLoading={loading}
                actions={[
                    {
                        icon: "add",
                        tooltip: "Agregar préstamo",
                        isFreeAction: true,
                        onClick: event => setShow(true)
                    }
                ]}
            />
            <FormPrestamo
                show={show}
                handleShow={handleShow}
                copias={copias}
                cedulas={cedulas}
            />
        </div>
    );
};

if (document.getElementById("prestamosActivos")) {
    ReactDOM.render(
        <TablaPrestamosActivos />,
        document.getElementById("prestamosActivos")
    );
}
