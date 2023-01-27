# shany-ledger-backend

## 各種情報
### API
URL: http://localhost:8000/

### MAIL
URL: http://localhost:8025/

## 構築手順
```shell
cp src/.env.example src/.env
docker composer exec api composer install
docker composer exec api php artisan migrate
docker composer exec api php artisan ide-helper:generate
docker composer exec api php artisan ide-helper:models -N
docker composer exec api php artisan ide-helper:meta
docker composer exec api php artisan queue:listen
```

TODO:
- メールのレイアウト変更
- メール送信にキューを使用するかしないか検討
- そもそもキューを利用するかしないかを検討（色々大変そうなため）
