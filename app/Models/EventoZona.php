<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class EventoZona
 *
 * @property int $id
 * @property int $id_evento
 * @property int $id_zona_formato
 * @property float $precio
 *
 * @property Evento $evento
 * @property ZonaFormato $zona_formato
 *
 * @package App\Models
 */
class EventoZona extends Model
{
	protected $table = 'evento_zona';
	public $timestamps = false;

	protected $casts = [
		'id_evento' => 'int',
		'id_zona_formato' => 'int',
		'precio' => 'float'
	];

	protected $fillable = [
		'id_evento',
		'id_zona_formato',
		'precio'
	];

	public function evento()
	{
		return $this->belongsTo(Evento::class, 'id_evento');
	}


    public function boletos()
    {
        return $this->hasMany(Boleto::class, 'id_evento_zona');
    }
}
