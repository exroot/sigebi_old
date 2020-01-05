import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";
import MaterialTable from "material-table";
import { localization } from "../utils/traduccion";
import { columnasPrestamosActivos } from "../utils/columnas";
import { getPrestamosActivos } from "../services/biblioteca";

const TablaPrestamosActivos = () => {
    const [prestamos, setPrestamos] = useState([]);
    const [loading, setLoading] = useState(true);
    const [error, setError] = useState("");

    useEffect(() => {
        const fetchPrestamos = async () => {
            try {
                const prestamos = await getPrestamosActivos();
                console.log(prestamos);
                setPrestamos(prestamos);
            } catch (err) {
                setError(err);
                console.log(err);
            } finally {
                setLoading(false);
            }
        };
        fetchPrestamos();
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
