<?php



declare(strict_types=1);

namespace BrianFaust\Reportable;

use Illuminate\Database\Eloquent\Model;
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
            'reporter_id'   => $reportable->id,
            'reporter_type' => get_class($reportable),
        ]));

        $this->reports()->save($report);

        return $report;
    }
}
