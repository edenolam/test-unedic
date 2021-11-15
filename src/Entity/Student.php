<?php

namespace App\Entity;

use ApiPlatform\Core\Annotation\ApiResource;
use App\Repository\StudentRepository;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;
use Symfony\Component\Validator\Constraints as Assert;

/**
 * @ORM\Entity(repositoryClass=StudentRepository::class)
 *
 * @ApiResource(
 *     collectionOperations={"get"={"normalization_context"={"groups"="student:list"}}},
 *     itemOperations={"get"={"normalization_context"={"groups"="student:item"}}},
 *     paginationEnabled=false
 * )
 */
class Student
{
    /**
     * @ORM\Id
     * @ORM\GeneratedValue
     * @ORM\Column(type="integer")
     */
    #[Groups(['student:list', 'student:item'])]
    private $id;

    /**
     * @ORM\Column(type="string", length=25)
     */
    #[Groups(['student:list', 'student:item'])]
    private ?string $FirstName;

    /**
     * @ORM\Column(type="string", length=25)
     */
    #[Groups(['student:list', 'student:item'])]
    private ?string $LastName;

    /**
     * @ORM\Column(type="string", length=10)
     */
    #[Groups(['student:list', 'student:item'])]
    private ?int $NumEtud;

    /**
     * @ORM\ManyToOne(targetEntity=Department::class, inversedBy="students")
     */
    private ?Department $department;

    public function getId(): ?int
    {
        return $this->id;
    }

    public function getFirstName(): ?string
    {
        return $this->FirstName;
    }

    public function setFirstName(string $FirstName): self
    {
        $this->FirstName = $FirstName;

        return $this;
    }

    public function getLastName(): ?string
    {
        return $this->LastName;
    }

    public function setLastName(string $LastName): self
    {
        $this->LastName = $LastName;

        return $this;
    }

    public function getNumEtud(): ?int
    {
        return $this->NumEtud;
    }

    public function setNumEtud(int $NumEtud): self
    {
        $this->NumEtud = $NumEtud;

        return $this;
    }

    public function getDepartment(): ?Department
    {
        return $this->department;
    }

    public function setDepartment(?Department $department): self
    {
        $this->department = $department;

        return $this;
    }
}
