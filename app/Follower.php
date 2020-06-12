<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    /** define the table name */ 
    public $table = "follower";

    /** set the primary key field */ 
    protected $primaryKey = 'id';

    /** don't use the columns created_at and updated_at*/ 
    public $timestamps = false;



}
