<?php

namespace App\Models;

use App\Events\Worker\CreatedEvent;
use App\Http\Filters\FilterInterface;
use App\Models\Traits\Filterable;
use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphMany;
use Illuminate\Database\Eloquent\Relations\MorphOne;
use Illuminate\Database\Eloquent\Relations\MorphToMany;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Carbon;

/**
 * App\Models\Worker
 *
 * @property int $id
 * @property string $name
 * @property string $surname
 * @property string $email
 * @property int|null $age
 * @property string|null $description
 * @property int $is_married
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|Worker newModelQuery()
 * @method static Builder|Worker newQuery()
 * @method static Builder|Worker query()
 * @method static Builder|Worker whereAge($value)
 * @method static Builder|Worker whereCreatedAt($value)
 * @method static Builder|Worker whereDescription($value)
 * @method static Builder|Worker whereEmail($value)
 * @method static Builder|Worker whereId($value)
 * @method static Builder|Worker whereIsMarried($value)
 * @method static Builder|Worker whereName($value)
 * @method static Builder|Worker whereSurname($value)
 * @method static Builder|Worker whereUpdatedAt($value)
 * @method static Builder|Worker filter(FilterInterface $filter)
 * @property int|null $profession_id
 * @property-read Profession|null $profession
 * @property-read Profile|null $profile
 * @method static Builder|Worker whereProfessionId($value)
 * @property-read Collection<int, Project> $projects
 * @property-read int|null $projects_count
 * @property-read Avatar|null $avatar
 * @property-read Collection<int, Review> $review
 * @property-read int|null $review_count
 * @property-read Collection<int, Tag> $tags
 * @property-read int|null $tags_count
 * @mixin Eloquent
 */
class Worker extends Model
{
    use HasFactory;
    use Filterable;
    use SoftDeletes;

    protected $table = 'workers';

    protected $fillable = [
        'name',
        'surname',
        'email',
        'age',
        'description',
        'is_married',
    ];

    protected $guarded = false;

    protected static function booted(): void
    {
        static::created(function ($model) {
            event(new CreatedEvent($model));
        });
    }

    public function profile(): HasOne
    {
        return $this->hasOne(Profile::class, 'worker_id', 'id');
    }

    public function profession(): BelongsTo
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function projects(): BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_workers', 'worker_id' , 'project_id');
    }

    public function avatar(): MorphOne
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }

    public function review(): MorphMany
    {
        return $this->morphMany(Review::class, 'avatarable');
    }

    public function tags(): MorphToMany
    {
        return $this->morphToMany(Tag::class, 'taggable');
    }
}
