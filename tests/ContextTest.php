<?php

namespace hofi\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class ContextTest extends TestCase
{

    public function testContext()
    {

        $logger = new Logger(ContextTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));

        $logger->info("This is log massage", ["username" => "Gusti"]);        
        $logger->info("Try login user", ["username" => "Gusti"]);        
        $logger->info("Success login user", ["username" => "Gusti"]);    
        
        self::assertNotNull($logger);

    }
}

