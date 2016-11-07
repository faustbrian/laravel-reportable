<?php

namespace BrianFaust\Reportable;

use Illuminate\Database\Eloquent\Model;

class Conclusion extends Model
{
    protected $table = 'reports_conclusions';

    protected $guarded = ['id', 'created_at', 'updated_at'];

    protected $casts = ['meta' => 'array'];

    public function conclusion()
    {
        return $this->belongsTo(Report::class);
    }

    public function judge()
    {
        return $this->morphTo();
    }
}
