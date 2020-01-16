# apidoc

## feature
- 產生 api document 文件

## install
- npm install apidoc apidoc-plugin-json -g

## vi package.json
```
{
  "scripts": {
    "apidoc": "apidoc -i ./Modules/ -o ./public/apidoc && google-chrome http://127.0.0.1:3000/apidoc/ &"
  }
}
```

## test only
apidoc -i ./sample/ -o ./public/apidoc
php -S 127.0.0.1:8008 -t public/apidoc
google-chrome http://127.0.0.1:8008/apidoc/

