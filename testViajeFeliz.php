<?php
include "viajeFeliz.php";
// PROGRAMA PRINCIPAL
// Declaración de variables
// int $opcion, $codViaje, $maxPasajerosViaje , $documentoPasajero
// string $destinoViaje, $nombrePasajero, $apellidoPasajero
// array $arrayPasajero
/*
GitHub.
La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.
De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.
Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). 
Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.
Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos. 
*/
do {
    $arrayPasajero = array ();
    echo "\n --- Menú --- \n";
    echo "<1> Ingresar informacion acerca del viaje y 1 pasajero \n";
    echo "<2> Ingresar un pasajero adicional \n";
    echo "<3> Mostrar informacion del viaje y los pasajeros \n"; //Implementar un script testViaje.php que cree una instancia de la 
                                                                // clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
    echo "<4> Modificar datos del viaje \n";
    echo "<5> Salir \n";
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
            echo "Ingrese por lo menos 1 pasajero\n";
            echo "Ingrese el nombre del pasajero: ";
            $nombrePasajero = trim(fgets(STDIN));
            echo "Ingese el apellido del pasajero: ";
            $apellidoPasajero = trim(fgets(STDIN));
            echo "Ingrese el DNI del pasajero: ";
            $documentoPasajero = trim(fgets(STDIN));
            $arrayPasajero = ["Nombre" => $nombrePasajero, "Apellido" => $apellidoPasajero, "Dni" => $documentoPasajero];
            $viaje = new ViajeFeliz ($codViaje, $destinoViaje, $maxPasajerosViaje, $arrayPasajero);
        break;
        case 2:
            echo "Ingresar pasajero adicional\n";
            echo "Ingrese el nombre del pasajero: ";
            $nombrePasajero = trim(fgets(STDIN));
            echo "Ingese el apellido del pasajero: ";
            $apellidoPasajero = trim(fgets(STDIN));
            echo "Ingrese el DNI del pasajero: ";
            $documentoPasajero = trim(fgets(STDIN));
            $viaje -> agregarPasajero ($nombrePasajero, $apellidoPasajero, $documentoPasajero);
        break;
        case 3:
            echo $viaje;
        break;
        case 4:
            echo "Modificar datos del viaje\n";
            echo "Ingrese el nuevo destino ";
            $destinoViaje = trim(fgets(STDIN));
            $viaje -> setDestinoViaje($destinoViaje);
            echo "Ingrese el nuevo código de viaje ";
            $codViaje = trim(fgets(STDIN));
            $viaje -> setCodigoViaje($codViaje);
            echo "Ingrese la nueva cantidad de pasajeros máxima ";
            $maxPasajerosViaje = trim(fgets(STDIN));
            $viaje -> setCantMaxPasajeros ($maxPasajerosViaje);
            echo "Datos del viaje cambiados\n";
        break;
    }
} while ($opcion <> 5);