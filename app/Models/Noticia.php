<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DateTime;

/**
 * App\Models\Categoria
 *
 * @property int $id
 * @property int $categoria_id
 * @property string $titulo
 * @property string $descripcion
 * @property string $imagen_url
 * @property int $cantidad_likes
 * @property int $cantidad_vistos
 * @property int $usuario_id
 * @property int $activo
 * @property int $fecha
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Categoria $categoria
 * @property-read \App\Models\Usuario $usuario
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Bloque[] $bloques
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Comentario[] $comentarios
 * @property-read \Illuminate\Database\Eloquent\Collection|\App\Models\Usuario[] $usuarios_like
 * @property-read int|null $usuarios_like_count
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCategoria($value)
 * @mixin \Eloquent
 */
class Noticia extends Model
{
//    use HasFactory;

    protected $table = "noticias";

    protected $primaryKey = "id";

    protected $fillable = [
        'categoria_id',
        'titulo',
        'descripcion',
        'imagen_url',
        'cantidad_likes',
        'cantidad_vistos',
        'usuario_id',
        'activo',
        'fecha',
    ];

    public function categoria()
    {
        return $this->belongsTo(Categoria::class, 'categoria_id');
    }

    public function usuario()
    {
        return $this->belongsTo(Usuario::class, 'usuario_id');
    }

    public function bloques()
    {
        return $this->hasMany(Bloque::class, 'noticia_id');
    }

    public function comentarios()
    {
        return $this->hasMany(Comentario::class, 'noticia_id')->orderBy('id', 'desc');
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

    public function usuarios_like()
    {
        // belongsToMany() define una relación de n:m con otro modelo.
        // Puede recibir unos cuántos argumentos:
        // 1. String. El nombre del modelo de Eloquent al que relacionamos.
        // 2. Opcional. String. El nombre de la tabla pivot de la relación.
        // 3. Opcional. String. La "Foreign Pivot Key". Es decir, la FK en la tabla pivot. Se refiere a la FK para la PK de este modelo.
        // 4. Opcional. String. La "Related Pivot Key". Es decir, la FK para la tabla relacionada.
        // 5. Opcional. String. La PK de esta tabla que es referenciada.
        // 6. Opcional. String. La PK de la tabla relacionada.
        return $this->belongsToMany(
            Usuario::class, 
            'likes',
            'noticia_id',
            'usuario_id',
            'id',
            'id',
        );
    }
}
