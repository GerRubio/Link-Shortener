<?php

namespace App\Domain\Entities;

class Url
{
    private int $id;
    private string $url;
    private \DateTime $fechaCreacion;
    private ?\DateTime $fechaExpiracion;

    public function __construct(int $id, string $url, \DateTime $fechaCreacion, ?\DateTime $fechaExpiracion)
    {
        $this->id = $id;
        $this->url = $url;
        $this->fechaCreacion = $fechaCreacion;
        $this->fechaExpiracion = $fechaExpiracion;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getUrl(): string
    {
        return $this->url;
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
