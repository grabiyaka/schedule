<?php

return [

        /////////////////////////////////POST

        'get_events' => 'api/get_events',

        'add_shedule' => 'api/add_shedule',
    
        'get_schedule' => 'api/get_schedule',
        ////////////////////////////////

    'admin/([0-9]+)-([0-9]+)-([0-9]+)' => 'admin/schedule/$1/$2/$3',
    'admin' => 'admin/index',

    'user/autorisation' => 'user/autorisation',
    'user/registration' => 'user/registration',
    'user/exit' => 'user/exit',

    '([0-9]+)-([0-9]+)-([0-9]+)' => 'site/index/$1/$2/$3',

    
    '' => 'site/forwarding',


];

