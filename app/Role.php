<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table = 'roles';

    protected $fillable = ['id', 'name'];

    //Relation

    public function users()
    {
        return $this->hasMany(User::class, 'role_id');
    }
}
