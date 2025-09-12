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
        'host' => '',
        'port' => 22,
        'path_root' => '',
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
        'http://{{DOMAIN}}.test',
        '{{DOMAIN}}.test',
    ],
    'staging' => [
        'https://{{DOMAIN}}.mindtwo.dev',
        '{{DOMAIN}}.mindtwo.dev',
    ],
    'production' => [
        'https://{{DOMAIN}}.com',
        '{{DOMAIN}}.com',
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
