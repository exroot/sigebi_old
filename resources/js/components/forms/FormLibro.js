import React, { useState, useEffect } from "react";
import { Form, Button, Modal, Spinner } from "react-bootstrap";
import { Formik } from "formik";
import { libroSchema } from "../../utils/formSchemas";
import { post, getAutores, getCategorias } from "../../services/biblioteca";
import { ErrorServer, ErrorInput } from "../errors-handlers";

export const FormLibro = ({ show, handleShow }) => {
    const [loading, setLoading] = useState(false);
    const [categorias, setCategorias] = useState([]);
    const [autores, setAutores] = useState([]);
    const [loadingForm, setLoadingForm] = useState(false);
    const [serverError, setServerError] = useState({});

    const handleSubmit = async data => {
        try {
            setLoading(true);
            const response = await post("/libros", data);
            if (response.status === 200) {
                window.location.reload();
            }
        } catch (err) {
            console.error(err);
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
                const autoresData = await getAutores();
                const categoriasData = await getCategorias();
                setAutores(autoresData);
                setCategorias(categoriasData);
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
                        titulo: "",
                        descripcion: "",
                        categoria: undefined,
                        autor: undefined
                    }}
                    validationSchema={libroSchema}
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
                                    <Modal.Title>Nuevo Libro</Modal.Title>
                                </Modal.Header>
                                {loadingForm ? (
                                    <Spinner
                                        as="span"
                                        animation="border"
                                        size="lg"
                                        role="status"
                                        aria-hidden="true"
                                        style={{
                                            marginRight: "5px"
                                        }}
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
                                            <Form.Group controlId="formTitulo">
                                                <Form.Label>Título:</Form.Label>
                                                <Form.Control
                                                    type="text"
                                                    name="titulo"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.titulo &&
                                                        errors.titulo
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.titulo && (
                                                    <ErrorInput
                                                        data={errors.titulo}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>
                                        <React.Fragment>
                                            <Form.Group controlId="formDescripcion">
                                                <Form.Label>
                                                    Descripción:
                                                </Form.Label>
                                                <Form.Control
                                                    type="text"
                                                    name="descripcion"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.descripcion &&
                                                        errors.descripcion
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.descripcion && (
                                                    <ErrorInput
                                                        data={
                                                            errors.descripcion
                                                        }
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>
                                        <React.Fragment>
                                            <Form.Group controlId="formAutor">
                                                <Form.Label>Autor:</Form.Label>
                                                <Form.Control
                                                    as="select"
                                                    name="autor"
                                                    onChange={handleChange}
                                                    className={
                                                        touched.autor &&
                                                        errors.autor
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
                                                            "-- Selecciona un autor --"
                                                        }
                                                    </option>
                                                    {autores.map(autor => {
                                                        return (
                                                            <option
                                                                value={autor.id}
                                                                key={autor.id}
                                                            >
                                                                {autor.nombre}
                                                            </option>
                                                        );
                                                    })}
                                                </Form.Control>
                                                {errors.autor && (
                                                    <ErrorInput
                                                        data={errors.autor}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formCategoria">
                                                <Form.Label>
                                                    Categoría:
                                                </Form.Label>
                                                <Form.Control
                                                    as="select"
                                                    name="categoria"
                                                    onChange={handleChange}
                                                    className={
                                                        touched.categoria &&
                                                        errors.categoria
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
                                                            "-- Selecciona un autor --"
                                                        }
                                                    </option>
                                                    {categorias.map(
                                                        categoria => {
                                                            return (
                                                                <option
                                                                    value={
                                                                        categoria.id
                                                                    }
                                                                    key={
                                                                        categoria.id
                                                                    }
                                                                >
                                                                    {
                                                                        categoria.categoria
                                                                    }
                                                                </option>
                                                            );
                                                        }
                                                    )}
                                                </Form.Control>
                                                {errors.categoria && (
                                                    <ErrorInput
                                                        data={errors.categoria}
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
