import React from "react";

export const columnasLibros = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Titulo",
        field: "titulo",
        render: rowdata => (
            <a href={"/libros/" + rowdata.id}>{rowdata.titulo}</a>
        ),
        type: "string"
    },
    {
        title: "Autor",
        field: "autor.nombre",
        render: rowdata => (
            <a href={"/autores/" + rowdata.autor.id}>{rowdata.autor.nombre}</a>
        ),
        type: "string"
    },
    {
        title: "Disponibilidad",
        field: "disponible",
        render: rowdata => (
            <span
                className={
                    "estado " + (rowdata.disponible ? "disponible" : "prestado")
                }
            >
                {rowdata.disponible ? "Disponible" : "Prestado"}
            </span>
        ),
        type: "string"
    }
];

export const columnasPrestamosRealizados = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Cedula",
        field: "cedula",
        type: "numeric",
        render: rowdata => (
            <a href={"/usuarios/" + rowdata.cedula}>{rowdata.cedula}</a>
        )
    },
    {
        title: "Copia",
        field: "copia_id",
        type: "numeric",
        render: rowdata => (
            <a href={"/copias/" + rowdata.copia_id}>{rowdata.copia_id}</a>
        )
    },
    {
        title: "Fecha de prestamo",
        field: "fecha_de_prestamo",
        type: "datetime"
    },
    {
        title: "Fecha a retornar",
        field: "fecha_a_retornar",
        type: "datetime"
    },
    {
        title: "Fecha de entrega",
        field: "fecha_de_entrega",
        type: "datetime"
    }
];

export const columnasPrestamosActivos = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Cedula",
        field: "cedula",
        type: "numeric",
        render: rowdata => (
            <a href={"/usuarios/" + rowdata.cedula}>{rowdata.cedula}</a>
        )
    },
    {
        title: "Copia",
        field: "copia_id",
        type: "numeric",
        render: rowdata => (
            <a href={"/copias/" + rowdata.copia_id}>{rowdata.copia_id}</a>
        )
    },
    {
        title: "Fecha de prestamo",
        field: "fecha_de_prestamo",
        type: "datetime"
    },
    {
        title: "Fecha a retornar",
        field: "fecha_a_retornar",
        type: "datetime"
    },
    {
        title: "Acciones",
        type: "string",
        searchable: false,
        render: rowdata => (
            <a href={`/prestamos/${rowdata.id}/retornar`}>
                <button className="btn btn-primary btn-sm">Retornar</button>
            </a>
        )
    }
];

export const columnasAutores = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Nombre",
        field: "nombre",
        render: rowdata => (
            <a href={"/autores/" + rowdata.id}>{rowdata.nombre}</a>
        ),
        type: "string"
    },
    {
        title: "Libros en Biblioteca",
        field: "libros",
        type: "string",
        searchable: false
    }
];

export const columnasUsuarios = [
    {
        title: "Cedula",
        field: "cedula",
        type: "numeric"
    },
    {
        title: "Nombre",
        field: "nombres",
        render: rowdata => (
            <a href={"/usuarios/" + rowdata.cedula}>
                {rowdata.nombres.split(" ")[0]}
            </a>
        ),
        type: "string"
    },
    {
        title: "Apellido",
        field: "apellidos",
        render: rowdata => (
            <a href={"/usuarios/" + rowdata.cedula}>
                {rowdata.apellidos.split(" ")[0]}
            </a>
        ),
        type: "string"
    },
    {
        title: "Carrera",
        field: "carrera.nombre",
        type: "string"
    },
    {
        title: "Rol",
        field: "rol.nombre",
        type: "string",
        searchable: false
    }
];

export const columnasRoles = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Rol",
        field: "rol",
        render: rowdata => <a href={"/roles/" + rowdata.id}>{rowdata.rol}</a>,
        type: "string"
    }
];

export const columnasEstados = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Estado",
        field: "estado",
        render: rowdata => (
            <a href={"/estados/" + rowdata.id}>{rowdata.estado}</a>
        ),
        type: "string"
    }
];

export const columnasCopias = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Cota",
        field: "cota",
        type: "string"
    },
    {
        title: "Libro",
        field: "libro.titulo",
        render: rowdata => (
            <a href={"/libros/" + rowdata.libro.id}>{rowdata.libro.titulo}</a>
        ),
        type: "string"
    },
    {
        title: "Estado",
        field: "estado",
        render: rowdata => (
            <span
                className={
                    "estado " + (rowdata.estado ? "disponible" : "prestado")
                }
            >
                {rowdata.estado ? "Disponible" : "Prestado"}
            </span>
        ),
        type: "string"
    }
];

export const columnasCategorias = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Categoria",
        field: "categoria",
        render: rowdata => (
            <a href={"/categorias/" + rowdata.id}>{rowdata.categoria}</a>
        ),
        type: "string"
    }
];

export const columnasCarreras = [
    {
        title: "ID",
        field: "id",
        type: "numeric"
    },
    {
        title: "Carrera",
        field: "carrera",
        render: rowdata => (
            <a href={"/carreras/" + rowdata.id}>{rowdata.carrera}</a>
        ),
        type: "string"
    }
];
