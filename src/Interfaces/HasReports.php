<?php

namespace BrianFaust\Reportable\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface HasReports
{
    public function reports();

    public function report($data, Model $reportable);
}
