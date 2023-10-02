<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;



class Project extends Model
{
    use HasFactory;

    protected $appends = [
        'img_path'
    ];
    protected  $visible = [];
    protected $hidden = [
        'img',
        'type_id',
        'created_at',
        'updated_at',
        'pivot'
    ];

    public function getImgPathAttribute(){
        if($this->img = null){
            return null;
        }
        elseif($this->img != null){
            return asset('storage/'.$this->img);
        }
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }


    public function giveTech(){
        return $this->belongsToMany(Technology::class);
    }
}
