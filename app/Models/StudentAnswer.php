<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentAnswer extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'student_answers';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'cases_id',
        'task_id',
        'emo_1',
        'emo_2',
        'nvc_1',
        'nvc_2',
        'nvc_3',
        'nvc_4',
        'nvc_end',
    ];
}
