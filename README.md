# RabbitMQLaravel

[![Latest Stable Version](https://poser.pugx.org/kontoulis/rabbitmq-laravel/v/stable)](https://packagist.org/packages/kontoulis/rabbitmq-laravel)
[![Latest Unstable Version](https://poser.pugx.org/kontoulis/rabbit-manager/v/unstable)](https://packagist.org/packages/kontoulis/rabbitmq-laravel)
[![License](https://poser.pugx.org/kontoulis/rabbit-manager/license)](https://packagist.org/packages/kontoulis/rabbitmq-laravel)
## Install

Via Composer

``` bash
$ composer require kontoulis/rabbitmq-laravel
```

Add the Service Provider to config/app.php

``` php
Kontoulis\RabbitMQLaravel\RabbitMQLaravelServiceProvider::class,
```
Add the RabbitMQ facade to config/app.php

``` php
'RabbitMQ' => Kontoulis\RabbitMQLaravel\Facades\RabbitMQ::class,
```

Publish the configuration file and edit it if needed in config/rabbitmq-laravel.php
``` bash
$ php artisan vendor:publish
```
Add following configuration to .env file
```bash
RABBITMQ_HOST=127.0.0.1
RABBITMQ_PORT=5672
RABBITMQ_VHOST=/
RABBITMQ_LOGIN=guest
RABBITMQ_PASSWORD=guest
RABBITMQ_QUEUE=myqueue
```

## Usage
- Publish Message to queue

With Dependency injection
``` php
function __construct(RabbitMQ $rabbitMQ){
$this->rabbitMQ = $rabbitMQ;
// Overide the default queueName
$this->rabbitMQ->setQueue("MyNewQueueName");
$this->rabbitMQ->sendMessage(json_encode($anArray));

```
As a Facade
``` php
// Overide the default queueName
RabbitMQ::setQueue("MyNewQueueName");
RabbitMQ->sendMessage(json_encode($anArray));

```
- Listen to queue (not recommended to listen on an HTTP request. Check the standalone [rabbit-manager](https://github.com/kontoulis/rabbit-manager)

You need to extend the Kontoulis\RabbitMQLaravel\Handlers\Handler; or use the DefaultHandler just to echo the message

``` php
// If you don't provide a handler and/or a queueName, the defaults will be used
RabbitMQ::listenToQueue("Path\\To\\My\\Handler", "queueName");

```


## License

The MIT License (MIT). Please see [LICENCE.md](LICENSE.md) for more information.

[ico-version]: https://img.shields.io/packagist/v/league/:package_name.svg?style=flat-square
[ico-license]: https://img.shields.io/badge/license-MIT-brightgreen.svg?style=flat-square
[ico-travis]: https://img.shields.io/travis/thephpleague/:package_name/master.svg?style=flat-square
[ico-scrutinizer]: https://img.shields.io/scrutinizer/coverage/g/thephpleague/:package_name.svg?style=flat-square
[ico-code-quality]: https://img.shields.io/scrutinizer/g/thephpleague/:package_name.svg?style=flat-square
[ico-downloads]: https://img.shields.io/packagist/dt/league/:package_name.svg?style=flat-square
