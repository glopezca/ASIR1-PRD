# Manual de referencia de PHP y Bash

**Comparativa con explicaciones pedagógicas, ejemplos y código resaltado.**  

---

## 😀 1. Razón de ser

### Bash
- Shell de Unix diseñado para interactuar con el sistema operativo.
- Permite ejecutar comandos, encadenarlos y automatizar tareas.
- Muy cercano al sistema: procesos, ficheros, permisos.
- Ventajas:
  - Simple
  - Directo
  - Ideal para automatización y administración del SO

### PHP
- Lenguaje de programación de propósito general.
- Creado originalmente para generar páginas web dinámicas.
- Enfocado en lógica de backend y generación de contenido.
- Ventajas:
  - Amplio ecosistema
  - Robusto
  - Orientado a aplicaciones complejas

---

## 🚀 2. Aplicación

### Bash
- Scripts de administración de sistemas.
- Automatización de tareas repetitivas:
  - Backups
  - Despliegues
  - Tareas cron
  - Monitorización
- Procesamiento de archivos y logs usando herramientas del sistema.

### PHP
- Desarrollo web backend.
- Generación dinámica de HTML.
- Conexión con bases de datos.
- Uso de frameworks:
  - Laravel
  - Symfony
- Uso de CMS:
  - WordPress
  - Joomla
  - Moodle

---

## 🔥 3. Naturaleza de los lenguajes

### PHP
- Lenguaje de programación de propósito general.
- Especialmente usado en entornos web.
- Características:
  - Tipado dinámico
  - Soporte para orientación a objetos
  - Librerías extensas
  - Ejecución en servidor web o en CLI

### Bash
- Intérprete de comandos en Linux/Unix.
- Diseñado para automatización del sistema.
- Características:
  - Ideal para tareas de sistema
  - Sintaxis heredada de shells tradicionales
  - Tipado débil (todo es texto)

---

## 🔧 4. Peculiaridades sintácticas comparadas

| Característica | PHP | Bash |
|--------------|------|------|
| Fin de sentencia | `;` obligatorio | Por línea |
| Bloques | `{}` | `then/fi`, `do/done` |
| Variables | `$var` | `var="valor"` |
| Arrays | Complejos | Indexados / Asociativos |
| Comentarios | `//`, `#`, `/* */` | `#` |

---

## 🧩 5. Estructura general de un script

### Bash
```bash
#!/bin/bash
echo "Hola"
```
- No requiere llaves.
- Se ejecuta línea a línea.

### PHP
```php
<?php
echo "Hola";
?>
```
- Usa etiquetas `<?php ?>`.
- Requiere punto y coma.

---

## 🧩 6. Comentarios

### PHP
```php
// comentario de línea
# comentario alternativo
/* comentario
de
bloque */
```

### Bash
```bash
# comentario de línea
```

---

## 🔢 7. Declaración y asignación de variables

### Bash
```bash
nombre="Juan"
edad=30
```
- No usa símbolo `$` al declarar.
- `$` solo se usa al acceder.

### PHP
```php
$nombre = "Juan";
$edad = 30;
```
- El `$` identifica a la variable.

---

## 🔐 8. Declaración avanzada de variables y constantes

### Bash
- Variables creadas por asignación.
- Todo es texto por defecto.
- `declare` NO es obligatorio, pero es muy recomendable.

### Enteros
```bash
declare -i contador=5
contador=contador+1
```

### Constantes
```bash
declare -r PI=3.14
```

### Arrays indexados
```bash
declare -a nums
nums=(1 2 3)
```

### Arrays asociativos
```bash
declare -A map
map[a]=1
map[b]=2
```

### Exportar variables
```bash
declare -x PATH_EXTRA="/opt/bin"
```

### Inspección
```bash
declare -p PI
```


- ❌ Bash NO tiene constantes reales.
- `readonly` crea variables de solo lectura.

### PHP
```php
const PI = 3.14;
define("EULER", 2.718);
```

- Las constantes:
  - No llevan `$`
  - No se interpolan en cadenas

---

## 🔄 9. Condicionales

### Bash
```bash
if [ $x -gt 10 ]; then
    echo "Mayor"
else
    echo "Menor"
fi
```

### PHP
```php
if ($x > 10) {
    echo "Mayor";
} else {
    echo "Menor";
}
```

---

## 🔁 10. Bucles

### Bash
```bash
for i in {1..5}; do
    echo $i
done
```

### PHP
```php
for ($i = 1; $i <= 5; $i++) {
    echo $i;
}
```

---

## 🧮 11. Operadores y comparaciones

| Concepto | Bash | PHP |
|--------|------|-----|
| Igualdad numérica | `-eq` | `==` |
| Igualdad de cadenas | `=` | `==` |
| Mayor que | `-gt` | `>` |
| AND | `&&`, `-a` | `&&` |
| OR | `||`, `-o` | `||` |

---

## ⛓️ 12. Manejo de cadenas (strings)

### Cadenas literales
- Comillas simples: no interpretan variables ni `\n`
- Comillas dobles: sí interpretan

### Concatenación
- Bash: implícita o `+=`
- PHP: `.` o `.=`

### Caracteres especiales
- Bash: `-e` o `$'...'`
- PHP: interpretación automática en comillas dobles

---

## 📦 13. Arrays

### Bash
```bash
arr=(1 2 3)
declare -A dict
dict[key]=value
```

