<?php



declare(strict_types=1);

namespace BrianFaust\Reportable;

use BrianFaust\ServiceProvider\ServiceProvider;

class ReportableServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        $this->publishMigrations();
    }

    public function getPackageName(): string
    {
        return 'reportable';
    }
}
