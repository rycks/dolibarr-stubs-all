<?php

namespace DebugBar\DataCollector;

interface MessagesAggregateInterface
{
    /**
     * Returns collected messages
     *
     * @return array
     */
    public function getMessages();
}