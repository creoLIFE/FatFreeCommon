<?php
namespace FatFree\Consumer\Rabbitmq;

use PhpAmqpLib\Message\AMQPMessage;

interface ConsumerInterface
{
    public function __construct($host, $port, $user, $pass);

    public function listen($queueName, $callback);

    public static function redeliver(AMQPMessage $msg);

    public static function flushJob();
}

