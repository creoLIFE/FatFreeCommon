<?php
namespace FatFree\Worker\Rabbitmq;

use PhpAmqpLib\Message\AMQPMessage;

interface WorkerInterface
{
    public function __construct($host, $port, $user, $pass);

    public function publish(AMQPMessage $message, $queueName, $exchange);
}

