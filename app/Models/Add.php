<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Add extends Model
{
    use HasFactory;

    /**
     * Model properties allowed for filling
     *
     * @var string[]
     */
    protected $fillable = ['text', 'price', 'amount', 'link'];
}
