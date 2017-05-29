<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class InforWebsite extends Model
{
    const POSITION_MAIN = 'position_main';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'slogan',
        'logo',
        'link_communications',
        'footer',
        'options',
        'position',
    ];

    /**
     * Indicates if the model should be timestamped.
     *
     * @var bool
     */
    public $timestamps = false;

    public function scopeGetInfoWebsite($query)
    {
        return $query->where('position', self::POSITION_MAIN);
    }

    public static function getPositionOption()
    {
        return [
            self::POSITION_MAIN => __('Position Main'),
        ];
    }
}
