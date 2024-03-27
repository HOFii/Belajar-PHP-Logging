<?php

namespace hofi\Belajar\PHP\MVC;

use Monolog\Handler\ElasticaHandler;
use Monolog\Handler\SlackHandler;
use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class HandlerTest extends TestCase
{

    public function testHandler()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../aplication.log"));
        //$logger->pushHandler(new SlackHandler());
        //$logger->pushHandler(new ElasticaHandler());

        self::assertNotNull($logger);
        self::assertEquals(2, sizeof($logger->getHandlers()));
    } 
}

