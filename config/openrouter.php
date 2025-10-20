<?php

return [
    'api_key' => env('OPENROUTER_API_KEY', ''),
    'model' => 'deepseek/deepseek-chat', // Ou 'deepseek/deepseek-r1:free' pour la version gratuite
    'base_url' => 'https://openrouter.ai/api/v1',
];