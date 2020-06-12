<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    /** define the table name */ 
    protected $table = 'images';

    /** set the primary key field */ 
    protected $primaryKey = 'id';

    /** table fields that can be inserted */ 
    protected $fillable = ['img'];

    /** don't use the columns created_at and updated_at */ 
    public $timestamps = false;
}
