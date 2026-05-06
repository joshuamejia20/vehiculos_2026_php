<?php

// echo, print
/*echo "<h1>Hola mundo</h1>";
print `Bienvenido a <b style=\"color: red;\">PHP</b>`;
$dato = "Josue";
define("_NOMBRE_", "Josue");

$Dato = "Hola mundo";
$DAto = "Bienvenido a PHP";

print "El valor de \$dato es: $dato <br> y el valor de la constante _NOMBRE_ es: " . _NOMBRE_ . "<br>";*/

/*
    VARIABLES:
    -  Inician con $.
    -  No pueden iniciar con números.

    Tipos de datos:
    - Booleanos: true, false.
    - Enteros: 1, 2, 3.
    - Flotantes: 1.5, 3.14.
    - Cadenas de texto: "Hola", 'Mundo'.
*/

/* IF Y SWITCH */
/*$edad = 18;

if ($edad >= 18) {
    echo "Eres mayor de edad.";
} else {
    echo "Eres menor de edad.";
}

//evaluar multiples estados -> Determinar el nivel de stock de un producto
$stock = 15;

$mensaje =($stock <= 0) ? "Agotado": (($stock <=10) ? "Stock bajo": "Stock suficiente");

echo "<br><b>Estado del inventario: </b>" . $mensaje;
echo "<br>";

$dia = 3;

switch ($dia) {
    case 1:
        echo "Lunes";
        break;
    case 2:
        echo "Martes";
        break;
    case 3:
        echo "Miércoles";
        break;
    
    default:
        echo "Día no válido";
        break;
}

//validacion de rol
$rol = "editor";
echo "<br>";

switch (strtoupper($rol)) {
    case 'ADMIN':
    case 'SUPERVISOR':
        echo "Acceso total al panel";
        break;
    case "EDITOR":
        echo "Acceso limitado a la edición";
        break;
    default:
        echo "Acceso denegado";
        break;
}

//switch con logica de rangos
$salario =2500;
echo "<br>";
switch (true) {
    case ($salario < 1000):
        echo "Nivel inicial";
        break;
    case ($salario >= 1000 && $salario <= 3000):
        echo "Nivel Operativo";
        break;
    case ($salario > 3000):
        echo "Nivel Gerencial";
        break;
    
    default:
        echo "Nivel no definido";
        break;
}*/

/*
Escenario: Una universidad necesita automatizar la asignacion de becas y el estado de inscripcion de sus alumnos basandose en cuatro variables nota promedio, estrato socioeconomico(1 = clase baja, 2 = clase media y 3 = clase alta) y materias reprobadas, cuota

1. Determinar el "estado de matricula" en una sola linea de codigo
    - Si materias reprobadas es cero -> Inscripcion limpia
    - Si materias reprobadas es entre 1 y 2 -> Inscripcion condicionada
    - Si materias reprobadas es mayor a dos -> Inscripcion bloqueada.
2. Asignar el porcentaje de beca:
    - Beca de excelencia (50%) si el promedio es mayor o igual a 9.5 y materias reprobadas son cero.
    - Beca de apoyo (30%) si promedio es mayor o igual a 8.5 y estrato social <= 2
    - Descuento de estimulo (10%) si el promedio es entre 7.5 y 8.4
    - Sin beca (0%): cualquier otro caso
3. Deberá calcular el pago final de la cuota:
    - Si  materias reprobadas = 0, estrato < 3 y tiene una inscripcion limpia "calculo tal cual"
    - Si  materias reprobadas < 3, estrato < 3 y tiene inscripcion condicionada -> "Dirijase al decanato para validar el pago . pago
    - Si materias reprobas > 3, estrato < 3  y la  inscripcion es bloqueada -> Ha perdido su beca
    - Si  el estrato > 2 -> No  tiene acceso a becas. pero que validar la calidad de estudiantes
        0 => Excelente estudiante
        < 3 => Estudiante  promedio
        > 3 => Seguro quieres  estudiar?
*/

//ARREGLOS
/*$arr1 = array('Hola', 25, false, "Nathaly", "Presentación", "Natan", "Josue");
$arr2 = [
    "name"=>'Josue',
    "carrera"=>'Ingeniería',
    'Materia'=>'Desarrollo web'
];

echo $arr1[0];
echo $arr2["name"];

$notas = array(
    array(10,9,8),
    array(5,8,9),
    array(8,8,8)
);

/*
        count($arr) =>devuelve el numero de elementos
        array_push($arr, valor) => agregar un elemento al final
        array_pop($arr) => eliminar el ultimo elemento
        array_keys($arr)=>devolver todas las claves (nombre de la posicion) del arreglo
        in_array($valor, $arr) => busca si un valor existe en un arreglo
        array_merge($arr1, $arr2) combina dos arreglos
*/

