<?php
/**
 * Package : RabbitMQ Laravel
 * User: kontoulis
 * Date: 12/9/2015
 * Time: 1:24 μμ
 */
return [
// AMPQ Connection settigns for RabbitMQ
	'amqp_host' => env('RABBITMQ_HOST', 'localhost'),
	'amqp_port' => env('RABBITMQ_PORT', 5672),
	'amqp_user' => env('RABBITMQ_LOGIN', 'guest'),
	'amqp_pass' => env('RABBITMQ_PASSWORD', 'guest'),
	'amqp_vhost' => env('RABBITMQ_VHOST', '/'),
	'amqp_queue' => env('RABBITMQ_QUEUE', 'MyQueue')
];
