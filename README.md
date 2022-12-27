# medeco

## Development

### Dependencies

- PHP v8.1.13[homebrew]([https://blog-and-destroy.com/29755](https://blog-and-destroy.com/29755))
- [Docker Desktop]([https://www.docker.com/products/docker-desktop/](https://www.docker.com/products/docker-desktop/))
- Laravel v9.45.1
  - `$ brew link --force php@8.1`
- node ^14.18.0 || >=16.0.0

### Backend

**Laravel Sail**

```
$ cd app
$ ./vendor/bin/sail up -d
```

下記コードを `~/.zshrc` に追記すると `$ sail` コマンドが使える

```
alias sail='[ -f sail ] && bash sail || bash vendor/bin/sail'
```

- `sail up -d` #起動
- `sail stop`
- `sail -v`
- `sail artisan -v`
- `sail php --version` #PHPのバージョン確認
- `sail composer -V` #Composerのバージョン確認
- `sail shell` #コンテナに接続
- `sail mysql` #MySQLに接続
- `sail down --volumes --rmi all --remove-orphans` #環境の削除


### Frontend

- Bootstrap 5.2.3 [Cheatsheet](https://getbootstrap.com/docs/5.3/examples/cheatsheet/)

```
$ sail npm run dev # dev
$ sail npm run dev # build (publish)
```

### Staging

https://medeco.nuttyengine.com/

BASIC: