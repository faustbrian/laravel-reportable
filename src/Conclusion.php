<?php

/*
 * This file is part of Laravel Reportable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Reportable;

use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    protected $table = 'reports_conclusions';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta' => 'array'];

    public function conclusion()
    {
        return $this->belongsTo(Report::class);
    }

    public function judge()
    {
        return $this->morphTo();
    }
}
