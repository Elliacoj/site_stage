<?php


class Commentary
{
    private ?int $id;
    private ?string $commentary;
    private ?string $date;
    private ?User $user;
    private ?Document $document;

    /**
     * Commentary constructor.
     * @param int|null $id
     * @param string|null $commentary
     * @param int|null $date
     * @param User|null $user
     * @param Document|null $document
     */
    public function __construct(int $id = null, string $commentary = null, string $date = null, User $user = null, Document $document = null)
    {
        $this->id = $id;
        $this->commentary = $commentary;
        $this->date = $date;
        $this->user = $user;
        $this->document = $document;
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
     * Return commentary
     * @return string|null
     */
    public function getCommentary(): ?string
    {
        return $this->commentary;
    }

    /**
     * Set commentary
     * @param string|null $commentary
     * @return Commentary
     */
    public function setCommentary(?string $commentary): Commentary
    {
        $this->commentary = $commentary;
        return $this;
    }

    /**
     * Return date
     * @return int|null
     */
    public function getDate(): ?string
    {
        return $this->date;
    }

    /**
     * Set date
     * @param string|null $date
     * @return Commentary
     */
    public function setDate(?string $date): Commentary
    {
        $this->date = $date;
        return $this;
    }

    /**
     * Return User
     * @return User|null
     */
    public function getUser(): ?User
    {
        return $this->user;
    }

    /**
     * Set User
     * @param User|null $user
     * @return Commentary
     */
    public function setUser(?User $user): Commentary
    {
        $this->user = $user;
        return $this;
    }

    /**
     * Return Document
     * @return Document|null
     */
    public function getDocument(): ?Document
    {
        return $this->document;
    }

    /**
     * Set Document
     * @param Document|null $document
     * @return Commentary
     */
    public function setDocument(?Document $document): Commentary
    {
        $this->document = $document;
        return $this;
    }

}