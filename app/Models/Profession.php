<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

/**
 * App\Models\Profession
 *
 * @property int $id
 * @property string $title
 * @property string $responsibilities
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Collection<int, Worker> $workers
 * @property-read int|null $workers_count
 * @method static Builder|Profession newModelQuery()
 * @method static Builder|Profession newQuery()
 * @method static Builder|Profession query()
 * @method static Builder|Profession whereCreatedAt($value)
 * @method static Builder|Profession whereId($value)
 * @method static Builder|Profession whereResponsibilities($value)
 * @method static Builder|Profession whereTitle($value)
 * @method static Builder|Profession whereUpdatedAt($value)
 * @property int $department_id
 * @method static Builder|Profession whereDepartmentId($value)
 * @property-read \App\Models\Department $department
 * @mixin Eloquent
 */
class Profession extends Model
{
    use HasFactory;

    protected $table = 'professions';

    protected $fillable = [
        'title',
        'responsibilities',
    ];

    protected $guarded = false;

    public function workers(): HasMany
    {
        return $this->hasMany(Worker::class, 'profession_id', 'id');
    }

    public function department(): BelongsTo
    {
        return $this->belongsTo(Department::class, 'department_id', 'id');
    }
}
