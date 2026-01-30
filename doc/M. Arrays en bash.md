### 🔎 Diferencia entre `${array[@]}` y `${!array[@]}` en Bash

En Bash existen dos expansiones clave para recorrer arrays que **no son equivalentes** y conviene no confundir:

#### `${array[@]}` — valores del array
- Devuelve **todos los valores** almacenados en el array.
- Es la forma habitual cuando solo interesa procesar los datos.

```bash
valores=(rojo verde azul)

for v in "${valores[@]}"; do
    echo "$v"
done
```

Salida:
```text
rojo
verde
azul
```

---

#### `${!array[@]}` — índices o claves del array
- Devuelve **los índices** (arrays indexados) o **las claves** (arrays asociativos).
- Permite acceder simultáneamente a **posición y valor**.

```bash
for i in "${!valores[@]}"; do
    echo "Índice $i → ${valores[$i]}"
done
```

Salida:
```text
Índice 0 → rojo
Índice 1 → verde
Índice 2 → azul
```
