#!/bin/bash

# ------------------------------------------------------------
# Script: analizar_ruta.sh
# Descripción:
#   - Recibe una ruta como argumento.
#   - Si es directorio → muestra su contenido formateado.
#   - Si es fichero → lo trata como fichero ordinario.
#   - Si no existe → envía error a stderr.
# ------------------------------------------------------------

# --- 1. Validación de argumentos ---
if [[ $# -ne 1 ]]; then
    echo "Uso: $0 <ruta>" >&2
    exit 1
fi

ruta="$1"

# --- 2. Comprobación de existencia ---
if [[ ! -e "$ruta" ]]; then
    echo "Error: '$ruta' no existe." >&2
    exit 2
fi

# --- 3. Función para procesar fichero ---
procesar_fichero() {
    local fichero="$1"

    # Obtener estadísticas
    lineas=$(wc -l < "$fichero")
    palabras=$(wc -w < "$fichero")
    caracteres=$(wc -m < "$fichero")

    ruta_abs=$(realpath "$fichero")

    echo "[f] $lineas $palabras $caracteres $ruta_abs"
}

# --- 4. Si es fichero ---
if [[ -f "$ruta" ]]; then
    procesar_fichero "$ruta"
    exit 0
fi

# --- 5. Si es directorio ---
if [[ -d "$ruta" ]]; then

    # Obtener ruta absoluta
    ruta_abs=$(realpath "$ruta")

    # Línea principal del directorio
    echo "[d] $ruta_abs"

    # Recorrer contenido (sin recursividad)
    for elemento in "$ruta"/*; do

        # Si el directorio está vacío, evitar literal "*"
        [[ ! -e "$elemento" ]] && continue

        nombre=$(basename "$elemento")

        if [[ -f "$elemento" ]]; then
            lineas=$(wc -l < "$elemento")
            palabras=$(wc -w < "$elemento")
            caracteres=$(wc -m < "$elemento")
            echo "[f] |- $lineas $palabras $caracteres $nombre"

        elif [[ -d "$elemento" ]]; then
            echo "[d] |- $nombre"
        fi

    done
fi

