# Manual de referencia de PHP y Bash

**Comparativa extensa, con explicaciones pedagógicas, ejemplos exhaustivos y código resaltado.**

---

# 😀 1. Razón de ser

## **Bash**
- Shell de Unix diseñado para interactuar con el sistema operativo.
- Automatiza tareas, ejecuta comandos y gestiona archivos y procesos.
- Ventajas: simple y directo  (ideal para automatización).


## **PHP**
- Lenguaje creado para generar páginas web dinámicas.
- Enfocado en lógica de backend y generación de contenido desde el servidor.
- Ventajas: amplio y robusto (orientado a aplicaciones).  

---

# 🚀 2. Aplicación

## **Bash**
- Scripts de administración de sistemas.
- Automatización: backups, despliegues, cron, monitoreo.
- Procesamiento de archivos usando utilidades del sistema.

## **PHP**
- Desarrollo web backend.
- Generación dinámica de HTML.
- Conexión con bases de datos.
- Frameworks: Laravel, Symfony.
- CMS: WordPress, Joomla, Moodle.

# 🔥 3. Naturaleza de los lenguajes
## PHP
PHP es un **lenguaje de programación de propósito general**, especialmente usado en entornos web. Dispone de:
- Tipado dinámico
- Soporte para orientación a objetos
- Librerías extensas
- Diseñado para su ejecución en servidores web (backend), se puede ejecutar también en la CLI

## Bash
Bash es un **intérprete de comandos** orientado a automatización en Linux/Unix:
- Ideal para tareas de sistema
- Sintaxis heredada de shells tradicionales
- Tipado débil

---

# 🔧 4. Peculiaridades sintácticas comparadas
| Característica | PHP | Bash |
|--------------|------|------|
| `;` | Obligatorio | Opcional |
| Bloques | `{}` | `then/fi`, `do/done` |
| Variables | `$var` | `var="valor"` |
| Arrays | Complejos | Simples/Asociativos |
| Comentarios | `//`, `#` y `/* */` | `#` |

---

## 🧩 1. Estructura general de un script

| Lenguaje | Ejemplo | Características |
|---------|---------|------------------|
| **Bash** | 
```bash
#!/bin/bash
echo "Hola"
```
 | No requiere llaves, se ejecuta línea a línea. |
| **PHP** | 
```php
<?php
echo "Hola";
?>
```
 | Usa etiquetas `<?php ?>` y punto y coma obligatorio. |

---

## 🧩 2. Comentarios
### PHP
```php
// comentario de línea (más habitual)
# comentario de línea (menos habitual)
/* comentario
de
bloque */
```

### Bash
```bash
# comentario de línea
```

## 🔢 3. Declaración y asignación de variables

| Bash | PHP |
|------|-----|
| `nombre="Juan"`  | `$nombre = "Juan";` |
| No usa tipo ningún símbolo especial. | El *\$* identifica a la variable. |

---

## 🔄 4. Condicionales

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

**Diferencias clave:**  
- Bash usa `then` y termina con `fi`.  
- PHP usa paréntesis y llaves.  

---

## 🔁 5. Bucles

### **Bash – for**
```bash
for i in {1..5}; do
    echo $i
done
```

### **PHP – for**
```php
for ($i = 1; $i <= 5; $i++) {
    echo $i;
}
```

---

## 🧮 6. Comparación y operadores

| Concepto | Bash | PHP |
|----------|------|------|
| Igualdad numérica | `-eq` | `==` |
| Igualdad de cadenas | `=` | `==` |
| Mayor que | `-gt` | `>` |
| Y lógico | `&&` o `-a` | `&&` |
| O lógico | `\|\|` o `-o` | `\|\|` |

---

## ⛓️ 7. Manejo de cadenas de caracteres (strings)
Incluye concatenación, uso de literales, variables, constantes y manejo de caracteres especiales como `\n`.

---

### 1. Cadenas literales

| Lenguaje | Ejemplo | Notas |
|---------|---------|-------|
| **Bash** | ```bash
'Hola mundo'
"Hola mundo"
``` | Comillas simples **no interpretan** variables ni `\n`. Comillas dobles **sí**. |
| **PHP** | ```php
'Hola mundo';
"Hola mundo";
``` | Igual que Bash: comillas simples **no** interpretan `\n` ni variables; comillas dobles **sí**. |

---

### 2. Concatenación de cadenas

