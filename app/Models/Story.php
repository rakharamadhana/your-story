<?php

namespace App\Models;

use App\Domains\Auth\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Story extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'stories';

    /**
     * Fillable fields
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'group_id',
        'name_en',
        'name_zh-TW',
        'is_group_story',
        'time',
        'place',
        'characters',
        'conflict',
        'description',
        'nvc_outline',
    ];

    public function user(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(User::class, 'user_id','id');
    }

    public function group(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Group::class, 'group_id','id');
    }

    public function drawings(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(StoryDrawing::class, 'story_id', 'id');
    }
}
