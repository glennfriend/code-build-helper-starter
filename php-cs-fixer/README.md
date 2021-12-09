
# php-cs-fixer


## composer install
- https://packagist.org/packages/friendsofphp/php-cs-fixer
- docker-compose exec 'php7' composer require --dev friendsofphp/php-cs-fixer:2.19.3

## composer.json
```json
{
  "scripts": {
    "php-cs-fixer":       "vendor/bin/php-cs-fixer --diff fix",
    "php-cs-fixer-debug": "vendor/bin/php-cs-fixer fix --using-cache=no"
  }
}
```

## php-cs-rule script install
- copy default.php_cs  ../../.php_cs
- copy dev.php_cs      ../../.php_cs

## rule document
- https://cs.symfony.com/doc/rules/

## phpstorm solution
- https://www.jetbrains.com/help/phpstorm/using-php-cs-fixer.html#installing-configuring-php-cs-fixer
```
(1)
phpstorm > Settings > Tools > External Tool > 建立你的指令
  [Tool Settings]
    Program:            composer
    Arguments:          php-cs-fixer $FilePath$
    Working directory:  $ProjectFileDir$

tips
  working directory 已正確設定的時候
  $FilePath$ 可以換成 $FilePathRelativeToProjectRoot$

result
  composer php-cs-fixer /var/www/laravel/app/Model/User.php

(2)
phpstorm > Settings > Keymap > External Tools > 選你已建立的
  建立快速鍵

```
