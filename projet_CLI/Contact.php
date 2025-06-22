<?php
class Contact
{
    private ?int $id;
    private ?string $name;
    private ?string $email;
    private ?string $phone_number;
    public function __construct(int $id, string $name, string $email, string $phone_number)
    {
        $this->id = $id;
        $this->name = $name;
        $this->email = $email;
        $this->phone_number = $phone_number;
    }
    public function __toString(): string
    {
        return "Contact ID: $this->id\nName: $this->name\nEmail: $this->email\nPhone: $this->phone_number\n";
    }

    public function getId(): ?int
    {
        return $this->id;
    }
    public function setId(?int $id)
    {
        $this->id = $id;
    }
    public function getName(): ?string
    {
        return $this->name;
    }
    public function setName(?string $name)
    {
       $this->name = $name;
    }
    public function getEmail(): ?string
    {
        return $this->email;
    }
    public function setEmail(?string $email)
    {
        $this->email = $email;
    }
    public function getPhoneNumber(): ?string
    {
        return $this->phone_number;
    }
    public function setPhoneNumber(?string $phone_number)    {
        $this->phone_number = $phone_number;
    }
}
