import React, { useState, useEffect } from "react";
import ReactDOM from "react-dom";

const TablaPrestamos = () => {
    const [prestamos, setPrestamos] = useState([]);
};

if (document.getElementById("prestamos")) {
    ReactDOM.render(<TablaPrestamos />, document.getElementById("prestamos"));
}
