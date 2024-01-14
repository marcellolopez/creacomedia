<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use App\Helpers;

class Course extends Model
{
    protected $guarded = [];

    public function lessons()
    {
        return $this->hasMany(Lesson::class, 'course_id');
    }

    public function getTotalDurationInHours()
    {
        $lessons = $this->lessons;
    
        // Inicializa un objeto DateTime con un intervalo de 0 segundos
        $totalDuration = '00:00:00';
    
        // Recorre los cursos y agrega cada intervalo de tiempo al total
        foreach ($lessons as $lesson) {

            ## sumo dos valores con la función sumarDuraciones()  que está en app/Helpers.php
            $totalDuration = sumarDuraciones($totalDuration, $lesson->duration);
        }
    
        return $totalDuration;
    }

    ## Necesito función que me devuelva el total de minutos y segundos de cada curso
    public function getTotalDurationInMinutesSeconds(){
        $lessons = $this->lessons;
    
        // Inicializa un objeto DateTime con un intervalo de 0 segundos
        $totalDuration = new \DateTime('@0');
    
        // Recorre los cursos y agrega cada intervalo de tiempo al total
        foreach ($lessons as $lesson) {
            $interval = \DateInterval::createFromDateString($lesson->duration);
            $totalDuration->add($interval);
        }
    
        // Obtiene las horas totales del objeto DateTime
        $totalHours = $totalDuration->format('H');
    
        ## Retorna el total en minutos y segundos, si supera la hora, devuelveme las H:MM:SS, Si H llega a tener dos dígitos, dejalo como HH:MM:SS
        if($totalHours < 1){
            return $totalDuration->format('i:s');
    
            ## Si llega a tener dos dígitos, dejalo como HH:MM:SS
        }elseif($totalHours < 10){
            return $totalDuration->format('H:i:s');
        
            ## Si supera la hora, devuelveme las H:MM:SS
        }else{
            return $totalDuration->format('H:i:s');
        
        }

    }


    // Definir la relación con Enroll
    public function enrolls()
    {
        return $this->hasMany(Enroll::class, 'course_id');
    }

    // Función para obtener la cantidad de usuarios inscritos
    public function getUsersCountAttribute()
    {
        return $this->enrolls->count();
    }

    public function review()
    {
        return $this->reviews()->whereUserId(auth()->user()->id)->whereCourseId($this->id)->first();
    }

    public function reviews()
    {
        return $this->hasMany(Review::class);
    }

    public function getAverageAttribute()
    {
        return (int)$this->reviews()/*->where('user_id', auth()->user()->id)*/->avg('rating');
    }
}
