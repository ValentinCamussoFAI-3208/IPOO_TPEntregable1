<?php

class Viaje {
    // Atributos
    private $codigo;
    private $destino;
    private $maxPasajeros;
    private $pasajeros = array();

    // Método constructor, no esta $pasajeros porque puede haber un viaje que todavia no tenga pasajeros.
    public function __construct($codigoViaje, $destinoViaje,$maxPasajerosViaje) {
        $this->codigo = $codigoViaje;
        $this->destino = $destinoViaje;
        $this->maxPasajeros = $maxPasajerosViaje;
    }

    // Métodos set
    public function setCodigo($codigoViaje) {
        $this->codigo = $codigoViaje;
    }
    public function setDestino($destinoViaje) {
        $this->destino = $destinoViaje;
    }
    public function setMaxPasajeros($maxPasajerosViaje) {
        $this->maxPasajeros = $maxPasajerosViaje;
    }
    public function setPasajeros($pasajerosViaje) {
        $this->pasajeros = $pasajerosViaje;
    }
    // Métodos get
    public function getCodigo() {
        return $this->codigo;
    }
    public function getDestino() {
        return $this->destino;
    }
    public function getMaxPasajeros() {
        return $this->maxPasajeros;
    }
    public function getPasajeros() {
        return $this->pasajeros;
    }

    /** Esta función agrega a un pasajero dado al array de pasajeros.
     * @param STRING $nombre
     * @param STRING $apellido
     * @param INT $documento
     * @return BOOLEAN
     */
    public function agregarPasajero($nombre, $apellido, $documento) {
        $pasajerosAux = $this->getPasajeros();
        $encontro = false;
        $i = 0;
        // while que verifica si el pasajero ya esta en el arreglo de pasajeros
        while ($i < count($pasajerosAux) && !$encontro) {
            if ($pasajerosAux[$i]['numero de documento'] == $documento) {
                $encontro = true;
            }
            $i++;
        }
        // Si no encontro al pasajero, agrega los datos del nuevo pasajero
        if ($encontro == false) {
            $arrayAux = array("nombre" => $nombre, "apellido" => $apellido, "numero de documento" => $documento);
            array_push($this->pasajeros, $arrayAux); // Agrega al final los datos del nuevo pasajero
        }
        // Se retorna $encontro para hacerle saber al usuario si el pasajero ya esta en el arreglo
        return $encontro;
    }

    /** Esta función elimina a un pasajero dado del array de pasajeros.
     * @param INT $documento
     * @return BOOLEAN
     */
    public function eliminarPasajero($documento) {
        $pasajerosAux = $this->getPasajeros();
        $encontro = false;
        $i = 0;
        // 'While' que busca al pasajero mediante el número de documento
        while ($i < count($pasajerosAux) && !$encontro) {
            if ($pasajerosAux[$i]['numero de documento'] == $documento) {
                // Elimina los datos guardados del pasajero
                unset($pasajerosAux[$i]);
                // Acomoda los indices del arreglo
                $pasajerosAux = array_values($pasajerosAux);
                // Modifica el arreglo de pasajeros con el nuevo arreglo sin el pasajero eliminado
                $this->setPasajeros($pasajerosAux);
                // Se le asigna true a $encontro asi no para el while
                $encontro = true;
            }
            $i++;
        }
        // Se retorna $encontro asi en el programa principal se da a entender al usuario si pudo o no hacerse la eliminación
        return $encontro;
    }

    /** Esta función modifica los datos de un pasajero dado.
     * @param STRING $nombre
     * @param STRING $apellido
     * @param INT $documento
     * @return BOOLEAN
     */
    public function modificarPasajero($nombre, $apellido, $documento) {
        $pasajerosAux = $this->getPasajeros();
        $encontro = false;
        $i = 0;
        while ($i < count($pasajerosAux) && !$encontro) {
            if ($pasajerosAux[$i]['numero de documento'] == $documento) {
                // Modifica el nombre y apellido del pasajero
                $pasajerosAux[$i]['nombre'] = $nombre;
                $pasajerosAux[$i]['apellido'] = $apellido;
                // Modifica el arreglo de pasajeros con los nuevos datos del pasajero
                $this->setPasajeros($pasajerosAux);
                // Se le asigna true a $encontro asi se detiene el while
                $encontro = true;
            }
            $i++;
        }
        // Se retorna $encontro asi en el programa principal se da a entender al usuario si pudo o no hacerse la modificación
        return $encontro;
    }
}
?>