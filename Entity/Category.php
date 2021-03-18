<?php


class Category
{
    private ?int $id;
    private ?string $name;
    private ?int $default_visibility;

    /**
     * Item constructor.
     * @param int|null $id
     * @param string|null $name
     * @param int|null $default_visibility
     */
    public function __construct(int $id = null, string $name = null, int $default_visibility = null)
    {
        $this->id = $id;
        $this->name = $name;
        $this->default_visibility = $default_visibility;
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
     * Set the name of Category
     * @param string|null $name
     */
    public function setName(?string $name): Category
    {
        $this->name = $name;
        return $this;
    }
    /**
     * Return visibility
     * @return int|null
     */
    public function getDefault_visibility(): ?int
    {
        return $this->default_visibility;
    }

    /**
     * Set the visibility of Category
     * @param int|null $default_visibility
     * @return Document
     */
    public function setDefault_visibility(?int $default_visibility): Category
    {
        $this->default_visibility = $default_visibility;
        return $this;
    }
}