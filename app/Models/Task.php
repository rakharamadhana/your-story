<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const TYPE_MULTIPLE_CHOICE = '1';
    public const TYPE_ESSAY = '2';
    public const TYPE_MIXED = '3';

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tasks';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'description'
    ];
}