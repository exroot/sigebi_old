import React, { useState, useEffect } from "react";
import { Form, Button, Modal, Spinner } from "react-bootstrap";
import { Formik } from "formik";
import { rolSchema } from "../../utils/formSchemas";
import { post } from "../../services/usuarios";
import { ErrorServer, ErrorInput } from "../errors-handlers";

export const FormRol = ({ show, handleShow }) => {
    const [loading, setLoading] = useState(false);
    const [serverError, setServerError] = useState({});

    const handleSubmit = async data => {
        try {
            setLoading(true);
            const response = await post("/roles", data);
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
                    initialValues={{ rol: "" }}
                    validationSchema={rolSchema}
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
                                    <Modal.Title>Nuevo rol</Modal.Title>
                                </Modal.Header>
                                <Modal.Body>
                                    {serverError.data && (
                                        <ErrorServer
                                            status={serverError.status}
                                            data={serverError.data}
                                        />
                                    )}
                                    <React.Fragment>
                                        <Form.Group controlId="formRol">
                                            <Form.Label>Rol:</Form.Label>
                                            <Form.Control
                                                type="text"
                                                name="rol"
                                                onChange={handleChange}
                                                onBlur={handleBlur}
                                                className={
                                                    touched.rol && errors.rol
                                                        ? "error"
                                                        : null
                                                }
                                            />
                                            {errors.rol && (
                                                <ErrorInput data={errors.rol} />
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