#### 🔹 Bash
```bash
a="Hola"
b="Mundo"
c="$a $b"
echo "$c"
```
- La concatenación se hace **implícita** colocando cadenas juntas.  
- También se puede usar `+=`:

```bash
c="Hola"
c+=" Mundo"
```

#### 🔹 PHP
```php
$a = "Hola";
$b = "Mundo";
$c = $a . " " . $b;
echo $c;
```
- Usa el operador `.` para concatenar.  
- También existe `.=`:

```php
$c = "Hola";
$c .= " Mundo";
```

---

### 3. Variables dentro de cadenas

#### Bash
```bash
nombre="Ana"
echo "Hola $nombre"   # ✔ Se expande
echo 'Hola $nombre'   # ❌ No se expande
```

#### PHP
```php
$nombre = "Ana";
echo "Hola $nombre"; // ✔ Se expande
echo "Hola " . $nombre; // ✔ Se concatena
echo 'Hola $nombre';   // ❌ No se expande
echo 'Hola ' . $nombre; // ✔ Se concatena
```

---

### 4. Constantes

#### Bash  

```bash
nombre="Ana"
readonly PI="3.14"
echo $PI
echo "Hola $nombre, el valor de PI es $PI" # se expanden la variable y la constante
```

#### PHP  
```php
<?php
    $nombre = "Ana";
    define("PI", 3.14);
    echo PI;
    echo "Hola, $nombre, el valor de PI es " . PI; // se expande la variable, pero NO la constante, que hay que concatenarla
    echo "Hola, " . $nombre . ", el valor de PI es " . PI; // se concatenan la variable y la constante
?>
```
O usando `const`:
```php
<?php
    $nombre = "Ana";
    const PI = "3.14";
    echo PI;
    echo "Hola, $nombre, el valor de PI es " . PI; // se expande la variable, pero NO la constante, que hay que concatenarla
    echo "Hola, " . $nombre . ", el valor de PI es " . PI; // se concatenan la variable y la constante
?>
```

---

### 5. Caracteres especiales (`\n`, `\t`, etc.)

#### Bash
- Con comillas dobles **sí** se interpretan:
```bash
echo "Linea 1
Linea 2"
```

- Especificando saltos de línea:
```bash
#!/bin/bash
nombre="Ana"
readonly PI="3.14"
echo $PI
echo "Hola, $nombre, el valor de PI es $PI \n"
```

- Para que realmente funcione, suele requerir `-e` o usar `$'...'`:
```bash
#!/bin/bash
echo -e "Linea 1
Linea 2"
echo $'Linea 1
Linea 2'
```

#### PHP
```php
echo "Linea 1
Linea 2";
```
- No necesita opciones adicionales.

- Especificando saltos de línea:
```php
<?php
    $nombre = "Ana";
    define("PI", 3.14);
    echo PI;
    echo "Hola, $nombre, el valor de PI es " . PI . "\n";
?>
```

---

### 6. Ejemplos completos de concatenación con caracteres especiales

#### Bash
```bash
saludo="Hola"
dest="$saludo
Mundo"
echo -e "$dest"
```

#### PHP
```php
$saludo = "Hola";
$dest = $saludo . "
Mundo";
echo $dest;
```

---

### 7. Resumen visual

| Operación | Bash | PHP |
|-----------|------|-----|
| Concatenación | Implícita o `+=` | `.` o `.= ` |
| Interpretación de `\n` | `-e` o `$'...'` | Automática en comillas dobles |
| Variables en cadenas | Sólo en comillas dobles | Sólo en comillas dobles |
| Constantes | `readonly` | `define()` / `const` |
| Carácter de fin de sentencia | No requiere | `;` obligatorio |

---

## 📦 8. Manejo de arrays

### Bash
```bash
arr=(1 2 3)
echo ${arr[1]}
```

### PHP
```php
$arr = [1, 2, 3];
echo $arr[1];
```

---

## 📝 9. Funciones

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

## 📌 Resumen visual

| Aspecto | Bash | PHP |
|--------|------|------|
| Variables | Sin símbolo | `\$variable` |
| Final de sentencia | Por línea | `;` obligatorio |
| Cuerpo de bloques | `then…fi` / `do…done` | `{ … }` |
| Arrays | Más limitados | Muy completos |
| Enfoque | Automatización SO | Backend web |

---

# 4. Contextos especiales de Bash
## 4.1 (( )) — Aritmética
```bash
(( x = a + b ))
(( i++ ))
(( flag = x > 10 ? 1 : 0 ))
```

