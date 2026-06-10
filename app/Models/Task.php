<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;
    // این یعنی این فیلدها اجازه دارند از طریق فرم پر شوند
    protected $fillable = ['title', 'description', 'status'];
}
