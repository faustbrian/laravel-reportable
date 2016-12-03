<?php

/*
 * This file is part of Laravel Reportable.
 *
 * (c) Brian Faust <hello@brianfaust.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

declare(strict_types=1);

namespace BrianFaust\Reportable\Interfaces;

use Illuminate\Database\Eloquent\Model;

interface HasReports
{
    public function reports();

    public function report($data, Model $reportable);
}
