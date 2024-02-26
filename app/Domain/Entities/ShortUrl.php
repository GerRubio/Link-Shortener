<?php

namespace App\Domain\Entities;

class ShortUrl
{
    private int $id;
    private string $shortUrl;
    private int $urlId;
    private \DateTime $fechaCreacion;
    private ?\DateTime $fechaExpiracion;

    public function __construct(int $id, string $shortUrl, int $urlId, \DateTime $fechaCreacion, ?\DateTime $fechaExpiracion)
    {
        $this->id = $id;
        $this->shortUrl = $shortUrl;
        $this->urlId = $urlId;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaExpiracion = $fechaExpiracion;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getShortUrl(): string
    {
        return $this->shortUrl;
    }

    public function getUrlId(): int
    {
        return $this->urlId;
    }

    public function getFechaCreacion(): \DateTime
    {
        return $this->fechaCreacion;
    }

    public function getFechaExpiracion(): ?\DateTime
    {
        return $this->fechaExpiracion;
    }
}
