<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

class client extends Model
{
    use HasFactory;

    protected $table = 'client';
    protected $connection = 'pgsql';
    public $incrementing = false;
    protected $primaryKey = "client_id";
    protected $guarded = [ ];
    protected $keyType = 'string';

//model client
// public function users()
// {
//     return $this->hasOne(User::class,'user_id');
// }


     /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'client_id','user_id','client_name', 'sex', 'birth_date','email','client_position_id', 'agency_name', 'agency_address'
    ];

    // /**
    //  * The attributes that should be hidden for serialization.
    //  *
    //  * @var array<int, string>
    //  */
    // protected $hidden = [
    //     'password',
    //     'remember_token',
    // ];

    // /**
    //  * The attributes that should be cast.
    //  *
    //  * @var array<string, string>
    //  */
    // protected $casts = [
    //     'email_verified_at' => 'datetime',
    //     'password' => 'hashed',
    // ];
    public $timestamps = false;

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($model) {
            $model->{$model->getKeyName()} = (string) Uuid::uuid4();
        });
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}