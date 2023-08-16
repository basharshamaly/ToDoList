<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function prioritiy()
    {
        return $this->belongsTo(Priority::class, 'priority_id', 'id');
    }
    public function drop_lists()
    {

        return $this->belongsTo(DropList::class, 'drop_list_id', 'id');
    }
}