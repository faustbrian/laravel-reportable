<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Reportable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Reportable\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\MorphTo;

class Report extends Model
{
    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta' => 'array'];

    public function reportable(): MorphTo
    {
        return $this->morphTo();
    }

    public function scopeUnjudged(Builder $query) : Builder
    {
        return $query->doesntHave('conclusion');
    }

    public function reporter(): HasOne
    {
        return $this->hasOne(User::class, 'id', 'reporter_id');
    }

    public function conclusion(): HasOne
    {
        return $this->hasOne(Conclusion::class);
    }

    public function judge(): Model
    {
        return $this->conclusion->judge;
    }

    public function conclude($data, Model $judge): Conclusion
    {
        $conclusion = (new Conclusion())->fill(array_merge($data, [
            'judge_id'   => $judge->id,
            'judge_type' => get_class($judge),
        ]));

        $this->conclusion()->save($conclusion);

        return $conclusion;
    }

    public static function allJudges(): array
    {
        $judges = [];

        foreach (Conclusion::get() as $conclusion) {
            $judges[] = $conclusion->judge;
        }

        return $judges;
    }
}
