import React, { useState, useEffect } from "react";
import { Form, Button, Modal, Spinner } from "react-bootstrap";
import { Formik } from "formik";
import { autorSchema } from "../../utils/formSchemas";
import { postAutores } from "../../services/biblioteca";
import { ErrorServer, ErrorInput } from "../errors-handlers";

export const FormAutor = ({ show, handleShow }) => {
    const [loading, setLoading] = useState(false);
    const [serverError, setServerError] = useState({});

    const handleSubmit = async values => {
        try {
            setLoading(true);
            const response = await postAutores(values);
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
                    initialValues={{ nombre: "" }}
                    validationSchema={autorSchema}
                    onSubmit={values => handleSubmit(values)}
                >
                    {({
                        errors,
                        touched,
                        handleChange,
                        handleBlur,
                        handleSubmit
                    }) => (
                        <Form>
                            <Modal.Dialog scrollable size="lg">
                                <Modal.Header closeButton>
                                    <Modal.Title>Nuevo autor</Modal.Title>
                                </Modal.Header>
                                <Modal.Body>
                                    {serverError.data && (
                                        <ErrorServer
                                            status={serverError.status}
                                            data={serverError.data}
                                        />
                                    )}
                                    <React.Fragment>
                                        <Form.Group controlId="formNombre">
                                            <Form.Label>Nombre:</Form.Label>
                                            <Form.Control
                                                type="text"
                                                name="nombre"
                                                onChange={handleChange}
                                                onBlur={handleBlur}
                                                className={
                                                    touched.nombre &&
                                                    errors.nombre
                                                        ? "error"
                                                        : null
                                                }
                                            />
                                            {errors.nombre && (
                                                <ErrorInput
                                                    data={errors.nombre}
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
