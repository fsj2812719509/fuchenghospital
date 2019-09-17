<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class ConsultModel extends Model
{
    protected $table="consult";
    public $primaryKey="consult_id";
    public $timestamps=false;
}
