<?php

namespace Analytics\Segmentio\Consumer;

/**
 * Class AbstractConsumer
 * @package Segment\Consumer
 */
abstract class AbstractConsumer implements ConsumerInterface
{

    /**
     * @var string
     */
    protected $type = "Consumer";

    /**
     * @var array
     */
    protected $options;

    /**
     * @var string
     */
    protected $secret;


    /**
     * Store our secret and options as part of this consumer
     *
     * @param string $secret
     * @param array $options
     */
    public function __construct($secret, $options = array())
    {
        $this->secret = $secret;
        $this->options = $options;
    }

    /**
     * {@inheritdoc}
     *
     */
    public function __destruct() {}


    /**
     * Check whether debug mode is enabled
     * @return boolean
     */
    protected function debug()
    {
        return isset($this->options["debug"]) ? $this->options["debug"] : false;
    }


    /**
     * Check whether we should connect to the API using SSL. This is enabled by
     * default with connections which make batching requests. For connections
     * which can save on round-trip times, you may disable it.
     * @return boolean
     */
    protected function ssl()
    {
        return isset($this->options["ssl"]) ? $this->options["ssl"] : true;
    }


    /**
     * On an error, try and call the error handler, if debugging output to
     * error_log as well.
     *
     * @param  string $code
     * @param  string $msg
     */
    protected function handleError($code, $msg)
    {

        if (isset($this->options['error_handler'])) {
            $handler = $this->options['error_handler'];
            $handler($code, $msg);
        }

        if ($this->debug()) {
            error_log("[Analytics][" . $this->type . "] " . $msg);
        }
    }

}
