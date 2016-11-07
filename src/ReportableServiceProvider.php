<?php

namespace BrianFaust\Reportable;

use BrianFaust\ServiceProvider\ServiceProvider;

class ReportableServiceProvider extends ServiceProvider
{
    public function boot()
    {
        $this->publishMigrations();
    }

    public function getPackageName()
    {
        return 'reportable';
    }
}
