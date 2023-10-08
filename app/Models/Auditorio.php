<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Auditorio
 * 
 * @property int $id
 * @property string $nombre
 * @property int $capacidad
 * @property string $ubicacion
 * 
 * @property Collection|Formato[] $formatos
 *
 * @package App\Models
 */
class Auditorio extends Model
{
	protected $table = 'auditorio';
	public $timestamps = false;

	protected $casts = [
		'capacidad' => 'int'
	];

	protected $fillable = [
		'nombre',
		'capacidad',
		'ubicacion'
	];

	public function formatos()
	{
		return $this->hasMany(Formato::class, 'id_auditorio');
	}
}
