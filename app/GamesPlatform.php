<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class GamesPlatform extends Model
{
    /** define the table name */ 
    protected $table = 'games_platforms';

    /** set the primary key field */ 
    protected $primaryKey = 'id';

    /** don't use the columns created_at and updated_at */ 
    public $timestamps = false;
}