### PHP
```php
$arr = [1,2,3];
$dict = ["key"=>"value"];
```

---

## 📝 14. Funciones

### Bash
```bash
mi_funcion() {
    echo "Hola"
}
```

### PHP
```php
function mi_funcion() {
    echo "Hola";
}
```

---


## 🔧 15. Contextos especiales de Bash (FUNDAMENTAL)

### 15.1 (( )) — Aritmética
```bash
(( x = a + b ))
(( i++ ))
(( flag = x > 10 ? 1 : 0 ))
```

**Operadores permitidos:**  
`+ - * / % ** < <= > >= == != && || & | ^ ~ <<= >>=`

---

### 15.2 [[ ]] — Condiciones avanzadas
```bash
[[ "$cadena" == "Hola" ]]
[[ $cadena =~ ^[A-Z]{3}$ ]]
```

#### Operadores permitidos en `[[ ]]`

##### 1. Comparación de cadenas

| Operador | Significado | Ejemplo |
|---------|-------------|---------|
| `==` | Igual (acepta globbing) | `[[ $a == "hola" ]]` |
| `!=` | Distinto | `[[ $a != "hola" ]]` |
| `<` | Menor lexicográfico | `[[ $a < $b ]]` |
| `>` | Mayor lexicográfico | `[[ $a > $b ]]` |

Ejemplo con globbing:
```bash
[[ $archivo == *.txt ]]
```

---

##### 2. Operadores numéricos

| Operador | Significado |
|----------|-------------|
| `-eq` | Igual |
| `-ne` | Distinto |
| `-gt` | Mayor |
| `-lt` | Menor |
| `-ge` | Mayor o igual |
| `-le` | Menor o igual |

Ejemplo:
```bash
[[ $x -gt 10 ]]
```

---

##### 3. Expresiones regulares

| Operador | Significado |
|----------|-------------|
| `=~` | Coincidencia regex |

```bash
[[ $dni =~ ^[0-9]{8}[A-Z]$ ]]
```

---

##### 4. Operadores lógicos

| Operador | Significado |
|----------|-------------|
| `&&` | AND |
| `||` | OR |
| `!` | NOT |

```bash
[[ $a == "hola" && $b == "mundo" ]]
[[ $edad -ge 18 || $permiso == "si" ]]
[[ ! -f archivo.txt ]]
```

---

##### 5. Pruebas de archivos

| Operador | Significado |
|----------|-------------|
| `-f` | Archivo regular |
| `-d` | Directorio |
| `-e` | Existe |
| `-r` | Lectura |
| `-w` | Escritura |
| `-x` | Ejecución |
| `-s` | Tamaño > 0 |

```bash
[[ -d /etc ]]
```

---

##### 6. Pruebas de variables

| Operador | Significado |
|----------|-------------|
| `-z` | Cadena vacía |
| `-n` | Cadena no vacía |

```bash
[[ -z $var ]]
[[ -n $usuario ]]
```

---

##### 7. Comparación de patrones (globbing)

```bash
[[ $fichero == *.jpg ]]
[[ $nombre == A?? ]]
[[ $letra == [A-Z] ]]
```

---

### 15.3 [ ] — test POSIX

El contexto `[ ]` corresponde al comando POSIX `test`.  
Es más estricto que `[[ ]]` pero fundamental para scripts portables.

#### Restricciones importantes

- Espacios obligatorios
```bash
[ "$x" -eq 5 ]
```

- `<` y `>` deben escaparse
```bash
[ "$a" \< "$b" ]
```

- No admite expresiones regulares
- Globbing no protegido

```bash
[ *.txt = "*.txt" ]   # incorrecto
```

---

#### Comparaciones numéricas

| Operador | Significado |
|----------|-------------|
| `-eq` | Igual |
| `-ne` | Distinto |
| `-gt` | Mayor |
| `-lt` | Menor |
| `-ge` | Mayor o igual |
| `-le` | Menor o igual |

---

#### Comparaciones de cadenas

| Operador | Significado |
|----------|-------------|
| `=` | Igual |
| `!=` | Distinto |
| `\<` | Menor |
| `\>` | Mayor |

---

#### Pruebas sobre archivos

| Operador | Significado |
|----------|-------------|
| `-f` | Archivo |
| `-d` | Directorio |
| `-e` | Existe |
| `-r` | Lectura |
| `-w` | Escritura |
| `-x` | Ejecución |
| `-s` | Tamaño > 0 |
| `-h` | Enlace simbólico |

---

#### Operadores lógicos

| Operador | Significado |
|----------|-------------|
| `-a` | AND |
| `-o` | OR |
| `!` | NOT |

```bash
[ "$a" -gt 0 -a "$b" -gt 0 ]
[ "$user" != "root" -o "$UID" -eq 0 ]
[ ! -f archivo.txt ]
```

**Recomendación:**  
```bash
[ cond1 ] && [ cond2 ]
```
o usar `[[ ]]`.



## 📥 16. Entrada estándar (STDIN)

### Bash
```bash
read nombre
read -p "Edad: " edad
read -s password
```

### PHP
```php
$nombre = readline();
$linea = trim(fgets(STDIN));
```

---

## 📦 17. Argumentos de línea de comandos

### Bash
```bash
echo "Total: $#"
for arg in "$@"; do
    echo "$arg"
done
```

### PHP
```php
echo "Total: $argc
";
for ($i = 1; $i < $argc; $i++) {
    echo $argv[$i] . "
";
}
```

---



