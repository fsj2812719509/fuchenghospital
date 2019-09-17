<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class user extends Model
{
    protected  $table = 'demo';
    protected  $primaryKey = 'd_id';
    //白名单
//    protected  $fillable = [
//        'name'
//    ];
    //黑名单
//    protected  $guarded = [
//        'updated_at',
//        'created_at',
//    ];
    public $timestamps = false;

    //    protected $dateFormat = 'U';



//    public function getIsShowAttribute($value){
//        //这里可以对 $value 做一些转换等操作
//        return $value;
//    }

//    public function setFirstNameAttribute($value)
//    {
//        $this->attributes['first_name'] = strtolower($value);
//    }
//    public function getIsShowAttribute($value)
//    {
//        $a = [1=>'√',0=>'×'];
//        return $a[$value];
//    }
//
//    public function getNewsSfAttribute($value)
//    {
//        $a = [1=>'置顶',0=>'普通'];
//        return $a[$value];
//    }
}
