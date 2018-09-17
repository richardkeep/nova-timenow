<?php

namespace Richardkeep\NovaTimenow;

use Laravel\Nova\Card;

class NovaTimenow extends Card
{
    /**
     * The width of the card (1/3, 1/2, or full).
     *
     * @var string
     */
    public $width = '1/3';

    public function __construct()
    {
        return $this->withMeta([
            'dateFormat'        => 'dddd, MMMM Do YYYY',
            'defaultTimezone'   => config('app.timezone'),
            'timeFormat'        => 'LTS',
            'locale'            => config('app.locale'),
            'timezones'         => [config('app.timezone'), 'America/Mexico_City'],
        ]);
    }

    public function dateFormat(string $dateFormat)
    {
        return $this->withMeta(['dateFormat' => $dateFormat]);
    }

    public function timeFormat(string $timeFormat)
    {
        return $this->withMeta(['timeFormat' => $timeFormat]);
    }

    public function locale($locale)
    {
        return $this->withMeta(['locale' => $locale]);
    }

    public function defaultTimezone($timezone)
    {
        return $this->withMeta(['defaultTimezone' => $timezone]);
    }

    public function timezones($timezones)
    {
        return $this->withMeta(['timezones' => $timezones]);
    }

    /**
     * Get the component name for the element.
     *
     * @return string
     */
    public function component()
    {
        return 'nova-timenow';
    }
}
