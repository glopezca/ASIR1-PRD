#!/bin/bash

declare valor

read -p "Introduce un valor que puede ser un número natural o no: " valor

if [[ "$valor" =~ ^[0-9]+$ ]]; then
    echo "$valor es un número natural"
else
    echo "$valor no es un número natural"
    exit 1
fi
