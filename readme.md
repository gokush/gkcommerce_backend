## Laravel PHP Framework

### 创建数据库

`CREATE DATABASE IF NOT EXISTS gkcommerce DEFAULT CHARSET utf8 COLLATE utf8_general_ci;`

### OAuth

```
curl http://127.0.0.1:8000/oauth/access_token -X POST -d "grant_type=password&username=cj&password=cj&client_id=client2id&client_secret=client2secret"
```

### 调试

```
php artisan db:seed
php artisan db:seed --class=ClientsTableSeeder
```

#### 使用Access token

使用curl请求资源

```
curl http://127.0.0.1:8000/api/address/ -H "Authorization: OAUTH_TOKEN" -v
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

[![Build Status](https://travis-ci.org/laravel/framework.svg)](https://travis-ci.org/laravel/framework)
[![Total Downloads](https://poser.pugx.org/laravel/framework/downloads.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Stable Version](https://poser.pugx.org/laravel/framework/v/stable.svg)](https://packagist.org/packages/laravel/framework)
[![Latest Unstable Version](https://poser.pugx.org/laravel/framework/v/unstable.svg)](https://packagist.org/packages/laravel/framework)
[![License](https://poser.pugx.org/laravel/framework/license.svg)](https://packagist.org/packages/laravel/framework)

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable, creative experience to be truly fulfilling. Laravel attempts to take the pain out of development by easing common tasks used in the majority of web projects, such as authentication, routing, sessions, and caching.

Laravel aims to make the development process a pleasing one for the developer without sacrificing application functionality. Happy developers make the best code. To this end, we've attempted to combine the very best of what we have seen in other web frameworks, including frameworks implemented in other languages, such as Ruby on Rails, ASP.NET MVC, and Sinatra.

Laravel is accessible, yet powerful, providing powerful tools needed for large, robust applications. A superb inversion of control container, expressive migration system, and tightly integrated unit testing support give you the tools you need to build any application with which you are tasked.

## Official Documentation

Documentation for the entire framework can be found on the [Laravel website](http://laravel.com/docs).

### Contributing To Laravel

**All issues and pull requests should be filed on the [laravel/framework](http://github.com/laravel/framework) repository.**

### License

The Laravel framework is open-sourced software licensed under the [MIT license](http://opensource.org/licenses/MIT)
