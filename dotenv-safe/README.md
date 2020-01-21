# dotenv-safe

## feature
- 比對專案裡面 .env 與 .env.example 的差異並且提醒 developer

## install
- npm install --save dotenv-safe
- yarn add dotenv-safe

## vi package.json
```
{
  "scripts": {
    "env-check": "./tools/dotenv-safe/dotenv-check"
  }
}
```

## command line example
```
node tools/dotenv-safe/dotenv-check
TOKEN=test  node tools/dotenv-safe/dotenv-check
```

## 使用時機 (參考)
1. 如果是 localhost, 你可以在 git pull 的時候自動執行來提示
1. 如果是 CI deploy, 檢查線上 .env & .env.example 不同的時候使其發佈失敗, 重新編輯 production .env 之後再重新 deploy

## 參考
- https://www.npmjs.com/package/dotenv-safe
