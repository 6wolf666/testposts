<?php

namespace App\Models\Posts;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int status
 * @property string $title
 * @property string $slug
 * @property string $short_description
 * @property string $description
 *
 * @see self::scopeActive()
 * @see self::scopeHidden()
 */
class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'status',
        'title',
    ];

    public const ACTIVE = 1;
    public const HIDDEN = 0;

    public function scopeActive(Builder $builder): Builder
    {
        return $builder->where('status', self::ACTIVE);
    }

    public function scopeHidden(Builder $builder): Builder
    {
        return $builder->where('status', self::HIDDEN);
    }


}
