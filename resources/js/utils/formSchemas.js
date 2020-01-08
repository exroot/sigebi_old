import * as yup from "yup";

export const autorSchema = yup.object().shape({
    nombre: yup
        .string()
        .required("Por favor ingrese el nombre del autor.")
        .min(4, "El nombre del autor debe tener al menos 4 caracteres.")
        .max(80, "El nombre del autor es muy largo.")
});
