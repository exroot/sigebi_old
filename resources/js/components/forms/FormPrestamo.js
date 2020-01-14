import React, { useState, useEffect } from "react";
import { Form, Button, Modal, Spinner } from "react-bootstrap";
import { Formik } from "formik";
import { prestamoSchema } from "../../utils/formSchemas";
import { post } from "../../services/biblioteca";
import { ErrorServer, ErrorInput } from "../errors-handlers";

export const FormPrestamo = ({ show, handleShow, cedulas, copias }) => {
    const [loading, setLoading] = useState(false);
    const [serverError, setServerError] = useState({});

    const handleSubmit = async data => {
        try {
            setLoading(true);
            const response = await post("/prestamos", data);
            if (response.status === 200) {
                window.location.reload();
            }
        } catch (err) {
            console.log(err);
            setServerError(err);
        } finally {
            setLoading(false);
        }
    };

    useEffect(() => {
        if (!show) {
            setServerError({});
        }
    }, [show]);

    return (
        <React.Fragment>
            <Modal
                show={show}
                onHide={handleShow}
                dialogAs="div"
                backdrop="static"
            >
                <Formik
                    initialValues={{
                        cedula: undefined,
                        copia: undefined
                    }}
                    validationSchema={prestamoSchema}
                    onSubmit={values => handleSubmit(values)}
                >
                    {({ errors, touched, handleChange, handleSubmit }) => (
                        <Form>
                            <Modal.Dialog scrollable size="lg">
                                <Modal.Header closeButton>
                                    <Modal.Title>Nuevo Préstamo</Modal.Title>
                                </Modal.Header>
                                <Modal.Body>
                                    {serverError.data && (
                                        <ErrorServer
                                            status={serverError.status}
                                            data={serverError.data}
                                        />
                                    )}
                                    <React.Fragment>
                                        <Form.Group controlId="formCedula">
                                            <Form.Label>Cédula:</Form.Label>
                                            <Form.Control
                                                as="select"
                                                name="cedula"
                                                onChange={handleChange}
                                                className={
                                                    touched.cedula &&
                                                    errors.cedula
                                                        ? "error"
                                                        : null
                                                }
                                            >
                                                <option
                                                    hidden
                                                    disabled
                                                    selected
                                                    value
                                                >
                                                    {
                                                        "-- Selecciona un usuario --"
                                                    }
                                                </option>
                                                {cedulas.map(cedula => {
                                                    return (
                                                        <option
                                                            value={cedula}
                                                            key={cedula}
                                                        >
                                                            {cedula}
                                                        </option>
                                                    );
                                                })}
                                            </Form.Control>
                                            {errors.cedula && (
                                                <ErrorInput
                                                    data={errors.cedula}
                                                />
                                            )}
                                        </Form.Group>
                                    </React.Fragment>

                                    <React.Fragment>
                                        <Form.Group controlId="formCopia">
                                            <Form.Label>Copia:</Form.Label>
                                            <Form.Control
                                                as="select"
                                                name="copia"
                                                onChange={handleChange}
                                                className={
                                                    touched.copia &&
                                                    errors.copia
                                                        ? "error"
                                                        : null
                                                }
                                            >
                                                <option
                                                    hidden
                                                    disabled
                                                    selected
                                                    value
                                                >
                                                    {
                                                        "-- Selecciona la copia --"
                                                    }
                                                </option>
                                                {copias.map(copia => {
                                                    return (
                                                        <option
                                                            value={copia.id}
                                                            key={copia.id}
                                                        >
                                                            {copia.cota}
                                                        </option>
                                                    );
                                                })}
                                            </Form.Control>
                                            {errors.copia && (
                                                <ErrorInput
                                                    data={errors.copia}
                                                />
                                            )}
                                        </Form.Group>
                                    </React.Fragment>
                                </Modal.Body>
                                <Modal.Footer>
                                    <Button
                                        onClick={handleSubmit}
                                        variant="primary"
                                        disabled={loading}
                                    >
                                        {loading ? (
                                            <React.Fragment>
                                                <Spinner
                                                    as="span"
                                                    animation="border"
                                                    size="sm"
                                                    role="status"
                                                    aria-hidden="true"
                                                    style={{
                                                        marginRight: "5px"
                                                    }}
                                                />
                                                Cargando...
                                            </React.Fragment>
                                        ) : (
                                            "Guardar"
                                        )}
                                    </Button>
                                </Modal.Footer>
                            </Modal.Dialog>
                        </Form>
                    )}
                </Formik>
            </Modal>
        </React.Fragment>
    );
};
