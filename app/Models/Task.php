<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // 設定できる値
    protected $fillable = ['name', 'priority_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function priority()
    {
        // TaskモデルはPriorityモデルに属している
        return $this->belongsTo(Priority::class);
    }
}
