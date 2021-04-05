<?php

return [
    'app' => [
        'title' => 'General',
        'desc' => 'All the general settings for application.',
        'icon' => 'fa fa-cog',
        'elements' => [
            [
                'name' => 'app_name', // unique name for field
                'label' => 'Home title', // you know what label it is
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
                'value' => 'Golo.' // default value if you want
            ],
            [
                'name' => 'home_description', // unique name for field
                'label' => 'Home description', // you know what label it is
                'type' => 'textarea', // input fields type
                'data' => 'string', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
                'value' => 'Golo is a Laravel Theme built on the Laravel 5.8 framework. With this theme, you can create your own City Travel Guide website with Points of Interest group by Categories (Sight, Restaurant, Drink, Shopping, Hotel, Fitness, Beaty, Activities...)' // default value if you want
            ],
            [
                'name' => 'logo', // unique name for field
                'label' => 'Logo', // you know what label it is
                'type' => 'file', // input fields type
                'data' => 'image', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
            ],

        ]
    ],
    'email' => [
        'title' => 'Email Settings',
        'desc' => 'Email received booking',
        'icon' => 'fa fa-envelope-o',
        'elements' => [
            [
                'name' => 'email_system',
                'type' => 'email',
                'label' => 'Email',
                'rules' => 'email',
            ]
        ]
    ],

    'mail_driver' => [
        'title' => 'SMTP Settings',
        'desc' => '',
        'icon' => 'fa fa-envelope-o',
        'elements' => [
            [
                'name' => 'mail_driver',
                'type' => 'text',
                'label' => 'Mail driver',
                'rules' => '',
                'value' => 'smtp'
            ],
            [
                'name' => 'mail_host',
                'type' => 'text',
                'label' => 'Mail host',
                'rules' => '',
                'value' => 'smtp.googlemail.com'
            ],
            [
                'name' => 'mail_port',
                'type' => 'text',
                'label' => 'Mail port',
                'rules' => '',
                'value' => '465'
            ],
            [
                'name' => 'mail_username',
                'type' => 'text',
                'label' => 'Mail username',
                'rules' => '',
            ],
            [
                'name' => 'mail_password',
                'type' => 'text',
                'label' => 'Mail password',
                'rules' => '',
            ],
            [
                'name' => 'mail_encryption',
                'type' => 'text',
                'label' => 'Mail encryption',
                'rules' => '',
                'value' => 'ssl'
            ],
            [
                'name' => 'mail_from_address',
                'type' => 'text',
                'label' => 'Mail from address',
                'rules' => '',
                'value' => 'hello@uxper.co'
            ],
            [
                'name' => 'mail_from_name',
                'type' => 'text',
                'label' => 'Mail from name',
                'rules' => '',
                'value' => 'uxper'
            ],

        ]
    ],

    'ads' => [
        'title' => 'Ads Settings',
        'desc' => '',
        'icon' => 'fa fa-external-link-square',
        'elements' => [
            [
                'name' => 'ads_sidebar_banner_image', // unique name for field
                'label' => 'Banner ads image', // you know what label it is
                'type' => 'file', // input fields type
                'data' => 'image', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
            ],
            [
                'name' => 'ads_sidebar_banner_link', // unique name for field
                'label' => 'Banner ads link', // you know what label it is
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
            ]
        ]
    ],

    'social_auth_facebook' => [
        'title' => 'Social login setting',
        'desc' => '',
        'icon' => 'fa fa-envelope-o',
        'elements' => [
            [
                'name' => 'facebook_app_id',
                'type' => 'text',
                'label' => 'Facebook App ID',
                'rules' => '',
            ],
            [
                'name' => 'facebook_app_secret',
                'type' => 'text',
                'label' => 'Facebook App Secret',
                'rules' => '',
            ],

            [
                'name' => 'google_app_id',
                'type' => 'text',
                'label' => 'Google App ID',
                'rules' => '',
            ],
            [
                'name' => 'google_app_secret',
                'type' => 'text',
                'label' => 'Google App Secret',
                'rules' => '',
            ],

        ]
    ],

    'homepage' => [
        'title' => 'Homepage Settings',
        'desc' => '',
        'icon' => 'fa fa-external-link-square',
        'elements' => [
            [
                'name' => 'home_banner', // unique name for field
                'label' => 'Home banner', // you know what label it is
                'type' => 'file', // input fields type
                'data' => 'image', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
            ],
            [
                'name' => 'home_banner_app', // unique name for field
                'label' => 'Home banner app', // you know what label it is
                'type' => 'file', // input fields type
                'data' => 'image', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
            ]
        ]
    ],

    'google' => [
        'title' => 'Google settings',
        'desc' => '',
        'icon' => 'fa fa-external-link-square',
        'elements' => [
            [
                'name' => 'goolge_map_api_key', // unique name for field
                'label' => 'Google Map API Key', // you know what label it is
                'type' => 'text', // input fields type
                'data' => 'string', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
            ],
        ]
    ],

    'Theme' => [
        'title' => 'Theme settings',
        'desc' => '',
        'icon' => 'fa fa-external-link-square',
        'elements' => [
            [
                'name' => 'style_rtl', // unique name for field
                'label' => 'RTL', // you know what label it is
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
                'options' => [
                    '0' => 'Disable',
                    '1' => 'Enable'
                ]
            ],

            [
                'name' => 'template', // unique name for field
                'label' => 'Template', // you know what label it is
                'type' => 'select', // input fields type
                'data' => 'string', // data type, string, int, boolean, image
                'rules' => '', // validation rule of laravel
                'options' => [
                    '01' => 'Template 01 (City guide)',
                    '02' => 'Template 02 (Business listing)'
                ]
            ],

        ]
    ],


];
