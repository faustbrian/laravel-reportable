<?php

namespace DraperStudio\Reportable\Contracts;

use Illuminate\Database\Eloquent\Model;

interface Reportable
{
    public function reports();

    public function report($data, Model $reportable);
}
