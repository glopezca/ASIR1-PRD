#!/bin/bash

# ------------------------------------------------------------
# Script: analizar_ruta.sh
# Descripción:
#   - Recibe una ruta como argumento.
#   - Si es directorio → muestra su contenido formateado.
#   - Si es fichero → lo trata como fichero ordinario.
#   - Si no existe → envía error a stderr.
# ------------------------------------------------------------

# --- 0. Definición de constantes y declaración de variables ---

declare ruta=""
declare ruta_abs=""
declare nombre=""
declare -i lineas=0
declare -i palabras=0
declare -i caracteres=0

echo "Contador de líneas, palabras y caracteres"
echo "---------------------------------------------"

# --- 1. Validación de argumentos ---
if [[ $# -ne 1 ]]; then
    echo "Uso: $0 <ruta>" >&2
    echo "Donde <ruta> es la de un directorio o un fichero a analizar." >&2
    echo "Ejemplo: $0 /home/usuario/documentos" >&2
    echo "         $0 /home/usuario/archivo.txt" >&2
    exit 1 # No es 0 por argumentos incorrectos
fi

ruta="$1" # Asignar el argumento $1 a la variable ruta

# --- 2. Comprobación de existencia ---
if [[ ! -e "$ruta" ]]; then
    echo "Error: '$ruta' no existe." >&2
    exit 2 # No es 0 porque la ruta no existe
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
    exit 0 # Terminar correctamente después de procesar el fichero
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

