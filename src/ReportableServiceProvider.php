<?php


declare(strict_types=1);

/*
 * This file is part of Laravel Reportable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

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
