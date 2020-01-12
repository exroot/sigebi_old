import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import { columnasLibros } from "../utils/columnas";
import { getLibros } from "../services/biblioteca";
import { localizationLibro } from "../utils/traduccion";
import { FormLibro } from "./forms";

export const TablaLibros = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);
    const [show, setShow] = useState(false);

    const handleShow = () => {
        if (show) setShow(false);
        else setShow(true);
    };

    useEffect(() => {
        const fetchLibros = async () => {
            try {
                const libros = await getLibros();
                setData(libros);
            } catch (err) {
                console.log(err);
                setError(true);
            } finally {
                setLoading(false);
            }
        };
        fetchLibros();
    }, []);

    return (
        <div style={{ maxWidth: "100%" }}>
            {error && <h3>Ha ocurrido un error.</h3>}
            <MaterialTable
                columns={columnasLibros}
                localization={localizationLibro}
                data={data}
                title="Libros"
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
            <FormLibro show={show} handleShow={handleShow} />
        </div>
    );
};

if (document.getElementById("libros")) {
    ReactDOM.render(<TablaLibros />, document.getElementById("libros"));
}
