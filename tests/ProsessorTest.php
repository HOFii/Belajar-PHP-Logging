<?php

namespace hofi\Belajar\PHP\MVC;

use Monolog\Handler\StreamHandler;
use Monolog\Logger;
use Monolog\Processor\GitProcessor;
use Monolog\Processor\HostnameProcessor;
use Monolog\Processor\MemoryUsageProcessor;
use Monolog\Test\TestCase;

use function PHPUnit\Framework\assertNotNull;

class ProsessorTest extends TestCase
{

    public function testProsessorRecord()
    {
        $logger = new Logger(ProsessorTest::class);
        $logger->pushHandler(new StreamHandler("php://stderr"));
        $logger->pushProcessor(new GitProcessor());
        $logger->pushProcessor(new MemoryUsageProcessor());
        $logger->pushProcessor(new HostnameProcessor());
        $logger->pushProcessor(function ($record){
            $record["extra"]["username"] = [
                "app" => "Belajar PHP Logging",
                "author" => "Gusti Alifiraqsha Akbar"
            ];
            return $record;
        });

        $logger->info("hello world", ["username" => "Gusti"]);
        $logger->info("hello world");
        $logger->info("hello world again");
        self:assertNotNull($logger);
        }
}
