<?php

namespace App\ValueObjects;

class Operation implements Arrayable
{
    private int $id;
    private string $fullname;
    private string $phone;
    private CarbonInterface $dateStart;

    public function __construct(int $id, string $fullname, string $phone, CarbonInterface $dateStart)
    {
        $this->id = $id;
        $this->fullname = $fullname;
        $this->phone = $phone;
        $this->dateStart = $dateStart;
    }

    public function getId(): int
    {
        return $this->id;
    }

    public function getFullname(): string
    {
        return $this->fullname;
    }

    public function getPhone(): string
    {
        return '+'.$this->phone;
    }

    public function getDateStart(): CarbonInterface
    {
        return $this->dateStart;
    }

    public function toArray(): array
    {
        return [
            'id' => $this->id,
            'fullname' => $this->fullname,
            'phone' => $this->phone,
            'date_start' => $this->dateStart->toDateTimeString(),
        ];
    }
}
