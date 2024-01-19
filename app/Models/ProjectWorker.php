<?php

namespace App\Models;

use Eloquent;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Carbon;

/**
 * App\Models\ProjectWorker
 *
 * @property int $id
 * @property int $project_id
 * @property int $worker_id
 * @property Carbon|null $created_at
 * @property Carbon|null $updated_at
 * @method static Builder|ProjectWorker newModelQuery()
 * @method static Builder|ProjectWorker newQuery()
 * @method static Builder|ProjectWorker query()
 * @method static Builder|ProjectWorker whereCreatedAt($value)
 * @method static Builder|ProjectWorker whereId($value)
 * @method static Builder|ProjectWorker whereProjectId($value)
 * @method static Builder|ProjectWorker whereUpdatedAt($value)
 * @method static Builder|ProjectWorker whereWorkerId($value)
 * @mixin Eloquent
 */
class ProjectWorker extends Model
{
    use HasFactory;

    protected $table = 'project_workers';

    protected $fillable = [
        'project_id',
        'worker_id',
    ];

    protected $guarded = false;
}
