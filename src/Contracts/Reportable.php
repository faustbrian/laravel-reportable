<?php

/*
 * This file is part of Laravel Reportable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Reportable\Contracts;

use Illuminate\Database\Eloquent\Model;

/**
 * Interface Reportable.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
interface Reportable
{
    /**
     * @return mixed
     */
    public function reports();

    /**
     * @param $data
     * @param Model $reportable
     *
     * @return mixed
     */
    public function report($data, Model $reportable);
}
