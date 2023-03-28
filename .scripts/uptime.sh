#!/bin/bash
set -e

result=$(curl -H "Authorization: Bearer $DO_TOKEN" https://api.digitalocean.com/v2/uptime/checks/$TGA_UPTIME_ID/state | jq .state.regions.se_asia.status)

echo $result

if [ $result == '"UP"' ];
then
    echo $result
else
    systemctl restart nginx
    systemctl restart php8.1-fpm
fi
