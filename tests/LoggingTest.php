<?php

namespace hofi\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Test\TestCase;

class LoggingTest extends TestCase
{
    public function testLogging()
    {
        $logger = new Logger(HandlerTest::class);

        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushHandler(new StreamHandler(__DIR__ . "/../aplication.log"));

        $logger->info("Belajar Pemograman PHP Logging");
        $logger->info("Selamat Datang Di Kelas PHP Logging");
        $logger->info("Ini Informasi Aplikasi Logging");

        self::assertNotNull($logger);
    }
}

