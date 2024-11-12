<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class product extends Model
{
    use SoftDeletes;
    protected $guarded=[];
    protected $date=['deleted_at'];
}
