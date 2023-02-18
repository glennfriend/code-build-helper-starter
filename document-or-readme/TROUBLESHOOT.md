# Troubleshooting

<details>
<summary><strong>Accounts 無法讀取</strong></summary>

```
/google-adwords/campaigns/analysis
無法讀取

/setting
將 Accounts 只留下有在使用的
依照 README.md "Create ElasticSearch search index"
執行 command line

確認 ElasticSearch index 有建立起來即可
```
</details>

<details>
<summary><strong>測試 Auth for JWT 失敗</strong></summary>

```
  > docker-compose run 'php7' php vendor/bin/phpunit --filter AuthControllerTest

    There were 2 failures:
    
    1) Modules\Auth\Tests\Unit\Http\Controllers\AuthControllerTest::logout_should_invalid_the_token
      Expected status code 200 but received 500.
      Failed asserting that 200 is identical to 500.
    
    2) Modules\Auth\Tests\Unit\Http\Controllers\AuthControllerTest::refresh_should_get_a_new_token
      Expected status code 200 but received 500.
      Failed asserting that 200 is identical to 500.

  請參考  
    https://jwt-auth.readthedocs.io/en/develop/laravel-installation/
  
  或是直接更新 .env.testing 內容  
    JWT_SECRET=xxxxxxxxxxxxxxx
    JWT_TTL=120
```
</details>

<details>
<summary><strong>apidoc JWT Authorization 過渡時期方案</strong></summary>

```js
;javascript:(function(){
    let $els = document.getElementsByTagName('input');
    let token = JSON.parse(localStorage.getItem('session')).api_token;
    for (let key in $els) {
        if (! $els.hasOwnProperty(key)) {
            continue;
        }
        let el = $els[key];
        if (el.id !== 'sample-request-header-field-Authorization') {
            continue;
        }
        el.value = 'bearer ' + token;
    }
})();
void(0);
```
</details>

