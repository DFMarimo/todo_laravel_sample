<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    protected $table = "tasks";
    protected $guarded = [];
    protected $appends = ['statusName'];

    public function getStatusNameAttribute()
    {
        if ($this->status == 'pending') {
            return "در حال پردازش";
        } elseif ($this->status == 'completed') {
            return "تکمیل شده";
        } else {
            return "لغو شده";
        }
    }
}
