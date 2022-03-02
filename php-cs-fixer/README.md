
# php-cs-fixer


## composer install
- https://packagist.org/packages/friendsofphp/php-cs-fixer
- docker-compose exec 'php7' composer require --dev friendsofphp/php-cs-fixer:^3.4

## composer.json
```json
{
  "scripts": {
    "php-cs-fixer":       "vendor/bin/php-cs-fixer fix ",
    "php-cs-fixer-debug": "vendor/bin/php-cs-fixer --dry-run --diff fix --using-cache=no "
  }
}
```

## php-cs-rule script install
- copy default.php-cs-fixer.php  .php-cs-fixer.php
- copy dev.php-cs-fixer.php      .php-cs-fixer.php

## rule document
- https://cs.symfony.com/doc/rules/

## phpstorm solution
- https://www.jetbrains.com/help/phpstorm/using-php-cs-fixer.html#installing-configuring-php-cs-fixer
```
(1)
phpstorm > Settings > Tools > External Tool > 建立你的指令
  [Tool Settings] 
    Program:            composer
    Arguments:          php-cs-fix $FilePath$
    Working directory:  $ProjectFileDir$
    -> for 專案的方式

  [Tool Settings]
    Program:            php-cs-fixer
    Arguments:          --diff --using-cache=no fix $FilePathRelativeToProjectRoot$
    Working directory:  $ProjectFileDir$
    -> for 你個人, 全域的方式
    -> 目前我用的方式

  [Tool Settings]
    Program:            COMPOSER='/home/ubuntu/tool/php-cs-fixer/composer.json' composer
    Arguments:          php-cs-fix $FilePathRelativeToProjectRoot$
    Working directory:  $ProjectFileDir$
    -> 該方法不行

tips
  working directory 已正確設定的時候
  $FilePath$ 可以換成 $FilePathRelativeToProjectRoot$

result example
  composer php-cs-fixer /var/www/laravel/app/Model/User.php

(2)
phpstorm > Settings > Keymap > External Tools > 選你已建立的
  建立快速鍵

```
