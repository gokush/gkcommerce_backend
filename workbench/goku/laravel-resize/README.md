# LaravelResize

## 文件缓存

文件缓存的作用是把处理过的图片保存在磁盘上，节省反复的CPU消耗。需要在两处配置，分别是配置文件和Apache or Nginx的重写。

```php
return array(
    'thumbers' => array(
        'd' => array(
            'cache' => 1, // 开启缓存
            'thumb_cache_path' => public_path('images/d/'), // 文件缓存的路径
```

laravel的URL重写配置文件默认适应文件缓存的要求，如果文件存在直接显示磁盘的图片文件。

```
<IfModule mod_rewrite.c>
    <IfModule mod_negotiation.c>
        Options -MultiViews
    </IfModule>

    RewriteEngine On

    # Redirect Trailing Slashes...
    RewriteRule ^(.*)/$ /$1 [L,R=301]

    # Handle Front Controller...
    RewriteCond %{REQUEST_FILENAME} !-d
    RewriteCond %{REQUEST_FILENAME} !-f
    RewriteRule ^ index.php [L]
</IfModule>
```