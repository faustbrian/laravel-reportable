<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Reportable.
 *
 * (c) Brian Faust <hello@brianfaust.me>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace BrianFaust\Reportable\Traits;

use Illuminate\Database\Eloquent\Model;
use BrianFaust\Reportable\Models\Report;
use Illuminate\Database\Eloquent\Relations\MorphMany;

trait HasReports
{
    public function reports(): MorphMany
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    public function report($data, Model $reportable): Report
    {
        $report = (new Report())->fill(array_merge($data, [
            'reporter_id' => $reportable->id,
            'reporter_type' => get_class($reportable),
        ]));

        $this->reports()->save($report);

        return $report;
    }
}
