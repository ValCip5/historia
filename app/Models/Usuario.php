<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Categoria
 *
 * @property int $id
 * @property string $username
 * @property string $nombre
 * @property string $apellido
 * @property string $foto_url
 * @property boolean $es_miembro
 * @property boolean $es_admin
 * @property string $password
 * @property string $email
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria query()
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Categoria whereCategoria($value)
 * @mixin \Eloquent
 */
class Usuario extends Authenticatable
{
//    use HasFactory;

    protected $table = "usuarios";

    protected $primaryKey = "id";

    protected $fillable = [
        'username',
        'nombre',
        'apellido',
        'foto_url',
        'es_miembro',
        'es_admin',
        'password',
        'email',
    ];
}
