<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Users_game extends Model
{
    /** define the table name */ 
    protected $table = 'users_games';

    /** set the primary key field */ 
    protected $primaryKey = 'id';

    /** table fields that can be inserted */ 
    protected $fillable = ['idgames', 'idusers', 'estado'];

    /** don't use the columns created_at and updated_at */ 
    public $timestamps = false;
}
