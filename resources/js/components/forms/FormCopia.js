import React, { useState, useEffect } from "react";
import { Form, Button, Modal, Spinner } from "react-bootstrap";
import { Formik } from "formik";
import { copiaSchema } from "../../utils/formSchemas";
import { post, getLibros, getEstados } from "../../services/biblioteca";
import { ErrorServer, ErrorInput } from "../errors-handlers";

export const FormCopia = ({ show, handleShow }) => {
    const [loading, setLoading] = useState(false);
    const [libros, setLibros] = useState([]);
    const [estados, setEstados] = useState([]);
    const [loadingForm, setLoadingForm] = useState(false);
    const [serverError, setServerError] = useState({});

    const handleSubmit = async data => {
        try {
            setLoading(true);
            const response = await post("/copias", data);
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

    useEffect(() => {
        const getResources = async () => {
            try {
                setLoadingForm(true);
                const librosData = await getLibros();
                const estadosData = await getEstados();
                setLibros(librosData);
                setEstados(estadosData);
            } catch (err) {
                console.error(err);
                setServerError(err);
            } finally {
                setLoadingForm(false);
            }
        };
        getResources();
    }, []);

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
                        cota: "",
                        libro: undefined,
                        estado: undefined
                    }}
                    validationSchema={copiaSchema}
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
                                    <Modal.Title>Nueva Copia</Modal.Title>
                                </Modal.Header>
                                {loadingForm ? (
                                    <Spinner
                                        as="span"
                                        animation="border"
                                        size="lg"
                                        role="status"
                                        aria-hidden="true"
                                    />
                                ) : (
                                    <Modal.Body>
                                        {serverError.data && (
                                            <ErrorServer
                                                status={serverError.status}
                                                data={serverError.data}
                                            />
                                        )}

                                        <React.Fragment>
                                            <Form.Group controlId="formCota">
                                                <Form.Label>Cota:</Form.Label>
                                                <Form.Control
                                                    type="text"
                                                    name="cota"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.cota &&
                                                        errors.cota
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.cota && (
                                                    <ErrorInput
                                                        data={errors.cota}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formLibro">
                                                <Form.Label>Libro:</Form.Label>
                                                <Form.Control
                                                    as="select"
                                                    name="libro"
                                                    onChange={handleChange}
                                                    className={
                                                        touched.libro &&
                                                        errors.libro
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
                                                            "-- Selecciona un libro --"
                                                        }
                                                    </option>
                                                    {libros.map(libro => {
                                                        return (
                                                            <option
                                                                value={libro.id}
                                                                key={libro.id}
                                                            >
                                                                {libro.titulo}
                                                            </option>
                                                        );
                                                    })}
                                                </Form.Control>
                                                {errors.libro && (
                                                    <ErrorInput
                                                        data={errors.libro}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formEstado">
                                                <Form.Label>Estado:</Form.Label>
                                                <Form.Control
                                                    as="select"
                                                    name="estado"
                                                    onChange={handleChange}
                                                    className={
                                                        touched.estado &&
                                                        errors.estado
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
                                                            "-- Selecciona el estado de la copia --"
                                                        }
                                                    </option>
                                                    {estados.map(estado => {
                                                        return (
                                                            <option
                                                                value={
                                                                    estado.id
                                                                }
                                                                key={estado.id}
                                                            >
                                                                {estado.estado}
                                                            </option>
                                                        );
                                                    })}
                                                </Form.Control>
                                                {errors.estado && (
                                                    <ErrorInput
                                                        data={errors.estado}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>
                                    </Modal.Body>
                                )}
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
