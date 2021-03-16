<?php


class User
{
    private ?int $id;
    private ?string $firstname;
    private ?string $lastname;
    private ?string $password;
    private ?string $mail;
    private ?Role $role;

    /**
     * User constructor.
     * @param int|null $id
     * @param string|null $firstname
     * @param string|null $lastname
     * @param string|null $password
     * @param string|null $mail
     * @param string|null $role
     */
    public function __construct(int $id = null, string $firstname = null, string $lastname = null, string $password = null, string $mail = null, Role $role = null)
    {
        $this->id = $id;
        $this->firstname = $firstname;
        $this->lastname = $lastname;
        $this->password = $password;
        $this->mail = $mail;
        $this->role = $role;
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
     * Return firstname
     * @return string|null
     */
    public function getFirstname(): ?string
    {
        return $this->firstname;
    }

    /**
     * Set the firstname of User
     * @param string|null $firstname
     */
    public function setFirstname(?string $firstname): User
    {
        $this->firstname = $firstname;
        return $this;
    }

    /**
     * Return lastname
     * @return string|null
     */
    public function getLastname(): ?string
    {
        return $this->lastname;
    }

    /**
     * Set the lastname of User
     * @param string|null $lastname
     */
    public function setLastname(?string $lastname): User
    {
        $this->lastname = $lastname;
        return $this;
    }

    /**
     * Return password
     * @return false|string|null
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Set the password of User
     * @param false|string|null $password
     */
    public function setPassword($password): User
    {
        $this->password = $password;
        return $this;
    }

    /**
     * Return mail
     * @return string|null
     */
    public function getMail(): ?string
    {
        return $this->mail;
    }

    /**
     * Set the mail of User
     * @param string|null $mail
     */
    public function setMail(?string $mail): User
    {
        $this->mail = $mail;
        return $this;
    }

    /**
     * Return role
     * @return string|null
     */
    public function getRole(): ?string
    {
        return $this->role->getName();
    }

    /**
     * Set the role of User
     * @param Role|null $role
     * @return User
     */
    public function setRole(?Role $role): User
    {
        $this->role = $role;
        return $this;
    }
}