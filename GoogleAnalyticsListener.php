<?php

namespace Statamic\Addons\GoogleAnalytics;

use Statamic\API\Nav;
use Statamic\API\User;
use Statamic\Extend\Listener;

class GoogleAnalyticsListener extends Listener
{
    public $events = [
        'cp.nav.created' => 'addNavItems'
    ];

    /**
     * @param \Statamic\CP\Navigation\Nav $nav
     */
    public function addNavItems($nav)
    {
        $user = User::getCurrent();
        if ($user && $user->isSuper()) {
            $store = Nav::item('Google Analytics')->route('addon.settings', 'google-analytics')->icon('line-graph');
            $nav->addTo('tools', $store);
        }
    }
}
