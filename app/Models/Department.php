<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Relations\HasOneThrough;
use Illuminate\Support\Carbon;

/**
 * App\Models\Department
 *
 * @property int $id
 * @property string $title
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Department newModelQuery()
 * @method static Builder|Department newQuery()
 * @method static Builder|Department query()
 * @method static Builder|Department whereCreatedAt($value)
 * @method static Builder|Department whereId($value)
 * @method static Builder|Department whereTitle($value)
 * @method static Builder|Department whereUpdatedAt($value)
 * @mixin Eloquent
 */
class Department extends Model
{
    use HasFactory;

    const BOSS = 0;

    protected $table = 'departments';

    protected $fillable = [
        'title'
    ];

    protected $guarded = false;

    public function boss(): HasOneThrough
    {
        return $this->hasOneThrough(Worker::class, Profession::class, 'department_id', 'profession_id', 'id', 'id')
        ->where('position_id', self::BOSS);
    }

    public function workers(): HasManyThrough
    {
        return $this->hasManyThrough(Worker::class, Profession::class, 'department_id', 'profession_id', 'id', 'id');
    }
}
