<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'phone',
        'birthday',
        'cpf',
        'street',
        'number',
        'neighbor',
        'city',
        'state',
        'complement',
        'password'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public static function state(){
		return [
			'AC' => "acre",
			"AL" => "alagoas",
			"AM" => "Amazonas",
			"AP" => "Amapá",
			"BA" => "Bahia",
			"CE" => "Ceará",
			"DF" => "Distrito Federal",
			"ES" => "Espírito Santo",
			"GO" => "Goiás",
			"MA" => "Maranhão",
			"MG" => "Minas Gerais",
			"MS" => "Mato Grosso do Sul",
			"MT" => "Mato Grosso",
			"PA" => "Pará",
			"PB" => "Paraíba ",
			"PE" => "Pernambuco",
			"PI" => "Piauí",
			"PR" => "Paraná",
			"RJ" => "Rio de Janeiro",
			"RN" => "Rio Grande do Norte",
			"RS" => "Rio Grande do Sul",
			"RO" => "Rondônia",
			"RR" => "Roraima",
			"SC"=> "Santa Catarina",
			"SE" => "Sergipe",
			"SP" => "São Paulo",
			"TO" => "Tocantins"
		];
	}
}
