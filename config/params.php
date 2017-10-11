<?php
/**
 * Параметры приложения.
 *
 * @version 1.0
 */

return [
    'adminEmail' => 'admin@example.com',
    'serverName' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://" . $_SERVER['HTTP_HOST'],
    'commentsOnPage' => 3,
    'seo' => [
        'title' => '',
        'keywords' => '',
        'description' => '',
    ],
    'social' => [
        'youtube' => [
            'link' => 'https://www.youtube.com/',
        ],
        'in' => [
            'link' => 'https://www.instagram.com',
        ],
        'twitter' => [
            'CONSUMER_KEY' => '',
            'CONSUMER_SECRET' => '',
            'access_token' => '',
            'access_token_secret' => '',
            'link' => 'https://twitter.com',
        ],
        'vk' => [
            'id' => '5743793',
            'secret' => 'tsQnLise5VbFunL9XvyB',
            'link' => 'https://vk.com',
        ],
        'google' => [
            'apiKey' => 'HvWQGOnpB7xDPPOjlYITLt41',
            'id' => '958948178208-ggv307dn1r0c3v3u0ublrnsma0p5chat.apps.googleusercontent.com',
        ],
        'weibo' => [
            'ClientID' => '35147913',
            'ClientSecret' => '33154ec4b10e31dcc841c294823e44f9',
        ],
        'facebook' => [
            'id' => '100387777116770',
            'secret' => 'db4b424382997f080b6a9465e0285af6',
            'link' => 'https://www.facebook.com',
        ],
        'yahoo' => [
            'applicationId' => 'vleaNF7a',
            'consumerKey' => 'dj0yJmk9NVg2b1dhN2NYWHRUJmQ9WVdrOWRteGxZVTVHTjJFbWNHbzlNQS0tJnM9Y29uc3VtZXJzZWNyZXQmeD01Yw--',
            'consumerSecret' => '302ff04299fa3fc3a886f32ae89c87b5cd1b8756',
        ],
    ],
];
