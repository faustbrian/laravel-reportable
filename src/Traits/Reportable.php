<?php

/*
 * This file is part of Laravel Reportable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Reportable\Traits;

use DraperStudio\Reportable\Models\Report;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Reportable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
trait Reportable
{
    /**
     * @return mixed
     */
    public function reports()
    {
        return $this->morphMany(Report::class, 'reportable');
    }

    /**
     * @param $data
     * @param Model $reportable
     *
     * @return $this
     */
    public function report($data, Model $reportable)
    {
        $report = (new Report())->fill(array_merge($data, [
            'reporter_id' => $reportable->id,
            'reporter_type' => get_class($reportable),
        ]));

        $this->reports()->save($report);

        return $report;
    }
}
