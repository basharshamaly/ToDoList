<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DropList extends Model
{
    use HasFactory;
    public function tasks(){

        return $this->hasMany(Task::class,'drop_list_id','id');

    }
}