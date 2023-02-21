<?php

namespace App\Models;

use App\Casts\Ucwords;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Spatie\Permission\Models\Role;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    use HasRoles;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'username',
        'password',
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
        'name' => Ucwords::class,
        'email_verified_at' => 'datetime',
    ];

    public function scopeNoRootUsers($query)
    {
        $query->whereIn('id', function ($query) {
            $query->select('model_id')
                ->from('model_has_roles')
                ->where('role_id', '!=', 1);
        });
    }

    public function scopeRoleName($query)
    {
        $query->addSelect([
            'role_name' => Role::select('name')
                ->join('model_has_roles', 'model_has_roles.role_id', '=', 'roles.id')
                ->whereColumn('users.id', 'model_has_roles.model_id')
                ->limit(1),
        ]);
    }
}
