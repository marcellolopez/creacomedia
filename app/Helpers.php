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
    list($horas, $minutos, $segundos) = explode(':', $duracion);

    return $horas * 3600 + $minutos * 60 + $segundos;
}

function segundosAFormatoTiempo($segundos)
{
    $horas = floor($segundos / 3600);
    $minutos = floor(($segundos % 3600) / 60);
    $segundos = $segundos % 60;

    return sprintf('%02d:%02d:%02d', $horas, $minutos, $segundos);
}
