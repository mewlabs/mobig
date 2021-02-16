<?php

namespace InstagramAPI\Tests\Guzzle;

use PHPUnit\Framework\TestCase;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\ConnectException;
use GuzzleHttp\Handler\MockHandler;
use GuzzleHttp\HandlerStack;
use GuzzleHttp\Psr7\Request;
use GuzzleHttp\Psr7\Response;
use InstagramAPI\MiddlewareFactory;

/**
 * Class MiddlewareFactoryTest
 *
 * @package Lgn\CoreBundle\Tests\Controller
 */
class MiddlewareFactoryTest extends TestCase
{
    public function testRetriesConnectException()
    {
        $middlewareFactory = new MiddlewareFactory();

        $mock = new MockHandler([
            new ConnectException("cURL error 28: Operation timed out Error 1", new Request('GET', 'test')),
            new Response(200, ['X-Foo' => 'Bar']),
        ]);

        $handler = HandlerStack::create($mock);
        $handler->push($middlewareFactory->retry(false));
        $client = new Client(['handler' => $handler]);

        $this->assertEquals(200, $client->request('GET', '/')->getStatusCode());
    }

    public function testRetries500Errors()
    {
        $middlewareFactory = new MiddlewareFactory();

        $mock = new MockHandler([
            new Response(500),
            new Response(200),
        ]);

        $handler = HandlerStack::create($mock);
        $handler->push($middlewareFactory->retry(false));
        $client = new Client(['handler' => $handler]);

        $this->assertEquals(200, $client->request('GET', '/')->getStatusCode());
    }

    public function testRetryLimit()
    {
        $middlewareFactory = new MiddlewareFactory();

        $mock = new MockHandler([
            new ConnectException("cURL error 28: Operation timed out Error 1", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 2", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 3", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 4", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 5", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 6", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 7", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 8", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 9", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 10", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out Error 11", new Request('GET', 'test')),
        ]);

        $handler = HandlerStack::create($mock);
        $handler->push($middlewareFactory->retry(false));
        $client = new Client(['handler' => $handler]);

        $this->expectException(ConnectException::class);

        $client->request('GET', '/')->getStatusCode();
    }

    public function testRetryDelay()
    {
        $middlewareFactory = new MiddlewareFactory();

        $mock = new MockHandler([
            new ConnectException("cURL error 28: Operation timed out +1 second delay", new Request('GET', 'test')),
            new ConnectException("cURL error 28: Operation timed out +1 second delay", new Request('GET', 'test')),
            new Response(200),
        ]);

        $handler = HandlerStack::create($mock);
        $handler->push($middlewareFactory->retry(true));
        $client = new Client(['handler' => $handler]);

        $startTime = time();
        $client->request('GET', '/')->getStatusCode();
        $endTime = time();

        $this->assertGreaterThan($startTime + 1, $endTime);
    }
}