### Operadores permitidos
`+ - * / % ** < <= > >= == != && || & | ^ ~ <<= >>=`  

## 4.2 [[ ]] — Condiciones avanzadas
```bash
[[ "$cadena" == "Hola" ]]
[[ $cadena =~ ^[A-Z]{3}$ ]]
```

### Operadores permitidos en `[[ ]]` de Bash

#### 1. Operadores de comparación de cadenas

| Operador | Significado | Ejemplo |
|---------|-------------|---------|
| `==` | Igual a (acepta patrones glob) | `[[ $a == "hola" ]]` |
| `!=` | Distinto de | `[[ $a != "hola" ]]` |
| `<` | Menor lexicográficamente | `[[ $a < $b ]]` |
| `>` | Mayor lexicográficamente | `[[ $a > $b ]]` |

Ejemplo con *globbing*:
```bash
[[ $archivo == *.txt ]]
```

---

#### 2. Operadores numéricos

| Operador | Significado |
|----------|-------------|
| `-eq` | Igual a |
| `-ne` | Distinto de |
| `-gt` | Mayor que |
| `-lt` | Menor que |
| `-ge` | Mayor o igual |
| `-le` | Menor o igual |

Ejemplo:
```bash
[[ $x -gt 10 ]]
```

---

#### 3. Operador de expresión regular

| Operador | Significado |
|----------|-------------|
| `=~` | Coincide con expresión regular |

Ejemplo:
```bash
[[ $dni =~ ^[0-9]{8}[A-Z]$ ]]
```

---

#### 4. Operadores lógicos

| Operador | Significado |
|----------|-------------|
| `&&` | AND lógico |
| `\|\|` | OR lógico |
| `!` | Negación |

Ejemplos:
```bash
[[ $a == "hola" && $b == "mundo" ]]
[[ $edad -ge 18 || $permiso == "si" ]]
[[ ! -f archivo.txt ]]
```

---

#### 5. Pruebas de archivos

| Operador | Significado |
|----------|-------------|
| `-f` | Archivo regular |
| `-d` | Directorio |
| `-e` | Existe |
| `-r` | Lectura |
| `-w` | Escritura |
| `-x` | Ejecución |
| `-s` | Tamaño mayor que 0 |

Ejemplo:
```bash
[[ -d /etc ]]
```

---

#### 6. Pruebas de variables

| Operador | Significado |
|----------|-------------|
| `-z` | Cadena vacía |
| `-n` | Cadena no vacía |

Ejemplos:
```bash
[[ -z $var ]]
[[ -n $usuario ]]
```

---

#### 7. Comparador de patrones (globbing)

Ejemplos:
```bash
[[ $fichero == *.jpg ]]
[[ $nombre == A?? ]]
[[ $letra == [A-Z] ]]
```

---

---

## 4.3 [ ] — Test

### Contexto `[ ]` en Bash — Explicación completa para ASIR

El contexto `[ ]` corresponde al *comando POSIX `test`*, ampliamente compatible con todos los shells.  
Es más estricto y limitado que `[[ ]]`, pero sigue siendo fundamental para scripting profesional.

---

#### 1. Restricciones importantes de `[ ]`

##### ✔️ Espacios obligatorios
```bash
[ "$x" -eq 5 ]   # correcto
```

##### ✔️ `<` y `>` deben incluir código de escape \\
```bash
[ "$a" \< "$b" ]
```

##### ✔️ No acepta expresiones regulares (`=~`)
Solo disponibles en `[[ ]]`.

##### ✔️ Globbing NO está protegido
```bash
[ *.txt = "*.txt" ]   # incorrecto
```

---

#### 2. Comparaciones numéricas

| Operador | Significado | Ejemplo |
|----------|-------------|---------|
| `-eq` | Igual a | `[ "$a" -eq 5 ]` |
| `-ne` | Distinto de | `[ "$a" -ne 5 ]` |
| `-gt` | Mayor que | `[ "$a" -gt 5 ]` |
| `-lt` | Menor que | `[ "$a" -lt 5 ]` |
| `-ge` | Mayor o igual | `[ "$a" -ge 5 ]` |
| `-le` | Menor o igual | `[ "$a" -le 5 ]` |

---

#### 3. Comparaciones de cadenas

