<?php

namespace Statamic\Addons\Ga;

use Statamic\API\Nav;
use Statamic\Extend\Listener;

class GaListener extends Listener
{
    public $events = [
        'cp.nav.created' => 'addNavItems'
    ];

    public function addNavItems($nav)
    {
        $store = Nav::item('Google Analytics')->route('addon.settings', 'ga')->icon('line-graph');
        $nav->addTo('configure', $store);
    }
}
