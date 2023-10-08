<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Asiento
 * 
 * @property int $id
 * @property int|null $numero
 * @property int $fila
 * @property int|null $id_zona
 * 
 * @property Zona|null $zona
 * @property Collection|Boleto[] $boletos
 *
 * @package App\Models
 */
class Asiento extends Model
{
	protected $table = 'asientos';
	public $timestamps = false;

	protected $casts = [
		'numero' => 'int',
		'fila' => 'int',
		'id_zona' => 'int'
	];

	protected $fillable = [
		'numero',
		'fila',
		'id_zona'
	];

	public function zona()
	{
		return $this->belongsTo(Zona::class, 'id_zona');
	}

	public function boletos()
	{
		return $this->hasMany(Boleto::class, 'id_asiento');
	}
}
