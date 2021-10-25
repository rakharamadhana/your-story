<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public const TYPE_TASK_1 = 'EMO';
    public const TYPE_TASK_2 = 'NVC';

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
        'type'
    ];
}
