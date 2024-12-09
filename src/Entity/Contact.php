<?php

namespace App\Entity;

use App\Repository\ContactRepository;
use Doctrine\DBAL\Types\Types;
use Doctrine\ORM\Mapping as ORM;
use ApiPlatform\Metadata\ApiResource;
use ApiPlatform\Metadata\Post;
use Symfony\Component\Serializer\Annotation\Groups;

#[ApiResource(
    normalizationContext: ['groups' => ['contact:write']],
    operations: [
        new Post(),
    ]
)]
#[ORM\Entity(repositoryClass: ContactRepository::class)]
class Contact
{
    #[ORM\Id]
    #[ORM\GeneratedValue]
    #[Groups(['contact:write'])]
    #[ORM\Column]
    private ?int $id = null;

    #[Groups(['contact:write'])]
    #[ORM\Column(length: 255)]
    private ?string $firstName = null;

    #[Groups(['contact:write'])]
    #[ORM\Column(length: 255)]
    private ?string $lastName = null;

    #[Groups(['contact:write'])]
    #[ORM\Column(length: 255)]
    private ?string $email = null;

    #[Groups(['contact:write'])]
    #[ORM\Column(length: 255)]
    private ?string $phone = null;

    #[Groups(['contact:write'])]
    #[ORM\Column(type: Types::TEXT)]
    private ?string $content = null;

    #[Groups(['contact:write'])]
    #[ORM\Column]
    private ?bool $privacyAccepted = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $createdAt = null;

    #[ORM\Column]
    private ?\DateTimeImmutable $updatedAt = null;

    // public function __construct() {
    //     $this->createdAt = new \DateTimeImmutable();
    //     $this->updatedAt = new \DateTimeImmutable();
    // }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->firstName;
    }

    public function setFirstName(string $firstName): static
    {
        $this->firstName = $firstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->lastName;
    }

    public function setLastName(string $lastName): static
    {
        $this->lastName = $lastName;

        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(string $email): static
    {
        $this->email = $email;

        return $this;
    }

    public function getPhone(): ?string
    {
        return $this->phone;
    }

    public function setPhone(string $phone): static
    {
        $this->phone = $phone;

        return $this;
    }

    public function getContent(): ?string
    {
        return $this->content;
    }

    public function setContent(string $content): static
    {
        $this->content = $content;

        return $this;
    }

    public function isPrivacyAccepted(): ?bool
    {
        return $this->privacyAccepted;
    }

    public function setPrivacyAccepted(bool $privacyAccepted): static
    {
        $this->privacyAccepted = $privacyAccepted;

        return $this;
    }

    public function getCreatedAt(): ?\DateTimeImmutable
    {
        return $this->createdAt;
    }

    public function setCreatedAt(\DateTimeImmutable $createdAt): static
    {
        $this->createdAt = $createdAt;

        return $this;
    }

    public function getUpdatedAt(): ?\DateTimeImmutable
    {
        return $this->updatedAt;
    }

    public function setUpdatedAt(\DateTimeImmutable $updatedAt): static
    {
        $this->updatedAt = $updatedAt;

        return $this;
    }
}