/*for ($i=0; $i < count($arr1); $i++) { 
    echo "<br>". $arr1[$i];
}

/*for ($i=0; $i < count($arr2); $i++) { 
    echo "<br>". $arr2[$i];
}*/

/*foreach ($arr2 as $key => $value) {
    echo "<br>Llave: $key = valor: $value";
}

//usando for impresion 1 al 5
for ($i=1; $i <= 5; $i++) { 
    echo "<br>Iteración número $i";
}

//imprimir los impares del 1 al 10
for ($i=1; $i <=10 ; $i += 2) { 
    echo "<br> Número: $i";
}
echo "<br>";
for ($i=10; $i >=1 ; $i--) { 
    for ($j=1; $j <= $i ; $j++) { 
        echo "*";
    }
    echo "<br>";
}

$cadena = "Desarrollo";
/*foreach ($cadena as $caracter) {
    echo "<pre>".$caracter."</pre>";
}*/

//WHILE
/*$i=1;
while ($i <= 5) {
    echo "<pre>Número: $i";
    $i++;
}

$numero = 15;
$divisor = 2;
while ($numero % $divisor != 0) {
    $divisor++;
}

echo "<br>El primer divisor de 10 es $divisor";

$numero = 12345;
$suma = 0;
while ($numero > 0) {
    $digito = $numero % 10;
    $suma += $digito;
    $numero = (int)($numero/10);
}

echo "<br>La suma de los digitos es $suma";

//DO WHILE
$i =1;
do{
    echo "<br> Número: $i";
    $i++;
}while($i <= 5);

$secreto = 7;
$intentos = 0;
do{
    $numero_aleatorio = rand(1, 10);
    $intentos++;
    echo "<br>Intento número $intentos, número generado: $numero_aleatorio";
}while($numero_aleatorio != $secreto);

echo "<br>¡Adivinaste en $intentos intentos!";*/

//MANEJO DE OBJETOS JS-ON
/* 
    Usuarios --> SELECT * FROM USUARIOS 
    respuesta = [
        [0]=[
            'id'=>1
            'name'=>'Ricardo'
            'lastName'=>'Presentación'
        ],
        [1]=[
            'id'=>2
            'name'=>'Esdras'
            'lastName'=>'Palacios'
        ],
    ];
*/

$usuario = [
    'id'=>101,
    'nombre'=>'Josue Menjivar',
    'departamento'=>'Diaconado',
    'activo'=> true,
    'roles'=>['Pastor','Diácono']
];

//JSON ENCODE

$jsonArray = json_encode($usuario, JSON_PRETTY_PRINT | JSON_UNESCAPED_UNICODE);

print_r($usuario);
echo "<br>";
print_r($jsonArray);

echo "<pre>".gettype($usuario). "</pre>";
echo "<pre>".gettype($jsonArray). "</pre>";

echo "<pre>";
//JSON DECODE
$datos_json = '{"Proyecto": "SISTEMS", "Servidor": "10.2.0.54", "Estado":"Producción"}';

$objeto = json_decode($datos_json);
print_r($objeto);

$arreglo = json_decode($datos_json, true);
print($arreglo['Proyecto']);

//ESCRITURA EN ARCHIVOS JSON
//file_put_contents
$configuraciones = [
    "fecha_salida"=>"2026-03-20",
    "Servidores"=>[
        ["ip"=>"10.2.0.53", "Tipo"=>"Producción"],
        ["ip"=>"10.2.0.54", "Tipo"=>"Pruebas"],
    ]
];

//nombrar archivo
$fecha = date('d_m_Y_H_i_s');
$archivo = "config_sistema-".$fecha.".json";
$json_data = json_encode($configuraciones, JSON_PRETTY_PRINT);

//intentar escribir el archivo
if(file_put_contents($archivo, $json_data)){
    echo "Archivo json generado con éxito";
}else{
    echo "Error al generar el archivo json";
}

$json_invalido = 54545;
$resultado = json_decode($json_invalido);


if(json_last_error() !== JSON_ERROR_NONE){
    echo "Error en el json: ". json_last_error_msg();
}

echo "</pre>";

// SRC --> Media -->[ tmp ]

/*
    Imagine que el sistema de la FGR envía datos al SIGEVI en el siguiente formato JSON:
    '{"expediente": "2026-001", "delito": "Violencia Patrimonial", "detalles": {"requiere_medidas": true, "prioridad": "Alta"}}'
    1.Reciba esa cadena en una variable de PHP.
    2. Decodifíquela como un Arreglo Asociativo.
    3.Imprima un mensaje que diga: "El expediente [numero] tiene prioridad [prioridad]".
Validación: Use una estructura if para mostrar un aviso especial solo si requiere_medidas es true.

*/