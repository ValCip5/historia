<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * App\Models\Comentario
 *
 * @property int $id
 * @property int $noticia_id
 * @property string $comentario
 * @property int $usuario_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Noticia $noticia
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCategoria($value)
 * @mixin \Eloquent
 */
class Comentario extends Model
{
//    use HasFactory;

    protected $table = "comentarios";

    protected $primaryKey = "id";

    protected $fillable = [
        'noticia_id',
        'comentario',
        'usuario_id',
        'fecha',
    ];

    public function noticia()
    {
        return $this->belongsTo(Noticia::class, 'noticia_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function fechaRelativa()
    {
        date_default_timezone_set('America/Argentina/Buenos_Aires'); // quizas cambir depsues
        $fecha = new DateTime($this->fecha);
        $hoy = new DateTime();
        $diferencia = $hoy->diff($fecha);
        if ($diferencia->days <= 0) {
            return $diferencia->h . " horas";
        } else {
            return $diferencia->days . " días";
        }
    }
}
