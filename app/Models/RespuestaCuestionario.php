<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RespuestaCuestionario extends Model
{
    use HasFactory;

    protected $table = 'respuesta_cuestionarios';

    // Los campos que son asignables en masa
    protected $fillable = [
        'usuario_id',
        'respuestas',
        'puntuacion_total',
        'huella_hidrica',
    ];

    // Definir que 'respuestas' es un campo de tipo JSON
    protected $casts = [
        'respuestas' => 'array', // Convierte automáticamente las respuestas en un arreglo cuando se obtiene
    ];

    public function usuario()
    {
        return $this->belongsTo(User::class, 'usuario_id');
    }

    public function puntuacion()
    {
        return $this->belongsTo(User::class, 'puntuacion_total');
    }

    public function user()
{
    return $this->belongsTo(User::class);
}

}
