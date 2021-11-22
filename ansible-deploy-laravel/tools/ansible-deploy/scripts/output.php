#!/usr/bin/env php
<?php
declare(strict_types = 1);
date_default_timezone_set("Asia/Taipei");


if (! isset($argv) ) {
    echo '{}';
}
if (! is_array($argv) ) {
    echo '{}';
}

$createdAt = date('c');

// print_r($argv);
echo <<<"EOD"
{
    'date': '{$createdAt}'
}
EOD;
// file_put_contents('output.log' , '...');