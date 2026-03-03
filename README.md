# Yii-HandsOn
1.1.15と1.1.32でCRUDアプリを作成予定

## 起動
```
docker compose up -d --build
```

## データベースコマンド

### データベースに入る
1.1.15
```
docker compose exec db57 mysql -u yii -p
```

1.1.32
```
docker compose exec db80 mysql -u yii -p
```

### パスワード
```
yii
```

### DB選択
1.1.15
```
use yii115;
```

1.1.32
```
use yii132;
```

### テーブル一覧確認
```
SHOW TABLES;
```

### userテーブルの構造を見る
```
DESCRIBE user;
```





