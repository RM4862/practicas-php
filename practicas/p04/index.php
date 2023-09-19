<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd"> <!--Especificamos la versión de xhtml 1.1-->
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es"> <!--Especificamos namespace y el idioma-->
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Práctica 4</title>
</head>
<body>
    <h2>Ejercicio 1</h2>
    <p>Escribir programa para comprobar si un número es un múltiplo de 5 y 7</p>
    <?php
        if(isset($_GET['numero']))
        {
            $num = $_GET['numero'];
            if ($num%5==0 && $num%7==0)
            {
                echo '<h3>R= El número '.$num.' SÍ es múltiplo de 5 y 7.</h3>';
            }
            else
            {
                echo '<h3>R= El número '.$num.' NO es múltiplo de 5 y 7.</h3>';
            }
        }
    ?>

    <h2>Ejercicio 2:Crea un programa para la generación repetitiva de 3 números aleatorios hasta obtener una
        secuencia compuesta por: impar,par,impar.</h2>
        <?php
            ///Definimos funciones a usar:
            function generar_numeros() //Funcion que genera los numeros aleatorios
            {
                return rand(1, 1000); //Función random, tiene como parametros de entrada: el numero de inicio y el de final
            }
            function secuencia_cumplida($secuencia) 
            {
                return $secuencia[0] % 2 != 0 && $secuencia[1] % 2 == 0 && $secuencia[2] % 2 != 0;
            }    // Verificamos si en cada posición del arreglo se cumple con la secuencia impar, par, impar
        
        ///Codigo para generar la matriz:
            $matriz = [];
            $iteraciones = 0;//contador de iteraciones
            $numeros_obtenidos = 0; //contador de numeros generados hasta obtener las 4 secuencias que cumplan con la condicion impar,par,impar
            while (true) 
            { 
                $numeros_obtenidos++; 
                $secuencia = [generar_numeros(), generar_numeros(), generar_numeros()]; /// insertamos en el arreglo "$secuencia" los numeros generados
                if (secuencia_cumplida($secuencia)) ///evaluamos la secuencia en la funcion secuencia_cumplida
                {
                    $matriz[] = $secuencia; //si la secuencia se cumple se agrega a la matriz
                    $iteraciones++;
                    if ($iteraciones == 4) // salimos del ciclo si hay 4 iteraciones que cumplan con la secuencia
                        { 
                            break;
                        }
                }
            }
            // Impresion de matriz 
            echo "<table border='1'>";
            foreach ($matriz as $fila) 
            {
                echo "<tr>";
                foreach ($fila as $valor) 
                {
                    echo "<td>$valor</td>";
                }
                echo "</tr>";
            }
            echo "</table>";
            echo "$numeros_obtenidos números generados en $iteraciones iteraciones";
        ?>

        <h2>Ejercicio 3:  Utiliza un ciclo while para encontrar el primer número entero obtenido aleatoriamente,
            pero que además sea múltiplo de un número dado.</h2>
            <?php
                if (isset($_GET['numero'])) { /*verificamos si hay un numero dentro de la peticion al servidor dado en la URL.
                     importante definirlo en la URL como index.php?numero=78 y no index.php?num=78 por ejemplo sino se cambia el nombre de la variable ['numero']*/ 
                    $num_ingresado = (int)$_GET['numero'];///convertimos el numero de la URL en una variable entera
                } else {
                    echo "Error valor no encontrado,ingreselo";
                    exit;
                }

                $num_rand = rand(1, 1000); // Inicializamos esta variable que sera verificado en el where

                while ($num_rand % $num_ingresado !== 0) {
                    $num_rand = rand(1, 1000); // si el primer numero resulta no ser multiplo se genera otro
                }

                echo "$num_rand es el primer multiplo de: $num_ingresado";
            ?>




</body>
</html>