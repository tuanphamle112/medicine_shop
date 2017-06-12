<?php

namespace App\Eloquent;

class Image extends AbstractEloquent
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'medicine_id',
        'path_origin',
        'path_thumb',
        'is_main',
        'request_medicines_id',
        'request_prescription_id',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;
}
