<?php

return [
    'paths' => ['api/*'],
    'allowed_methods' => ['*'],
    'allowed_origins' => [env('FRONTEND_URL', '*')],
    'allowed_headers' => ['*'],
    'supports_credentials' => false,
];
