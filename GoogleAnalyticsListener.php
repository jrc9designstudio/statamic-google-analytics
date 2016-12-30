<?php

namespace Statamic\Addons\GoogleAnalytics;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class GoogleAnalyticsListener extends Listener
{
    public $events = [
        'cp.nav.created' => 'addNavItems'
    ];

    public function addNavItems($nav)
    {
        $store = Nav::item('Google Analytics')->route('addon.settings', 'google-analytics')->icon('line-graph');
        $nav->addTo('configure', $store);
    }
}
