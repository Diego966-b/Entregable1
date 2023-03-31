<?php
class ViajeFeliz
{   
    // Atributos
    private $codigoViaje, $destinoViaje, $cantMaxPasajeros, $arrayPasajeros;

    public function __construct ($codigoViaje, $destinoViaje, $cantMaxPasajeros)
    {
        $this -> arrayPasajeros = array ();
        $this -> codigoViaje = $codigoViaje;
        $this -> destinoViaje = $destinoViaje;
        $this -> cantMaxPasajeros = $cantMaxPasajeros;
    }
    
    // Métodos

    /**
     * Agrega 1 pasajero al array
     * @param string $nombre, $apellido
     * @param int $dni
     */
    public function agregarPasajero ($nombre, $apellido, $dni)
    {
        // Variables Internas  
        // array $arrayPasajeros, $pasajero
        $pasajero = ["Nombre" => $nombre, "Apellido" => $apellido, "Dni" => $dni];
        array_push ($this -> arrayPasajeros, $pasajero);
    }

    // Métodos get

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
    public function getArrayPasajeros ()
    {
        return $this -> arrayPasajeros;
    }


    // Métodos set

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
    public function setArrayPasajeros ($array)
    {
        $this -> arrayPasajeros = $array;
    }

    // Métodos __toString y mostrarPasajeros

    /**
     * @return string
     */
    public function __toString ()
    {
        // Variables Internas
        // string $frase
        $frase = "El destino es: ".$this -> getDestinoViaje().". Codigo del viaje: ".$this -> getCodigoViaje().". Cantidad maxima de pasajeros: ".$this -> getCantMaxPasajeros().
        ". Cantidad de pasajeros cargados: ".count ($this -> getArrayPasajeros())."\nDatos de los pasajeros:\n".$this -> mostrarPasajeros ();
        return ($frase);
    }

    /**
     * Recorre el array de pasajeros y guarda en una frase cada una de sus datos para luego retornarlo
     * @return string
     */
    public function mostrarPasajeros () 
    {
        // Variables Internas
        // string $frase
        // array $arrayPasajeros
        // int $j
        $frase = "";
        $arrayPasajeros = $this -> getArrayPasajeros ();
        for ($j = 0; $j < count ($arrayPasajeros); $j++)
        {
            $frase = $frase."Pasajero n °".($j+1).": Nombre: ".$arrayPasajeros [$j] ["Nombre"].". Apellido: ".$arrayPasajeros [$j] ["Apellido"].". DNI: ".$arrayPasajeros [$j] ["Dni"]."\n";
        }
        return ($frase);
    }
}