<?php


class Section
{
    private ?int $id;
    private ?string $name;

    /**
     * Item constructor.
     * @param int|null $id
     * @param string|null $name
     */
    public function __construct(int $id = null, string $name = null)
    {
        $this->id = $id;
        $this->name = $name;
    }

    /**
     * Return id
     * @return int|null
     */
    public function getId(): ?int
    {
        return $this->id;
    }

    /**
     * Return name
     * @return string|null
     */
    public function getName(): ?string
    {
        return $this->name;
    }

    /**
     * Set the name of Item
     * @param string|null $name
     * @return Section
     */
    public function setName(?string $name): Section
    {
        $this->name = $name;
        return $this;
    }
}