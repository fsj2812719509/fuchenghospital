<?php

namespace App\Model;

use Illuminate\Database\Eloquent\Model;

class OfficeModel extends Model
{
    protected $primarykey = 'office_id';
    protected $table = "office";
    public $timestamps=false;
}
