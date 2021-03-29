<?php


class Message_home
{
    private ?int $id;
    private ?string $text;

    /**
     * Message_home constructor.
     * @param int|null $id
     * @param string|null $text
     */
    public function __construct(int $id = null, string $text = null)
    {
        $this->id = $id;
        $this->text = $text;
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
     * Return text
     * @return string|null
     */
    public function getText(): ?string
    {
        return $this->text;
    }

    /**
     * Set text
     * @param string|null $text
     * @return Message_home
     */
    public function setText(?string $text): Message_home
    {
        $this->text = $text;
        return $this;
    }


}