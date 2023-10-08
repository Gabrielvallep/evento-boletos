<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class ZonaFormato
 * 
 * @property int $id
 * @property int $id_zona
 * @property int $id_formato
 * 
 * @property Formato $formato
 * @property Zona $zona
 * @property Collection|EventoZona[] $evento_zonas
 *
 * @package App\Models
 */
class ZonaFormato extends Model
{
	protected $table = 'zona_formato';
	public $timestamps = false;

	protected $casts = [
		'id_zona' => 'int',
		'id_formato' => 'int'
	];

	protected $fillable = [
		'id_zona',
		'id_formato'
	];

	public function formato()
	{
		return $this->belongsTo(Formato::class, 'id_formato');
	}

	public function zona()
	{
		return $this->belongsTo(Zona::class, 'id_zona');
	}

	public function evento_zonas()
	{
		return $this->hasMany(EventoZona::class, 'id_zona_formato');
	}
}
