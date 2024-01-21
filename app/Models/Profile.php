<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

/**
 * App\Models\Profile
 *
 * @property int $id
 * @property int $workers_id
 * @property string $address
 * @property string $experience
 * @property string $finished_study_at
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @property-read Worker|null $worker
 * @method static Builder|Profile newModelQuery()
 * @method static Builder|Profile newQuery()
 * @method static Builder|Profile query()
 * @method static Builder|Profile whereAddress($value)
 * @method static Builder|Profile whereCreatedAt($value)
 * @method static Builder|Profile whereExperience($value)
 * @method static Builder|Profile whereFinishedStudyAt($value)
 * @method static Builder|Profile whereId($value)
 * @method static Builder|Profile whereUpdatedAt($value)
 * @method static Builder|Profile whereWorkersId($value)
 * @mixin Eloquent
 */
class Profile extends Model
{
    use HasFactory;

    protected $table = 'profiles';

    protected $fillable = [
        'worker_id',
        'profession_id',
        'address',
        'experience',
        'finished_study_at',
    ];

    protected $guarded = false;

    public function worker(): BelongsTo
    {
        return $this->belongsTo(Worker::class, 'worker_id', 'id');
    }
}
