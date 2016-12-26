<?php

namespace Statamic\Addons\Ga;

use Statamic\Extend\Tags;

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
        $async = $this->getConfig('async', false);

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

        $tracking_code .= "ga('create', '" . $tracking_id . "', 'auto');";
        $tracking_code .= "ga('send', 'pageview');";

	    $tracking_code .= "</script>";

	    if ($async)
        {
            // Async end tracking
            $tracking_code .= "<script async src='https://www.google-analytics.com/analytics.js'></script>";
        }

        return $tracking_code;
    }
}
