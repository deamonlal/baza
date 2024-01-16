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
}
