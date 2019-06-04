<?php

declare(strict_types=1);

/*
 * This file is part of Laravel Reportable.
 *
 * (c) Brian Faust <hello@basecode.sh>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Artisanry\Reportable;

use Illuminate\Support\ServiceProvider;

class ReportableServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     */
    public function boot()
    {
        $this->publishes([
            __DIR__.'/../database/migrations/create_reports_table.php' => database_path('migrations/'.date('Y_m_d_His', time()).'_create_reports_table.php'),
        ], 'migrations');
    }
}
