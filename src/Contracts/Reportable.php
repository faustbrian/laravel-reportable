<?php

namespace BrianFaust\Reportable\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Reportable
{
    public function reports();

    public function report($data, Model $reportable);
}
