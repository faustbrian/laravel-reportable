<?php

namespace DraperStudio\Reportable;

use DraperStudio\ServiceProvider\ServiceProvider as BaseProvider;

class ServiceProvider extends BaseProvider
{
    protected $packageName = 'reportable';

    public function boot()
    {
        $this->setup(__DIR__)
             ->publishMigrations();
    }
}
