<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Bloque
 *
 * @property int $id
 * @property int $noticia_id
 * @property string $imagen_url
 * @property string $texto
 * @property int $posicion
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \App\Models\Noticia $noticia
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereId($value)
 * @mixin \Eloquent
 */
class Bloque extends Model
{
//    use HasFactory;

    protected $table = "bloques";

    protected $primaryKey = "id";

    protected $fillable = [
        'noticia_id',
        'imagen_url',
        'texto',
        'posicion',
    ];

    public function noticia()
    {
        return $this->belongsTo(Noticia::class, 'noticia_id');
    }
}
