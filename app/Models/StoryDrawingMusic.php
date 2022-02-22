<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StoryDrawingMusic extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'story_drawing_music';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'story_id',
        'category',
        'audio',
    ];

    public function story(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Story::class, 'story_id','id');
    }
}
