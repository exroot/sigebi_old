import React from "react";
import { Alert } from "react-bootstrap";

export const ErrorServer = ({ status, data }) => {
    return (
        <Alert variant="danger">
            <Alert.Heading>Error {status}:</Alert.Heading>
            <span>{data}</span>
        </Alert>
    );
};
