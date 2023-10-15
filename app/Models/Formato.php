<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Formato
 *
 * @property int $id
 * @property string $nombre
 * @property int $descripcion
 * @property int $id_escenario
 *
 * @property Auditorio $auditorio
 * @property Collection|Zona[] $zonas
 *
 * @package App\Models
 */
class Formato extends Model
{
	protected $table = 'formato';
	public $timestamps = false;

	protected $casts = [
		'descripcion' => 'string',
		'id_escenario' => 'int'
	];

	protected $fillable = [
		'nombre',
		'descripcion',
		'id_escenario'
	];

	public function auditorio()
	{
		return $this->belongsTo(Auditorio::class, 'id_escenario');
	}

	public function zonas()
	{
		return $this->belongsToMany(Zona::class, 'zona_formato', 'id_formato', 'id_zona')
					->withPivot('id');
	}
}
