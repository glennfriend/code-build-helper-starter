# php-fixer-kos

## Description
- from https://github.com/OnrampLab/laravel-starter


## Execute

### Code Format
- 轉型
- 加上型別
- PHP 新版本相關的 refactor
- 將舊語法轉成新語法
```
TARGET_PROJECT="/your-target-project/Modules/Account/"
composer rector ${TARGET_PROJECT}
```

### Code Format
- use library to sort 
```
TARGET_PROJECT="/your-target-project/Modules/Account/"
composer insights:fix ${TARGET_PROJECT}
```

## php cs fixer
- 有包含破壞性重構, 可能會改壞程式碼 !
- vi phpcs.xml
- vi .php-cs-fixer.php
  - 設定要 fixer 的目錄

```
composer phpcs:fix-all
```
