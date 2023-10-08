<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class TipoUsuario
 *
 * @property int $id
 * @property string $tipo
 * @property int|null $estado
 *
 * @property Collection|Usuario[] $usuarios
 *
 * @package App\Models
 */
class Rol extends Model
{
	protected $table = 'rol';
	public $timestamps = false;

	protected $casts = [
		'estado' => 'int'
	];

	protected $fillable = [
		'nombre',
		'estado'
	];

    public static function factory()
    {
    }

    public function usuarios()
	{
		return $this->hasMany(Usuario::class, 'id_rol');
	}
}
