<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

/**
 * Class Usuario
 *
 * @property int $id
 * @property string $nombre
 * @property string $email
 * @property Carbon|null $email_verified_at
 * @property string $password
 * @property string $dui
 * @property string $telefono
 * @property bool $estado
 * @property string|null $remember_token
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 *
 * @property Collection|Reserva[] $reservas
 *
 * @package App\Models
 */
class Usuario extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'usuarios';

	protected $casts = [
		'email_verified_at' => 'datetime',
		'estado' => 'bool',
		'id_rol' => 'int'
	];

	protected $hidden = [
		'password',
		'remember_token'
	];

	protected $fillable = [
		'nombre',
		'email',
		'email_verified_at',
		'password',
		'dui',
		'telefono',
		'estado',
		'id_rol',
		'remember_token'
	];

	public function rol()
	{
		return $this->belongsTo(Rol::class, 'id_rol');
	}

	public function reservas()
	{
		return $this->hasMany(Reserva::class, 'id_usuario');
	}
}
