<?php
namespace App;

function sumarDuraciones($duracion1, $duracion2)
{
    // Convierte las duraciones a segundos
    $segundos1 = obtenerSegundos($duracion1);
    $segundos2 = obtenerSegundos($duracion2);

    // Suma los segundos
    $totalSegundos = $segundos1 + $segundos2;

    // Convierte el total de segundos a formato de tiempo
    $totalDuracion = segundosAFormatoTiempo($totalSegundos);

    return $totalDuracion;
}

function obtenerSegundos($duracion)
{
    // Dividir la cadena en horas, minutos y segundos
    $components = explode(':', $duracion);

    // Asegurarse de que haya al menos tres componentes
    if (count($components) < 3) {
        // Proporcionar valores predeterminados si no se dividió correctamente
        $components = array_pad($components, 3, 0);
    }

    // Obtener horas, minutos y segundos
    list($horas, $minutos, $segundos) = $components;

    // Calcular los segundos totales
    return $horas * 3600 + $minutos * 60 + $segundos;
}

function segundosAFormatoTiempo($segundos)
{
    $horas = floor($segundos / 3600);
    $minutos = floor(($segundos % 3600) / 60);
    $segundos = $segundos % 60;

    return sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);
}
