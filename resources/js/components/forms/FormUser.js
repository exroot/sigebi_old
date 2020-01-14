import React, { useState, useEffect } from "react";
import { Form, Button, Modal, Spinner } from "react-bootstrap";
import { Formik } from "formik";
import { userSchema } from "../../utils/formSchemas";
import { post, getRoles, getCarreras } from "../../services/usuarios";
import { ErrorServer, ErrorInput } from "../errors-handlers";

export const FormUser = ({ show, handleShow }) => {
    const [loading, setLoading] = useState(false);
    const [loadingForm, setLoadingForm] = useState(false);
    const [roles, setRoles] = useState([]);
    const [carreras, setCarreras] = useState([]);
    const [serverError, setServerError] = useState({});

    const handleSubmit = async data => {
        try {
            setLoading(true);
            const response = await post("/usuarios", data);
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
                const rolesData = await getRoles();
                const carrerasData = await getCarreras();
                setRoles(rolesData);
                setCarreras(carrerasData);
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
                        cedula: undefined,
                        nombres: "",
                        apellidos: "",
                        email: "",
                        password: "",
                        rol: undefined,
                        carrera: undefined
                    }}
                    validationSchema={userSchema}
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
                                            <Form.Group controlId="formCedula">
                                                <Form.Label>Cédula:</Form.Label>
                                                <Form.Control
                                                    type="number"
                                                    name="cedula"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.cedula &&
                                                        errors.cedula
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.cedula && (
                                                    <ErrorInput
                                                        data={errors.cedula}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formNombres">
                                                <Form.Label>
                                                    Nombres:
                                                </Form.Label>
                                                <Form.Control
                                                    type="text"
                                                    name="nombres"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.nombres &&
                                                        errors.nombres
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.nombres && (
                                                    <ErrorInput
                                                        data={errors.nombres}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formApellidos">
                                                <Form.Label>
                                                    Apellidos:
                                                </Form.Label>
                                                <Form.Control
                                                    type="text"
                                                    name="apellidos"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.apellidos &&
                                                        errors.apellidos
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.apellidos && (
                                                    <ErrorInput
                                                        data={errors.apellidos}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formEmail">
                                                <Form.Label>Email:</Form.Label>
                                                <Form.Control
                                                    type="email"
                                                    name="email"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.email &&
                                                        errors.email
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.email && (
                                                    <ErrorInput
                                                        data={errors.email}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formPassword">
                                                <Form.Label>
                                                    Contraseña:
                                                </Form.Label>
                                                <Form.Control
                                                    type="password"
                                                    name="password"
                                                    onChange={handleChange}
                                                    onBlur={handleBlur}
                                                    className={
                                                        touched.password &&
                                                        errors.password
                                                            ? "error"
                                                            : null
                                                    }
                                                />
                                                {errors.password && (
                                                    <ErrorInput
                                                        data={errors.password}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formRol">
                                                <Form.Label>Rol:</Form.Label>
                                                <Form.Control
                                                    as="select"
                                                    name="rol"
                                                    onChange={handleChange}
                                                    className={
                                                        touched.rol &&
                                                        errors.rol
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
                                                            "-- Selecciona el rol del usuario --"
                                                        }
                                                    </option>
                                                    {roles.map(libro => {
                                                        return (
                                                            <option
                                                                value={rol.id}
                                                                key={rol.id}
                                                            >
                                                                {rol.rol}
                                                            </option>
                                                        );
                                                    })}
                                                </Form.Control>
                                                {errors.rol && (
                                                    <ErrorInput
                                                        data={errors.rol}
                                                    />
                                                )}
                                            </Form.Group>
                                        </React.Fragment>

                                        <React.Fragment>
                                            <Form.Group controlId="formCarrera">
                                                <Form.Label>
                                                    Carrera:
                                                </Form.Label>
                                                <Form.Control
                                                    as="select"
                                                    name="carrera"
                                                    onChange={handleChange}
                                                    className={
                                                        touched.carrera &&
                                                        errors.carrera
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
                                                            "-- Selecciona la carrera del usuario --"
                                                        }
                                                    </option>
                                                    {carreras.map(carrera => {
                                                        return (
                                                            <option
                                                                value={
                                                                    carrera.id
                                                                }
                                                                key={carrera.id}
                                                            >
                                                                {
                                                                    carrera.carrera
                                                                }
                                                            </option>
                                                        );
                                                    })}
                                                </Form.Control>
                                                {errors.carrera && (
                                                    <ErrorInput
                                                        data={errors.carrera}
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
