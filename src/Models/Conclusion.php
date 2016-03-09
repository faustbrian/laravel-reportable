<?php

/*
 * This file is part of Laravel Reportable.
 *
 * (c) DraperStudio <hello@draperstudio.tech>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace DraperStudio\Reportable\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Conclusion.
 *
 * @author DraperStudio <hello@draperstudio.tech>
 */
class Conclusion extends Model
{
    /**
     * @var string
     */
    protected $table = 'reports_conclusions';

    /**
     * @var array
     */
    protected $guarded = ['id', 'created_at', 'updated_at'];

    /**
     * @var array
     */
    protected $casts = ['meta' => 'array'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function conclusion()
    {
        return $this->belongsTo(Report::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphTo
     */
    public function judge()
    {
        return $this->morphTo();
    }
}
