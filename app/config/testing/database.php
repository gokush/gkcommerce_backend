<?php
return array(

    'default' => 'sqlite',

    'connections' => array(

        'sqlite' => array(
            'driver'   => 'sqlite',
            'database' => ':memory:', // this will do the trick ;)
            'prefix'   => '',
        ),
    ),
);
