<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Zona
 * 
 * @property int $id
 * @property string $nombre
 * @property string $capacidad
 * @property string $ubicacion
 * 
 * @property Collection|Asiento[] $asientos
 * @property Collection|Formato[] $formatos
 *
 * @package App\Models
 */
class Zona extends Model
{
	protected $table = 'zonas';
	public $timestamps = false;

	protected $fillable = [
		'nombre',
		'capacidad',
		'ubicacion'
	];

	public function asientos()
	{
		return $this->hasMany(Asiento::class, 'id_zona');
	}

	public function formatos()
	{
		return $this->belongsToMany(Formato::class, 'zona_formato', 'id_zona', 'id_formato')
					->withPivot('id');
	}
}
