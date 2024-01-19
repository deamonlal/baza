<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;

/**
 * App\Models\Avatar
 *
 * @property int $id
 * @property string $path
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property int $avatarable_id
 * @property string $avatarable_type
 * @property-read Model|\Eloquent $avatarable
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar query()
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar whereAvatarableId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar whereAvatarableType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar wherePath($value)
 * @method static \Illuminate\Database\Eloquent\Builder|Avatar whereUpdatedAt($value)
 * @mixin \Eloquent
 */
class Avatar extends Model
{
    use HasFactory;

    protected $guarded = false;

    public function avatarable(): MorphTo
    {
        return $this->morphTo();
    }
}
