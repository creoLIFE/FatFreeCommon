<?php
namespace FatFree\Worker;

use PhpAmqpLib\Connection\AMQPStreamConnection;
use PhpAmqpLib\Message\AMQPMessage;

class BaseWorker implements WorkerInterface
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

    /**
     * Execute consumer.
     */
    /*
    public function execute()
    {
        $message = new AMQPMessage(
            '',
            array('delivery_mode' => 2) # make message persistent, so it is not lost if server crashes or quits
        );

        $this->publish(
            $message,
            'testQueue',
            ''
        );
    }
    */

    public function publish(AMQPMessage $message, $queueName, $exchange = '')
    {
        /**
         * @param queue
         * @param passive
         * @param durable , make sure that RabbitMQ will never lose our queue if a crash occurs
         * @param exclusive - queues may only be accessed by the current connection
         * @param auto delete - the queue is deleted when all consumers have finished using it
         */
        $this->channel->queue_declare($queueName, false, true, false, false);

        /**
         * indicate interest in consuming messages from a particular queue. When they do
         * so, we say that they register a consumer or, simply put, subscribe to a queue.
         * Each consumer (subscription) has an identifier called a consumer tag
         * @param message
         * @param exchange
         * @param routing key (queue)
         */
        $this->channel->basic_publish(
            $message,
            $exchange,
            $queueName
        );
    }

    public function shutDown(){
        $this->channel->close();
        $this->connection->close();
    }

}

