<?php

namespace App\Models;

use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Storage;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Contracts\Pagination\LengthAwarePaginator;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;


class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array int, string>
     */
    protected $fillable = [
        'name',
        'avatar',
        'email',
        'phone',
        'birthday',
        'cpf',
        'street',
        'number',
        'district',
        'city',
        'state',
        'complement',
        'password'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

    /**
     * Return users array with avatar path and pagination.
     *
     * @param Request $request
     * @return LengthAwarePaginator $users
     */
    static public function getAllFormatted(Request $request): LengthAwarePaginator
    {
        $users = User::query();

        // search user by name or email
        $users = $users->when($request->search, function ($query, $search) {
            return $query->where('name', 'like', "%{$search}%")
                ->orWhere('email', 'like', "%{$search}%");
        });

        $users = $users
            ->orderBy('id', 'desc')
            ->paginate(10);

        foreach ($users as $user) {
            $user->avatar = User::getUserAvatarPath($user);
        }

        if ($request->search) {
            $users->appends('search', $request->search);
        }

        return $users;
    }

    static public function getUserAvatarPath(User|Builder $user)
    {
        if ($user->avatar) {
            $isPlaceholder = Str::contains($user->avatar, 'https://via.placeholder.com');

            $avatar = $isPlaceholder ?
                $user->avatar :
                Storage::url($user->avatar);
        }

        if (!$user->avatar) {
            $avatar = Storage::url('users_avatars/avatar.png');
        }

        return $avatar;
    }

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

    public static function getStates()
    {
        return [
            'AC' => "Acre",
            "AL" => "Alagoas",
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
            "SC" => "Santa Catarina",
            "SE" => "Sergipe",
            "SP" => "São Paulo",
            "TO" => "Tocantins"
        ];
    }
}
