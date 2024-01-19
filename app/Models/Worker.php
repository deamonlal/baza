<?php

namespace App\Models;

use App\Models\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker query()
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereAge($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereDescription($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereEmail($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereIsMarried($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereSurname($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Worker filter(\App\Http\Filters\FilterInterface $filter)
 * @property int|null $profession_id
 * @property-read \App\Models\Profession|null $profession
 * @property-read \App\Models\Profile|null $profile
 * @method static \Illuminate\Database\Eloquent\Builder|Worker whereProfessionId($value)
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Project> $projects
 * @property-read int|null $projects_count
 * @mixin \Eloquent
 */
class Worker extends Model
{
    use HasFactory;
    use Filterable;

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

    public function profile(): \Illuminate\Database\Eloquent\Relations\HasOne
    {
        return $this->hasOne(Profile::class, 'worker_id', 'id');
    }

    public function profession(): \Illuminate\Database\Eloquent\Relations\BelongsTo
    {
        return $this->belongsTo(Profession::class, 'profession_id', 'id');
    }

    public function projects(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(Project::class, 'project_workers', 'worker_id' , 'project_id');
    }

    public function avatar(): \Illuminate\Database\Eloquent\Relations\MorphOne
    {
        return $this->morphOne(Avatar::class, 'avatarable');
    }
}
