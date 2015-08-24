<?php

namespace Analytics\Segmentio\Consumer;

interface ConsumerInterface
{
    /**
     * Tracks a user action
     *
     * @param  array $message
     *
     * @return boolean whether the track call succeeded
     */
    public function track(array $message);


    /**
     * Tags traits about the user.
     *
     * @param  array $message
     *
     * @return boolean whether the identify call succeeded
     */
    public function identify(array $message);


    /**
     * Tags traits about the group.
     *
     * @param  array $message
     *
     * @return boolean whether the group call succeeded
     */
     public function group(array $message);


    /**
     * Tracks a page view.
     *
     * @param  array $message
     *
     * @return boolean whether the page call succeeded
     */
    public function page(array $message);


    /**
     * Tracks a screen view.
     *
     * @param  array $message
     *
     * @return boolean whether the group call succeeded
     */
    public function screen(array $message);


    /**
     * Aliases from one user id to another
     *
     * @param  array $message
     *
     * @return boolean whether the alias call succeeded
     */
    public function alias(array $message);

    /**
     * Destructor for consumer.
     */
    public function __destruct();

}
