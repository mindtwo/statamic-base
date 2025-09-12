<?php require_once('Envoy.config.php'); ?>

@servers($envoy_servers)

@task('list', ['on' => 'local'])
    RED='\033[0;31m'
    GREEN='\033[0;32m'
    HEADING='\033[7;38m'
    HEADING_RED='\033[7;31m'
    HEADING_YELLOW='\033[7;33m'
    HEADING_GREEN='\033[7;32m'
    NC='\033[0m' # No Color
    BANNER='\033[0m' # No Color

    printf "
    ${NC}----------------------------------------------------------------------------------------${NC}\n
    ${NC}Lovingly brought to you by mindtwo GmbH (https://www.mindtwo.de/) ----------------------${NC}\n
    ${NC}----------------------------------------------------------------------------------------${NC}\n
    ${BANNER} _____ ______    ___   ________    ________   _________   ___       __    ________ ${NC}\n
    ${BANNER}|\   _ \  _   \ |\  \ |\   ___  \ |\   ___ \ |\___   ___\|\  \     |\  \ |\   __  \ ${NC}\n
    ${BANNER}\ \  \\\\\\\\\__\ \  \\\\\\ \  \\\\\\ \  \\\\\\ \  \\\\\\ \  \_|\ \\\\\|___ \  \_|\ \  \    \ \  \\\\\\ \  \|\  \ ${NC}\n
    ${BANNER} \ \  \\\\\|__| \  \\\\\\ \  \\\\\\ \  \\\\\\ \  \\\\\\ \  \ \\\\\\ \    \ \  \  \ \  \  __\ \  \\\\\\ \  \\\\\\\\\  \ ${NC}\n
    ${BANNER}  \ \  \    \ \  \\\\\\ \  \\\\\\ \  \\\\\\ \  \\\\\\ \  \_\\\\\\ \    \ \  \  \ \  \|\__\_\  \\\\\\ \  \\\\\\\\\  \ ${NC}\n
    ${BANNER}   \ \__\    \ \__\\\\\\ \__\\\\\\ \__\\\\\\ \__\\\\\\ \_______\    \ \__\  \ \____________\\\\\\ \_______\ ${NC}\n
    ${BANNER}    \|__|     \|__| \|__| \|__| \|__| \|_______|     \|__|   \|____________| \|_______| ${NC}\n
    ${NC}\n
    ";

    printf "${HEADING}[local tasks] --------------------------------------------------------------------------${NC}\n";
    echo 'envoy run pull_db_from_staging --env=staging';
    echo 'envoy run download_uploads --env=production';
    echo 'envoy run download_uploads --env=staging';
    printf "${NC}----------------------------------------------------------------------------------------\n";
@endtask

@task('download_uploads', ['on' => 'local'])
    echo "Starting downloading files from {{ $env }} to local...";
    rsync -rcv {{ $rsync_excludes }} -e "ssh -p {{ $servers[$env]['port'] }}" {{ sprintf("%s@%s",$servers[$env]['username'], $servers[$env]['host']) }}:{{ $servers[$env]['path_root'] }}storage/app/public/uploads storage/app/public;
    printf "\033[0;32m✅ Downloading files from {{ $env }} to local was successfully!\033[0m\n";
@endtask

@task('pull_db_from_staging', ['on' => 'local'])
    echo "Starting DB pull from {{ $env }}...";
    ssh -p {{ $servers[$env]['port'] }} -l {{ $servers[$env]['username'] }} {{ $servers[$env]['host'] }} "mysqldump --single-transaction --quick -h{{ getenv('DB_STAGING_HOST') }} -u{{ getenv('DB_STAGING_USERNAME') }} {{ !empty(getenv('DB_STAGING_PASSWORD')) ? '-p' . getenv('DB_STAGING_PASSWORD') : '' }} {{ getenv('DB_STAGING_DATABASE') }}" > ./database/sync.sql;

    @foreach($db_replacements['local'] as $key => $domain)
        echo "SQL Dump string replacement: '{{ $db_replacements[$env][$key] }}' to '{{ $domain }}'...";
        LANG=C LC_ALL=C sed 's#{{ addcslashes($db_replacements[$env][$key], '.') }}#{{ $domain }}#g' ./database/sync.sql > ./database/sync_tmp.sql && mv ./database/sync_tmp.sql ./database/sync.sql
    @endforeach

    mysql -h {{ getenv('DB_HOST') }} -u{{ getenv('DB_USERNAME') }} {{ !empty(getenv('DB_PASSWORD')) ? '-p' . getenv('DB_PASSWORD') : '' }} {{ getenv('DB_DATABASE') }} < ./database/sync.sql;
    printf "\033[0;32m✅ DB pull from {{ $env }} to local was successful!\033[0m\n";
@endtask
