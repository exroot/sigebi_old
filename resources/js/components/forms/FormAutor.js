import React, { useState } from "react";
import { Form, Button, Modal, Spinner } from "react-bootstrap";
import { Formik, ErrorMessage } from "formik";
import { autorSchema } from "../../utils/formSchemas";

export const FormAutor = ({ show, handleShow }) => {
    const [isLoading, setLoading] = useState(false);

    const handleSubmit = async values => {
        try {
            setLoading(true);
        } catch (err) {
            setError(err);
        } finally {
            setLoading(false);
            console.log(values.nombre);
            alert(JSON.stringify(values));
        }
    };

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
                                            <ErrorMessage name="nombre" />
                                        </Form.Group>
                                    </React.Fragment>
                                </Modal.Body>
                                <Modal.Footer>
                                    <Button
                                        onClick={handleSubmit}
                                        variant="primary"
                                        disabled={isLoading}
                                    >
                                        {isLoading ? (
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
