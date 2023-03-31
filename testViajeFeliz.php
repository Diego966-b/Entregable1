<?php
// PROGRAMA PRINCIPAL
// Declaración de variables
// int $opcion, $codViaje, $maxPasajerosViaje , $documentoPasajero, $pasajerosCargados, $pasajerosACargar 
// string $destinoViaje, $nombrePasajero, $apellidoPasajero, $listaPasajeros
// array $arrayPasajeros

include "viajeFeliz.php";
$pasajerosCargados = 0;
do {
    echo "\n --- Menú --- \n";
    echo "<1> Ingresar informacion acerca del viaje \n";
    echo "<2> Ingresar los pasajeros \n";
    echo "<3> Mostrar informacion del viaje y los pasajeros \n"; 
    echo "<4> Modificar datos del viaje \n";
    echo "<5> Modificar datos de un pasajero \n";
    echo "<6> Salir \n";
    echo "<-> Ingrese opcion: ";
    $opcion = trim(fgets(STDIN));
    switch ($opcion)
    {
        case 1:
            echo "Ingrese el destino del viaje: ";
            $destinoViaje = trim(fgets(STDIN));
            echo "Ingrese el código del viaje: ";
            $codViaje = trim(fgets(STDIN));
            echo "Ingrese la cantidad de pasajeros maxima: ";
            $maxPasajerosViaje = trim(fgets(STDIN)); 
            $viaje = new ViajeFeliz ($codViaje, $destinoViaje, $maxPasajerosViaje);
            echo "Viaje creado \n";
        break;
        case 2:
            // Uso getCantPasajeros para que luego de cambiar la cantidad máxima de pasajeros se puedan agregar los que faltan
            $maxPasajerosViaje = $viaje -> getCantMaxPasajeros (); 
            if ($maxPasajerosViaje == $pasajerosCargados)
            {
                echo "Ya se alcanzó la capacidad máxima de este viaje \n";
            }
            else
            {
                echo "Ingrese ".$maxPasajerosViaje." pasajeros: \n";
                for ($j = 0; $j < $maxPasajerosViaje; $j++)
                {
                    echo "Ingresar pasajero n °".($j+1)."\n";
                    echo "Ingrese el nombre del pasajero: ";
                    $nombrePasajero = trim(fgets(STDIN));
                    echo "Ingese el apellido del pasajero: ";
                    $apellidoPasajero = trim(fgets(STDIN));
                    echo "Ingrese el DNI del pasajero: ";
                    $documentoPasajero = trim(fgets(STDIN));
                    $viaje -> agregarPasajero ($nombrePasajero, $apellidoPasajero, $documentoPasajero);
                    echo "Pasajero cargado \n";
                }
            }
        break;
        case 3:
            echo "\nInformación del viaje: \n";
            echo $viaje."\n";
        break;
        case 4:
            // Uso la variable $nuevaCantMaxPasajeros para que no sobreescriba la variable $maxPasajerosViaje en caso de no entrar al IF
            echo "Modificar datos del viaje\n";
            echo "Ingrese la nueva cantidad de pasajeros máxima ";
            $nuevaCantMaxPasajeros = trim(fgets(STDIN)); 
            $arrayPasajeros = $viaje -> getArrayPasajeros();
            if ($nuevaCantMaxPasajeros < count($arrayPasajeros))
            {
                echo "Error, ya hay ".count($arrayPasajeros)." pasajeros cargados no es posible cambiar el numero máximo de pasajeros a uno menor de los ya cargados \n";
            }
            else 
            {
                /* Si la nueva cantidad maxima es igual a la anterior entraré en este else, 
                   no lo cambio ya que quiza quieren cambiar solo el destino o solo el codigo de viaje y mantener la cantidad de pasajeros actuales */
                echo "Ingrese el nuevo destino ";
                $destinoViaje = trim(fgets(STDIN));
                $viaje -> setDestinoViaje ($destinoViaje);
                echo "Ingrese el nuevo código de viaje ";
                $codViaje = trim(fgets(STDIN));
                $viaje -> setCodigoViaje ($codViaje);
                $viaje -> setCantMaxPasajeros ($nuevaCantMaxPasajeros);
                echo "Datos del viaje cambiados\n";
            }
        break;
        case 5:
            echo "Lista de pasajeros: \n";
            $listaPasajeros = $viaje -> mostrarPasajeros ();
            echo $listaPasajeros;
            echo "Ingrese el numero de pasajero a modificar ";
            $nroPasajero = trim(fgets(STDIN));
            if (($nroPasajero <= 0) || ($nroPasajero > $maxPasajerosViaje))
            {
                echo "Error, numero de pasajero incorrecto ";
            }
            else
            {
                echo "Escriba el nuevo nombre del pasajero ";
                $nombrePasajero = trim(fgets(STDIN));
                echo "Escriba el nuevo apellido del pasajero ";
                $apellidoPasajero = trim(fgets(STDIN));
                echo "Escriba el nuevo DNI del pasajero ";
                $documentoPasajero = trim(fgets(STDIN));
                $arrayPasajeros = $viaje -> getArrayPasajeros ();
                $pasajero = $arrayPasajeros [($nroPasajero-1)];
                $pasajero = ["Nombre" => $nombrePasajero, "Apellido" => $apellidoPasajero, "Dni" => $documentoPasajero];
                $arrayPasajeros [($nroPasajero-1)] = $pasajero;
                $viaje -> setArrayPasajeros ($arrayPasajeros);
            }
        break;
    }
} while ($opcion <> 6);