<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Evento
 *
 * @property int $id
 * @property string $evento
 * @property Carbon $fecha
 * @property int $estado
 * @property string $ruta_imagen
 * @property int|null $id_evento_zona
 *
 * @property Collection|Boleto[] $boletos
 * @property Collection|EventoZona[] $evento_zonas
 *
 * @package App\Models
 */
class Evento extends Model
{
	protected $table = 'evento';
	public $timestamps = false;

	protected $casts = [
		'fecha' => 'datetime',
		'capacidad' => 'int',
		'id_evento_zona' => 'int'
	];

	protected $fillable = [
		'evento',
		'fecha',
        'ruta_imagen',
		'estado',
	];

	public function evento_zonas()
	{
		return $this->hasMany(EventoZona::class, 'id_evento');
	}
}
