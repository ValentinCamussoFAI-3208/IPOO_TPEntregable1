<?php
    // Se incluye el archivo 'Viaje.php' el cual contiene la clase Viaje
    include 'Viaje.php';
    // Se crea el objeto
    $viaje = new Viaje("", "", 0);
    // Se asigna true a $sigue asi el while se ejecuta 
    $sigue = true;
    // Mientras la variable $sigue sea verdadera se ejecuta el while
    while ($sigue) {
        // Se muestra el menú de opciones
        echo "Menú de opciones:\n";
        echo "1- Cargar información del viaje\n";
        echo "2- Modificar información del viaje\n";
        echo "3- Agregar pasajero\n";
        echo "4- Eliminar pasajero\n";
        echo "5- Modificar datos de un pasajero\n";
        echo "6- Ver datos del viaje\n";
        echo "Otro número- Salir\n";
        echo "Indique el número de la opción que desea realizar: ";
        // Se lee la opción que desea realizar el usuario
        $opcion = trim(fgets(STDIN));
        // Dependiendo de la opción que eliga el usuario se 
        switch ($opcion) {
            case 1:
                // Se piden los datos al usuario
                echo "Ingrese el código del viaje: ";
                $codigo = trim(fgets(STDIN));
                echo "Ingrese el destino del viaje: ";
                $destino = trim(fgets(STDIN));
                echo "Ingrese la cantidad máxima de pasajeros del viaje: ";
                $maxPasajeros = trim(fgets(STDIN));
                // Se cargan los datos del viaje
                $viaje = new Viaje($codigo, $destino, $maxPasajeros);
                echo "Viaje cargado correctamente.\n";
                break;
            case 2:
                // Se piden los datos al usuario
                echo "Ingrese el nuevo código del viaje: ";
                $codigo = trim(fgets(STDIN));
                echo "Ingrese nuevo el destino del viaje: ";
                $destino = trim(fgets(STDIN));
                echo "Ingrese la nueva cantidad máxima de pasajeros del viaje: ";
                $maxPasajeros = trim(fgets(STDIN));
                // Se modifican los datos del viaje
                $viaje->setCodigo($codigo);
                $viaje->setDestino($destino);
                $viaje->setMaxPasajeros($maxPasajeros);
                echo "Viaje modificado correctamente.\n";
                break;
            case 3:
                // Se piden los datos al usuario
                echo "Ingrese el nombre del pasajero: ";
                $nombreP = trim(fgets(STDIN));
                echo "Ingrese el apellido del pasajero: ";
                $apellidoP = trim(fgets(STDIN));
                echo "Ingrese el número de documento del pasajero: ";
                $documentoP = trim(fgets(STDIN));
                // Agrega al pasajero en caso de que el pasajero todavia no exista
                if ($viaje->agregarPasajero($nombreP, $apellidoP, $documentoP)) {
                    echo "Ya existe un pasajero con el documento N°" . $documentoP . "\n";
                } else {
                    echo "Pasajero añadido correctamente.\n";
                }
                break;
            case 4:
                // Se pide el número de documento al usuario
                echo "Ingrese el número de documento del pasajero: ";
                $documentoP = trim(fgets(STDIN));
                // Elimina el pasajero en caso de encontrarlo
                if ($viaje->eliminarPasajero($documentoP) == false) {
                    echo "No hay ningún pasajero con el documento N°" . $documentoP . "\n";
                } else {
                    echo "Pasajero eliminado correctamente.\n";
                }
                break;
            case 5:
                // Se piden los datos al usuario
                echo "Ingrese el número de documento del pasajero que desea cambiar: ";
                $documentoP = trim(fgets(STDIN));
                echo "Ingrese el nuevo nombre del pasajero: ";
                $nombreP = trim(fgets(STDIN));
                echo "Ingrese el nuevo apellido del pasajero: ";
                $apellidoP = trim(fgets(STDIN));
                // Modifica los datos del pasajero en caso de encontrarlo
                if ($viaje->modificarPasajero($nombreP, $apellidoP, $documentoP) == false) {
                    echo "No hay ningún pasajero con el documento N°" . $documentoP . "\n";
                } else {
                    echo "Pasajero modificado correctamente.\n";
                }
                break;
            case 6:
                echo $viaje;
                break;
            default: // En caso de que el usuario ingrese un número que no este entre 1 y 6 inclusive, se le asigna falso a $sigue asi el 'while' se detiene
                $sigue = false;
                break;
        }
    }
?>