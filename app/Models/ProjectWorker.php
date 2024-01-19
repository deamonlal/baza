<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProjectWorker
 *
 * @property int $id
 * @property int $project_id
 * @property int $worker_id
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker whereProjectId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProjectWorker whereWorkerId($value)
 * @mixin \Eloquent
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
