# neteasy-yunxin

---
[网易云信](https://www.163yun.com/help/documents/18132200658681856) 服务端sdk for Laravel6 / Lumen. based on [laozhangren/neteasy-yunxin](https://github.com/PINKONG/neteasy-yunxin).
在此包基础上修复了一些小东西，仅在laravel6中测试可用

## Installation

Require this package with composer by using the following command:

```
$ composer require laozhangren/neteasy-yunxin
```

Then, add the service provider:

If you are using Laravel, add the service provider to the providers array in `config/app.php`:

```php
[
    'providers' => [
        LaoZhangRen\YunXin\YunXinServiceProvider::class,
    ],
]
```

as optional, you can use facade:
```php
    'aliases' => [
        'YunXinHelper' => LaoZhangRen\YunXin\YunXinHelper::class,
    ],

```

If you are using Lumen, append the following code to `bootstrap/app.php`:

```php
$app->register(LaoZhangRen\YunXin\YunXinServiceProvider::class);
```


## Configuration

The defaults are set in config/yunxin.php. Copy this file to your own config directory to modify the values. You can publish the config using this command:

```php
php artisan vendor:publish --provider="LaoZhangRen\YunXin\YunXinServiceProvider"

```

If you are using Lumen, append the following code to `bootstrap/app.php`:

```php
$app->configure('yunxin');
```

## Usage
### 用户
```
# 创建用户
YunXinHelper::user()->create($accid, $name, $icon);


# 用户基本信息更新
YunXinHelper::user()->update($accid, $token);


# 封禁用户
YunXinHelper::user()->block($accid);


# 解禁用户
YunXinHelper::user()->unblock($accid);


# 更新用户名片
YunXinHelper::user()->updateUserInfo($accid, $name, $icon);


# 批量获取用户名片
YunXinHelper::user()->getUserInfos($accids);
```

### 消息功能
```
# 文本消息
YunXinHelper::chat()->sendTextMsg($accidFrom, $to, $open, $text);

# 图片消息
YunXinHelper::chat()->sendPictureMsg($accidFrom, $to, $open,
        $picName, $picMD5, $picUrl, $picExt, $picWidth, $picHeight, $picSize);

# 批量文本消息
YunXinHelper::chat()->sendTextBatchMsg($accidFrom, $accidsTo, $text);


# 发送自定义系统通知
YunXinHelper::chat()->sendAttachMsg($from, CHAT::CHAT_ONT_TO_ONE, $to, $attach);
```

## License

The package is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT).


