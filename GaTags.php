<?php

namespace Statamic\Addons\Ga;

use Statamic\Extend\Tags;
use Statamic\API\User;

class GaTags extends Tags
{
    /**
     * The {{ ga }} tag
     *
     * @return string|array
     */
    public function index()
    {
        $tracking_id = $this->getConfig('tracking_id', 'UA-');
        $link_id = $this->getConfig('link_id', false);
        $async = $this->getConfig('async', false);
        $track_uid = $this->getConfig('track_uid', false);
        $beacon = $this->getConfig('beacon', false);

        if ($async)
        {
           // Async tracking
           $tracking_code = "<script>
               window.ga=window.ga||function(){(ga.q=ga.q||[]).push(arguments)};ga.l=+new Date;";
        } else {
            // Non async tracking
            $tracking_code = "<script>
                (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
                (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
                m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
                })(window,document,'script','https://www.google-analytics.com/analytics.js','ga');";
        }
		
		if ($beacon)
		{
            // Set tracking to beacon in browsers that support it
            $tracking_code .= "ga('set', 'transport', 'beacon');";
        }
        
        $tracking_code .= "ga('create', '" . $tracking_id . "', 'auto');";
        
        if ($link_id)
        {
        	// Use Enhanced link attribution if enabled
        	ga('require', 'linkid');
        }
        
        $tracking_code .= "ga('send', 'pageview');";

        if ($track_uid)
        {
        	$user = User::getCurrent();
        	if ($user)
        	{
        	    $user_id = $user->id();
                $tracking_code .= "ga('set', 'userId', " . $user_id  . ");";
            }
        }

	    $tracking_code .= "</script>";

	    if ($async)
        {
            // Async end tracking
            $tracking_code .= "<script async src='https://www.google-analytics.com/analytics.js'></script>";
        }

        return $tracking_code;
    }
}
