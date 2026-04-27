#!/bin/bash

############################################################
# DECLARACIÓN DE CONSTANTES Y VARIABLES
############################################################

declare -r DIR="Alumnos"

# Códigos de error
declare -r ERR_ARGS=1
declare -r ERR_EXISTE=2
declare -r ERR_NO_EXISTE=3
declare -r ERR_OP=4
declare -r ERR_DNI=5

declare opcion="$1"
declare dni="$2"
declare fichero

############################################################
# VALIDACIÓN DE ARGUMENTOS
############################################################

if [[ -z "$opcion" || -z "$dni" ]]; then
    echo "Uso: $0 -c|-l|-a|-b DNI"
    exit $ERR_ARGS
fi

############################################################
# VALIDACIÓN DE DNI (FORMATO 8 DÍGITOS + LETRA)
############################################################

if [[ ! "$dni" =~ ^[0-9]{8}[A-Za-z]$ ]]; then
    echo "Error: DNI inválido (formato correcto: 12345678A)"
    exit $ERR_DNI
fi

############################################################
# PREPARACIÓN DEL ENTORNO
############################################################

if [[ ! -d "$DIR" ]]; then
    mkdir "$DIR"
fi

fichero="$DIR/$dni.txt"

############################################################
# CONDICIONAL MÚLTIPLE PRINCIPAL
############################################################

case "$opcion" in

############################################################
# CREAR (-c)
############################################################
-c)
    if [[ -f "$fichero" ]]; then
        echo "Error: el alumno ya existe"
        exit $ERR_EXISTE
    fi

    echo "Introduce NUSS:"
    read -r nuss
    echo "Introduce Nombre:"
    read -r nombre
    echo "Introduce Apellidos:"
    read -r apellidos

    echo -e "$dni\n$nuss\n$nombre\n$apellidos" > "$fichero"

    echo "Alumno creado correctamente"
    ;;

############################################################
# LEER (-l)
############################################################
-l)
    if [[ ! -f "$fichero" ]]; then
        echo "Error: el alumno no existe"
        exit $ERR_NO_EXISTE
    fi

    echo "Datos del alumno:"
    cat "$fichero"
    ;;

############################################################
# ACTUALIZAR (-a)
############################################################
-a)
    if [[ ! -f "$fichero" ]]; then
        echo "Error: el alumno no existe"
        exit $ERR_NO_EXISTE
    fi

    echo "Introduce nuevo NUSS:"
    read -r nuss
    echo "Introduce nuevo Nombre:"
    read -r nombre
    echo "Introduce nuevos Apellidos:"
    read -r apellidos

    echo -e "$dni\n$nuss\n$nombre\n$apellidos" > "$fichero"

    echo "Alumno actualizado correctamente"
    ;;

############################################################
# BORRAR (-b)
############################################################
-b)
    if [[ ! -f "$fichero" ]]; then
        echo "Error: el alumno no existe"
        exit $ERR_NO_EXISTE
    fi

    echo "¿Seguro que deseas borrar el alumno? (s/n)"
    read -r confirmacion

    if [[ "$confirmacion" == "s" || "$confirmacion" == "S" ]]; then
        rm "$fichero"
        echo "Alumno borrado correctamente"
    else
        echo "Operación cancelada"
    fi
    ;;

############################################################
# OPCIÓN NO VÁLIDA
############################################################
*)
    echo "Error: opción no válida"
    exit $ERR_OP
    ;;
esac
