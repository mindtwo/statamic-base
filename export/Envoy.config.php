<?php

require_once realpath(__DIR__.'/vendor/autoload.php');

/**
 * enable dot env support
 */
try {
    Dotenv\Dotenv::createUnsafeImmutable(__DIR__)->safeLoad();
} catch (\Dotenv\Exception\InvalidFileException $e) {
    exit('The environment file is invalid: '.$e->getMessage());
}

/**
 * set timezone
 *
 * @example 'UTC'
 */
date_default_timezone_set('UTC');

/**
 * servers configuration
 */
$servers = [
    'local' => [
        'host' => 'localhost',
        'path_root' => './',
    ],
    'staging' => [
        'append_conf' => true,
        'username' => 'forge',
        'host' => '91.98.44.131',
        'port' => 22,
        'path_root' => '/home/forge/sunhorse.mindtwo.dev/',
    ],
];

/**
 * set env or default
 *
 * @example 'staging'
 */
$env = isset($env) ? $env : 'staging';

/**
 * setup domains for migrate db replacement
 */
$db_replacements = [
    'local' => [
        'http://sunhorse.test',
        'sunhorse.test',
    ],
    'staging' => [
        'https://sunhorse.mindtwo.dev',
        'sunhorse.mindtwo.dev',
    ],
    'production' => [
        'https://sunhorse.net',
        'sunhorse.net',
    ],
];

/**
 * exclude files for rsync actions
 *
 * @example '.DS_Store,.AppleDouble,.LSOverride,.Trashes,.Spotlight-V100,.idea,.git'
 */
$rsync_excludes = collect([
    '*.css.map',
    '.DS_Store',
    '.AppleDouble',
    '.LSOverride',
    '.Trashes',
    '.Spotlight-V100',
    '.idea',
    '.git',
])->map(function ($item) {
    return sprintf('--exclude="%s"', $item);
})->implode(' ');

/**
 * format servers array to work with envoy
 */
$envoy_servers = collect($servers)->transform(function ($server) {
    $server = collect($server);

    return collect([])
        ->push($server->get('append_conf') ? '-A' : '')
        ->push($server->get('username') ? $server->get('username').'@'.$server->get('host') : $server->get('host'))
        ->push($server->get('port') ? '-p '.$server->get('port') : '')
        ->filter()
        ->implode(' ');
})->toArray();
