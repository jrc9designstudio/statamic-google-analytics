<?php
return [
    'tracking_id' => 'Google Analytics Tracking ID',
    'tracking_id_instruct' => "Your Google Analytics Tracking ID. You can obtain this value from Google Analytics. It starts with 'UA-'",
    'async' => 'Async Tracking Code',
    'async_instruct' => 'Use the Async tracking code for Google Analytics. This can result in a small performance boost for modern browsers. You should only enable this if most users are using IE 9+. More Info: https://developers.google.com/analytics/devguides/collection/analyticsjs/',
    'track_uid' => 'Track UID',
    'track_uid_instruct' => 'Track users by their unique Statamic ID (when signed in). Note: you must enable User ID tracking on your Google Analytics property for this setting to have any effect.',
    'beacon' => 'Enable Beacon Transport',
    'beacon_instruct' => 'Enable beacon for transportation of data in modern browsers.',
    'link_id' => 'Enable Enhanced Link Attribution',
    'link_id_instruct' => 'Enhanced Link Attribution improves the accuracy of your In-Page Analytics report by automatically differentiating between multiple links to the same URL on a single page by using link element IDs. You must enable Enhanced Link Attribution in the Admin UI of your Google Analytics Account, see: https://support.google.com/analytics/answer/2558867#enable'
];
