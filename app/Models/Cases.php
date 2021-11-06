<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cases extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'cases';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'name_en',
        'name_zh-TW',
        'description_en',
        'description_zh-TW',
        'observes_en',
        'observes_zh-TW',
        'perceives_en',
        'perceives_zh-TW',
        'needs_en',
        'needs_zh-TW',
        'request_en',
        'request_zh-TW',
    ];
}
