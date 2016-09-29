<?php
namespace FatFree\Consumer\Rabbitmq;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class BaseConsumer implements ConsumerInterface
{
    const DELIVERY_MODE = 2;

    /**
     * @var AMQPStreamConnection
     */
    protected $connection;

    /**
     * @var AMQPStreamConnection-channel
     */
    protected $channel;

    public function __construct($host = 'localhost', $port = 5672, $user = 'guest', $pass = 'guest')
    {
        $this->connection = new AMQPStreamConnection($host, $port, $user, $pass);
        $this->channel = $this->connection->channel();

        return $this;
    }

    public function listen($queueName, $callback)
    {
        /**
         * @param queue
         * @param passive
         * @param durable , make sure that RabbitMQ will never lose our queue if a crash occurs
         * @param exclusive - queues may only be accessed by the current connection
         * @param auto delete - the queue is deleted when all consumers have finished using it
         */
        $this->channel->queue_declare(
            $queueName,
            false,
            true,
            false,
            false
        );

        /**
         * don't dispatch a new message to a worker until it has processed and
         * acknowledged the previous one. Instead, it will dispatch it to the
         * next worker that is not still busy.
         * @param #prefetch size - prefetch window size in octets, null meaning "no specific limit"
         * @param #prefetch count - prefetch window in terms of whole messages
         * @param #global - global=null to mean that the QoS settings should apply per-consumer, global=true to mean that the QoS settings should apply per-channel
         */
        $this->channel->basic_qos(
            null,
            1,
            null
        );

        /**
         * indicate interest in consuming messages from a particular queue. When they do
         * so, we say that they register a consumer or, simply put, subscribe to a queue.
         * Each consumer (subscription) has an identifier called a consumer tag
         * @param queue namme
         * @param consumer tag - Identifier for the consumer, valid within the current channel. just string
         * @param no local - TRUE: the server will not send messages to the connection that published them
         * @param no ack, false - acks turned on, true - off.  send a proper acknowledgment from the worker, once we're done with a task
         * @param exclusive - queues may only be accessed by the current connection
         * @param no wait - TRUE: the server will not respond to the method. The client should not wait for a reply method
         * @param callback
         */
        $this->channel->basic_consume(
            $queueName,
            '',
            false,
            false,
            false,
            false,
            $callback
        );

        while (count($this->channel->callbacks)) {
            $this->channel->wait();
        }

        $this->channel->close();
        $this->connection->close();
    }


    /**
     * If a consumer dies without sending an acknowledgement the AMQP broker
     * will redeliver it to another consumer or, if none are available at the
     * time, the broker will wait until at least one consumer is registered
     * for the same queue before attempting redelivery
     */
    public static function redeliver(AMQPMessage $msg)
    {
        $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    }

    public static function flushJob()
    {
        ob_flush();
        flush();
    }

}

