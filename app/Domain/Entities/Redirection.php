<?php

namespace App\Domain\Entities;

class Redirection
{
    private int $id;
    private int $shortUrlId;
    private \DateTime $fechaRedireccion;

    public function __construct(int $id, int $shortUrlId, \DateTime $fechaRedireccion)
    {
        $this->id = $id;
        $this->shortUrlId = $shortUrlId;
        $this->fechaRedireccion = $fechaRedireccion;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getShortUrlId(): int
    {
        return $this->shortUrlId;
    }

    public function getFechaRedireccion(): \DateTime
    {
        return $this->fechaRedireccion;
    }
}
