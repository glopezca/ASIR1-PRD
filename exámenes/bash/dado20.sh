#!/bin/bash

# Definición de constantes y declaración de variables

declare -ri CARAS=20 # Número de caras del dado: constante entera
declare tirar # Variable para almacenar la entrada del usuario

# Programa principal

while true; do
    read -p "Tirar dado (Salir con [S] o [s]): " tirar

    # Alternativas para comparar la entrada con "S" o "s":
    #if [[ $tirar =~ ^[Ss]$ ]] ; then
    #if [[ "${tirar,,}" == "s" ]] ; then
    #if [[ "${tirar^^}" == "S" ]] ; then
    #lower=$(echo "$tirar" | tr 'A-Z' 'a-z')
    #if [[ "${lower}" == "s" ]] then

    if [[ $(echo "$tirar" | tr 'A-Z' 'a-z') == s ]] then
	    exit 0
    fi
    echo $(( RANDOM % CARAS + 1 ))
done
