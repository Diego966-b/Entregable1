<?php
/*
GitHub.

La empresa de Transporte de Pasajeros “Viaje Feliz” quiere registrar la información referente a sus viajes.

De cada viaje se precisa almacenar el código del mismo, destino, cantidad máxima de pasajeros y los pasajeros del viaje.

Realice la implementación de la clase Viaje e implemente los métodos necesarios para modificar los atributos de dicha clase (incluso los datos de los pasajeros). 

Utilice un array que almacene la información correspondiente a los pasajeros. Cada pasajero es un array asociativo con las claves “nombre”, “apellido” y “numero de documento”.

Implementar un script testViaje.php que cree una instancia de la clase Viaje y presente un menú que permita cargar la información del viaje, modificar y ver sus datos.
*/
class ViajeFeliz
{   
    // PASAJEROS DEL VIAJE ES LA CANT TOTAL DE PASAJEROS O ES EL ARRAY ASOCIATIVO 
    // Atributos
    private $codigoViaje, $destinoViaje, $cantMaxPasajeros, $pasajero, $arrayPasajeros, $nombre, $apellido, $dni;

    public function __construct ($codigoViaje, $destinoViaje, $cantMaxPasajeros, $pasajero)
    {
        $this -> pasajero = $pasajero;
        $this -> arrayPasajeros = array ();
        $this -> arrayPasajeros [] = $pasajero;
        $this -> codigoViaje = $codigoViaje;
        $this -> destinoViaje = $destinoViaje;
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }
    //  $this -> pasajerosViaje [] = ["Nombre" => $this -> nombre, "Apellido" => $this -> apellido, "Dni" => $this -> dni];
    //         $this -> contrasenaUtilizada = array (); ... $this -> contrasenaUtilizada[] = $this -> contrasena;
    /**
     * Agrega 1 pasajero
     */
    public function agregarPasajero ($nombre, $apellido, $dni)
    {
        // Variables Internas  
        // array $arrayPasajeros
        // int $cantPasajeros
        $arrayPasajeros = $this -> getArrayPasajeros();
        $this -> setPasajero ($nombre, $apellido, $dni);
        $cantPasajeros = count ($arrayPasajeros);
        $this -> arrayPasajeros [$cantPasajeros] = $this -> getPasajero();
        /* 
           ASI FUNCIONA TAMBIEN
        $arrayPasajeros = $this -> getArrayPasajeros ();
        $cantPasajeros = count ($arrayPasajeros);
        $this -> arrayPasajeros [$cantPasajeros] ["Nombre"] = $nombre;
        $this -> arrayPasajeros [$cantPasajeros] ["Apellido"] = $apellido;
        $this -> arrayPasajeros [$cantPasajeros] ["Dni"] = $dni;
        */
    }

    // metodos get

    public function getPasajero ()
    {
        return $this -> pasajero;
    }
    public function getArrayPasajeros ()
    {
        return $this -> arrayPasajeros;
    }
    public function getNombrePasajero ()
    {
        return $this -> pasajero ["Nombre"];
    }
    public function getApellidoPasajero ()
    {
        return $this -> pasajero ["Apellido"];
    }
    public function getDniPasajero ()
    {
        return $this -> pasajero ["Dni"];
    }
    public function getCodigoViaje ()
    {
        return $this -> codigoViaje;
    }
    public function getDestinoViaje ()
    {
        return $this -> destinoViaje;
    }
    public function getCantMaxPasajeros ()
    {
        return $this -> cantMaxPasajeros;
    }
    public function getNombre ()
    {
        return $this -> nombre;
    }
    public function getApellido ()
    {
        return $this -> apellido;
    }
    public function getDni ()
    {
        return $this -> dni;
    }

    // Métodos set

    public function setPasajero ($nombre, $apellido, $dni)
    {
        $this -> pasajero ["Nombre"] = $nombre;
        $this -> pasajero ["Apellido"] = $apellido;
        $this -> pasajero ["Dni"] = $dni;
    }
    public function setArrayPasajeros ($pasajero)
    {
        // Guardo el pasajero en la ultima key del array usando array_push getDestinoViaje
        array_push ($this -> arrayPasajeros, $pasajero);
    }
    public function setCodigoViaje ($cod)
    {
        $this -> codigoViaje = $cod;
    }
    public function setDestinoViaje ($des)
    {
        $this -> destinoViaje = $des;
    }
    public function setCantMaxPasajeros ($maxPasajeros)
    {
        $this -> cantMaxPasajeros = $maxPasajeros;
    }

    // Método __toString

    public function __toString ()
    {
        $frase = "destinoViaje: ".$this -> getDestinoViaje().",codigo viaje: ".$this -> getCodigoViaje().",cant max pasajeros: ".$this -> getCantMaxPasajeros().
        "pasajeros: ".print_r($this -> getArrayPasajeros());
        return ($frase);
    }
}