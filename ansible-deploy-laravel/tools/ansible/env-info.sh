#!/bin/bash

echo `TZ=Asia/Taipei date "+%Z [%z] %Y-%m-%d %T"` && echo
pwd && echo
php -v && echo
echo "node version"
node --version && echo
ruby --version && echo

