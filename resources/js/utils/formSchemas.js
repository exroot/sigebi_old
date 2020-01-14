import * as yup from "yup";

export const autorSchema = yup.object().shape({
    nombre: yup
        .string()
        .required("Por favor ingrese el nombre del autor.")
        .min(3, "El nombre del autor debe tener al menos 3 caracteres.")
        .max(100, "El nombre del autor es muy largo.")
});

export const estadoSchema = yup.object().shape({
    estado: yup
        .string()
        .required("Por favor ingrese el estado.")
        .min(4, "El estado debe tener al menos 4 caracteres.")
        .max(100, "El nombre del estado es muy largo.")
});

export const categoriaSchema = yup.object().shape({
    categoria: yup
        .string()
        .required("Por favor ingrese la categoria.")
        .min(4, "La categoria debe tener al menos 4 caracteres.")
        .max(100, "El nombre de la categoria es muy largo.")
});

export const rolSchema = yup.object().shape({
    rol: yup
        .string()
        .required("Por favor ingrese el rol.")
        .min(4, "El rol debe tener al menos 4 caracteres.")
        .max(100, "El nombre de la categoria es muy largo.")
});

export const carreraSchema = yup.object().shape({
    carrera: yup
        .string()
        .required("Por favor ingrese la carrera.")
        .min(4, "La carrera debe tener al menos 4 caracteres.")
        .max(100, "El nombre de la carrera es muy largo.")
});

export const userSchema = yup.object().shape({ 
    cedula: yup
        .number()
        .integer()
        .required("Por favor ingrese la cedula del usuario.")
        .min(999999, "Cedula muy corta.")
        .max(99999999, "Cedula muy larga."),
    nombres: yup
        .string()
        .required("Por favor ingrese el nombre del usuario.")
        .min(3, "El nombre del usuario debe tener al menos 3 caracteres.")
        .max(100, "El nombre del usuario es muy largo."),
    apellidos: yup
        .string()
        .required("Por favor ingrese el apellido del usuario.")
        .min(3, "El apellido del usuario debe tener al menos 3 caracteres.")
        .max(100, "El apellido del usuario es muy largo."),
    email: yup
        .string()
        .email()
        .required("Por favor ingrese el email del usuario."),
    password: yup
        .string()
        .required("Por favor ingrese una contraseña.")
        .min(8, "Contraseña muy corta, debe tener al menos 8 caracteres."),
    rol: yup
        .number()
        .integer()
        .required("Por favor ingrese el rol del usuario.")
        .min(1, "Rol no existe"),
    carrera: yup
        .number()
        .integer()
        .required("Por favor ingrese la carrera del usuario.")
        .min(1, "Carrera no existe.")
});

export const libroSchema = yup.object().shape({
    titulo: yup
        .string()
        .required("Por favor ingrese el titulo del libro.")
        .min(3, "El titulo del libro es muy corto.")
        .max(100, "El titulo del libro es muy largo."),
    descripcion: yup
        .string()
        .min(3, "La descripcion del libro es muy corto.")
        .max(100, "La descripcion del libro es muy largo."),
    categoria: yup
        .number()
        .integer()
        .required("Por favor ingrese la categoria del libro.")
        .min(1, "Categoria no existe."),
    autor: yup
        .number()
        .integer()
        .required("Por favor ingrese el autor del libro.")
        .min(1, "Actor no existe.")
});

export const copiaSchema = yup.object().shape({
    cota: yup
        .string()
        .required("Por favor ingrese la cota de la copia.")
        .min(3, "La cota de la copia es muy corta.")
        .max(100, "La cota de la copia es muy larga."),
    libro: yup
        .number()
        .integer()
        .required("Por favor enlace esta copia a un libro.")
        .min(1, "El libro no existe."),
    estado: yup
        .number()
        .integer()
        .required("Por favor ingrese el estado actual de la copia.")
        .min(1, "El estado no existe")
});

export const prestamoSchema = yup.object().shape({
    copia: yup
        .number()
        .integer()
        .required("Por favor ingrese la copia.")
        .min(1, "Copia no existe."),
    cedula: yup
        .number()
        .integer()
        .required("Por favor ingrese la cedula del usuario.")
        .min(999999, "Cedula muy corta.")
        .max(99999999, "Cedula muy larga.")
});
