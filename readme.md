# Goku电商

[![Gitter](https://badges.gitter.im/Join%20Chat.svg)](https://gitter.im/gokush/gkcommerce_backend?utm_source=badge&utm_medium=badge&utm_campaign=pr-badge&utm_content=badge)

Goku电商是一个包含完整REST API的电子商务网站，使用PHP语言编写，基于MIT协议。

Goku电商的目标是开发一个易于使用和商业自由的购物车应用，

## 目标

- 完整的REST HTTP API
- 易用
- 社区驱动开发和技术支持

## 状态

开发中 (10%)

## 需求

- PHP 5.4+
- Laravel 4.2
- MySQL
- zircote/swagger-php
- jlapp/swaggervel
- lucadegasperi/oauth2-server-laravel

## 开发需求

- phpunit

## 安装步骤

创建数据库

```
CREATE DATABASE IF NOT EXISTS gkcommerce DEFAULT CHARSET utf8 COLLATE utf8_general_ci;
```

安装mysql表

```
$ php artisan migrate
```

## 开发指南

安装调试数据

```
php artisan db:seed
php artisan db:seed --class=ClientsTableSeeder
```

## API

### 地址

#### 获得用户的所有地址

GET /api/address

#### 获得用户的某一条地址

GET /api/address/{id}

#### 新增一个地址

POST /api/address

#### 删除一个地址

DELETE /api/address/{id}

### 结算

### 购物车

### 分类

### 商品

### 用户

#### 获得用户信息

GET /api/user/{id}

#### 获得用户头像

POST /user/avatar/

#### 获得用户header photo

POST /user/header_photo/

### 注册用户

#### 获取注册的验证码

GET /api/signup/verfication

#### 注册用户

POST /api/signup

## OAuth

```
curl http://127.0.0.1:8000/oauth/access_token -X POST -d "grant_type=password&username=cj&password=cj&client_id=client2id&client_secret=client2secret"
```

### Access token


**通过header发送**

```
curl http://127.0.0.1:8000/api/ -H "Authorization: OAUTH_TOKEN"
```

**通过参数**

```
curl http://127.0.0.1:8000/api/?access_token=OAUTH_TOKEN
```

### 错误信息格式

```
{
	"message": "",
	"errors": [
		{
			"resource": "Address",
			"field": "name",
			"code": "Required",
			"message": "这个字段是必须的"
		}
	]
}
```

## License

Released under the MIT license. See LICENSE.txt for details.