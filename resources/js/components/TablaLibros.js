import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import "./Tabla.css";
import MaterialTable from "material-table";
import axios from "axios";

const API_URI = "//localhost:8000/api/libros";

export const TablaLibros = () => {
    const [data, setData] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState(false);

    useEffect(() => {
        const fetchLibros = async () => {
            try {
                const libros = await axios.get(API_URI);
                setData(libros.data);
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
                columns={[
                    {
                        title: "ID",
                        field: "id",
                        type: "numeric"
                    },
                    {
                        title: "Titulo",
                        field: "titulo",
                        render: rowdata => (
                            <a href={"/libros/" + rowdata.id}>
                                {rowdata.titulo}
                            </a>
                        ),
                        type: "string"
                    },
                    {
                        title: "Autor",
                        field: "autor.nombre",
                        render: rowdata => (
                            <a href={"/autores/" + rowdata.autor.id}>
                                {rowdata.autor.nombre}
                            </a>
                        ),
                        type: "string"
                    },
                    {
                        title: "Disponibilidad",
                        field: "disponible",
                        render: rowdata => (
                            <span
                                className={
                                    "estado " +
                                    (rowdata.disponible
                                        ? "disponible"
                                        : "prestado")
                                }
                            >
                                {rowdata.disponible ? "Disponible" : "Prestado"}
                            </span>
                        ),
                        type: "string"
                    }
                ]}
                localization={{
                    pagination: {
                        labelDisplayedRows: "{from}-{to} de {count}",
                        labelRowsPerPage: "Filas por página",
                        labelRowsSelect: "filas",
                        firstTooltip: "Primera página",
                        previousTooltip: "Anterior",
                        nextTooltip: "Siguiente",
                        lastTooltip: "Última página"
                    },
                    toolbar: {
                        searchTooltip: "Buscar",
                        searchPlaceholder: "Buscar por título, autor..."
                    }
                }}
                data={data}
                title="Libros"
                isLoading={loading}
            />
        </div>
    );
};

if (document.getElementById("libros")) {
    ReactDOM.render(<TablaLibros />, document.getElementById("libros"));
}
