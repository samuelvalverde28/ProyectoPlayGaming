<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    /** define the table name */ 
    protected $table = 'games';

    /** set the primary key field */ 
    protected $primaryKey = 'id';

    /** table fields that can be inserted */ 
    protected $fillable = ['id','name', 'released', 'background_image', 'rating', 'rating_top','clip'];

    /** don't use the columns created_at and updated_at */ 
    public $timestamps = false;

}


