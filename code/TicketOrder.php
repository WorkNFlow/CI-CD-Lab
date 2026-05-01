<?php

class TicketOrder
{
    private string $name;
    private int $count;
    private string $movie;
    private bool $glasses3d;
    private string $seatType;

    public function __construct(string $name, int $count, string $movie, bool $glasses3d, string $seatType)
    {
        $name = trim($name);
        $movie = trim($movie);
        $seatType = trim($seatType);

        if ($name === '') {
            throw new InvalidArgumentException('Name is required');
        }

        if ($movie === '') {
            throw new InvalidArgumentException('Movie is required');
        }

        if ($count < 1) {
            throw new InvalidArgumentException('Ticket count must be at least 1');
        }

        if (!in_array($seatType, ['standard', 'vip'], true)) {
            throw new InvalidArgumentException('Seat type is invalid');
        }

        $this->name = $name;
        $this->count = $count;
        $this->movie = $movie;
        $this->glasses3d = $glasses3d;
        $this->seatType = $seatType;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getCount(): int
    {
        return $this->count;
    }

    public function getMovie(): string
    {
        return $this->movie;
    }

    public function has3dGlasses(): bool
    {
        return $this->glasses3d;
    }

    public function getSeatType(): string
    {
        return $this->seatType;
    }

    public function getTotalPrice(): int
    {
        $base = $this->seatType === 'vip' ? 600 : 400;
        $glasses = $this->glasses3d ? 50 : 0;

        return ($base + $glasses) * $this->count;
    }
}
