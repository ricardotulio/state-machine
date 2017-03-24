<?php

namespace Application\Entity;

use DateTime;
use Application\Fillable;

class Transaction
{
    private $id;

    private $type;

    private $status;

    private $created;

    private $updated;

    public function getId(): ?string
    {
        return $this->id;
    }

    public function withId(string $id = null): self
    {
        $this->id = $id;
        return $this;
    }

    public function getType(): ?string
    {
        return $this->type;
    }

    public function withType(string $type): self
    {
        $this->type = $type;
        return $this;
    }

    public function getStatus(): ?string
    {
        return $this->status;
    }

    public function withStatus(string $status): self
    {
        $this->status = $status;
        return $this;
    }

    public function getCreated(): ?DateTime
    {
        return $this->created;
    }

    public function withCreated(DateTime $created = null): self
    {
        $this->created = $created;
        return $this;
    }

    public function getUpdated(): ?DateTime
    {
        return $this->updated;
    }

    public function withUpdated(DateTime $updated = null): self
    {
        $this->updated = $updated;
        return $this;
    }
}