| Operador | Significado | Ejemplo |
|----------|-------------|---------|
| `=` | Igual a | `[ "$a" = "hola" ]` |
| `!=` | Distinto | `[ "$a" != "hola" ]` |
| `\<` | Menor lexicográfico | `[ "$a" \< "$b" ]` |
| `\>` | Mayor lexicográfico | `[ "$a" \> "$b" ]` |

---

#### 4. Pruebas sobre archivos

| Operador | Significado |
|----------|-------------|
| `-f` | Archivo regular |
| `-d` | Directorio |
| `-e` | Existe |
| `-r` | Lectura |
| `-w` | Escritura |
| `-x` | Ejecución |
| `-s` | Tamaño > 0 |
| `-h` | Enlace simbólico |

Ejemplo:
```bash
[ -d /etc ]
```

---

#### 5. Pruebas sobre variables

| Operador | Significado |
|----------|-------------|
| `-z` | Cadena vacía |
| `-n` | Cadena no vacía |

Ejemplos:
```bash
[ -z "$var" ]
[ -n "$usuario" ]
```

---

#### 6. Operadores lógicos

| Operador | Significado |
|----------|-------------|
| `-a` | AND |
| `-o` | OR |
| `!` | NOT |

Ejemplos:
```bash
[ "$a" -gt 0 -a "$b" -gt 0 ]
[ "$user" != "root" -o "$UID" -eq 0 ]
[ ! -f archivo.txt ]
```

##### Recomendación:
Preferir:
```bash
[ cond1 ] && [ cond2 ]
```
o usar `[[ ]]`.

---

#### 7. Comparación de patrones (globbing)

⚠️ Poco fiable en `[ ]` debido a la expansión:

```bash
[ $file = *.txt ]   # *.txt se expande → incorrecto
```

Usar mejor:
```bash
[[ $file == *.txt ]]
```

---

#### 8. Ejemplos prácticos para ASIR

##### Validación de entrada:
```bash
[ "$1" = "start" ] && echo "Iniciando..."
```

##### Comprobación de directorio:
```bash
[ -d /var/log ] && [ -w /var/log ] && echo "OK"
```

##### Validación de puerto:
```bash
[ "$port" -ge 1 ] && [ "$port" -le 65535 ] && echo "Puerto válido"
```

---

# 5. Paso de argumentos
## PHP
```php
$arg1 = $argv[1];
```

## Bash
```bash
arg1="$1"
```

---

# 6. Variables y constantes
## PHP
```php
$var = "hola";
const PI = 3.14;
define("EULER", 2.718);
```

## Bash
```bash
var="hola"
readonly PI=3.14
```

---

# 7. Tipado
PHP soporta múltiples tipos.  
Bash trata todo como cadenas salvo en `(( ))`.

---

# 8. Operaciones sobre enteros, caracteres y cadenas
## PHP
```php
$a + $b;
$a * $b;
ord('A'); chr(65);
"Hola" . " mundo";
substr("Hola",1,2);
```

## Bash
```bash
(( a = 5 + 3 ))
len=${#cadena}
sub=${cadena:1:2}
```

---

# 9. Condicionales
## PHP
```php
if ($a > 0) {}
```
## Bash
```bash
if [[ $a -gt 0 ]]; then fi
```

---

# 10. Bucles
## PHP
```php
for ($i=0;$i<10;$i++){}
foreach ($arr as $v){}
```

## Bash
```bash
for i in {1..10}; do done
while [[ cond ]]; do done
```

---

# 11. Incrementos y operador ternario
## PHP
```php
$i++;
$result = $a>0 ? "pos" : "neg";
```

## Bash
```bash
(( i++ ))
(( r = a>0 ? 1 : 0 ))
```

---

# 12. Funciones
## PHP
```php
function suma($a,$b){ return $a+$b; }
```
## Bash
```bash
suma(){ echo $(( $1 + $2 )); }
```

---

# 13. Funciones de cadena en PHP
Incluye: `strlen`, `strpos`, `substr`, `explode`, `implode`,  
`str_replace`, `preg_replace`, `strcmp`, `trim`,  
`strtoupper`, `htmlspecialchars`, `base64_encode`, etc.

---

# 14. Arrays completos en PHP y Bash
## PHP
```php
$arr = [1,2,3];
$asoc = ["a"=>1,"b"=>2];
array_push($arr,4);
array_shift($arr);
```

## Bash
```bash
arr=(1 2 3)
declare -A dict
dict[key]="value"
arr+=("nuevo")   # push
unset 'arr[-1]'  # pop
```

---