<?php

declare(strict_types=1);

namespace Infrastructure\Core\Http;

use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\StreamInterface;

abstract class Response implements ResponseInterface
{

    private StreamInterface $body;
    private int $statusCode;
    private string $reasonPhrase;


    public function getProtocolVersion()
    {
        // TODO: Implement getProtocolVersion() method.
    }

    public function withProtocolVersion($version)
    {
        // TODO: Implement withProtocolVersion() method.
    }

    public function getHeaders()
    {
        // TODO: Implement getHeaders() method.
    }

    public function hasHeader($name)
    {
        // TODO: Implement hasHeader() method.
    }

    public function getHeader($name)
    {
        // TODO: Implement getHeader() method.
    }

    public function getHeaderLine($name)
    {
        // TODO: Implement getHeaderLine() method.
    }

    public function withHeader($name, $value)
    {
        // TODO: Implement withHeader() method.
    }

    public function withAddedHeader($name, $value)
    {
        // TODO: Implement withAddedHeader() method.
    }

    public function withoutHeader($name)
    {
        // TODO: Implement withoutHeader() method.
    }

    public function getBody(): StreamInterface
    {
        return $this->body;
    }

    public function withBody(StreamInterface $body): static
    {
        $this->body = $body;

        return $this;
    }

    public function getStatusCode(): int
    {
        return $this->statusCode;
    }

    public function withStatus($code, $reasonPhrase = ''): static
    {
        $this->statusCode = $code;
        $this->reasonPhrase = $reasonPhrase;

        return $this;
    }

    public function getReasonPhrase()
    {
        // TODO: Implement getReasonPhrase() method.
    }
}