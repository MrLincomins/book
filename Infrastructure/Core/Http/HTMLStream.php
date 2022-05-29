<?php

declare(strict_types=1);

namespace Infrastructure\Core\Http;

use Psr\Http\Message\StreamInterface;

final class HTMLStream implements StreamInterface
{

    private string $content;

    public function __toString()
    {
        return $this->content;
    }

    public function close()
    {
        // TODO: Implement close() method.
    }

    public function detach()
    {
        // TODO: Implement detach() method.
    }

    public function getSize()
    {
        // TODO: Implement getSize() method.
    }

    public function tell()
    {
        // TODO: Implement tell() method.
    }

    public function eof()
    {
        // TODO: Implement eof() method.
    }

    public function isSeekable()
    {
        // TODO: Implement isSeekable() method.
    }

    public function seek($offset, $whence = SEEK_SET)
    {
        // TODO: Implement seek() method.
    }

    public function rewind()
    {
        // TODO: Implement rewind() method.
    }

    public function isWritable()
    {
        return true;
    }

    public function write($string): void
    {
        $this->content = $string;
    }

    public function isReadable()
    {
        // TODO: Implement isReadable() method.
    }

    public function read($length): int
    {
        return strlen($this->content);
    }

    public function getContents(): string
    {
        return $this->content;
    }

    public function getMetadata($key = null)
    {
        // TODO: Implement getMetadata() method.
    }
}