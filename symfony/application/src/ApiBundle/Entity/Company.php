<?php

namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Game
 *
 * @ORM\Table(name="company")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\CompanyRepository")
 */
class Company
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="description", type="string", length=255)
     */
    private $description;

    /**
     * @var string
     *
     * @ORM\Column(name="name", type="string", length=255)
     */
    private $name;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="created", type="datetime")
     */
    private $created;

    /**
     * @var \DateTime
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="modified", type="datetime")
     */
    private $modified;

    /**
     * @var Collection
     * One Company has Many Badges
     *
     * @ORM\OneToMany(targetEntity="Badge", mappedBy="company", cascade={"persist"})
     */
    private $badges;

    /**
     * @var Collection
     * One Company has Many Employees
     *
     * @ORM\OneToMany(targetEntity="Employee", mappedBy="company", cascade={"persist"})
     */
    private $employees;

    /**
     * Badge constructor.
     */
    public function __construct()
    {
        $this->badges = new ArrayCollection();
        $this->employees = new ArrayCollection();
    }

    /**
     * Get id
     *
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set created
     *
     * @param string|\DateTime $created
     *
     * @return Company
     */
    public function setCreated($created)
    {
        $this->created = $created;

        return $this;
    }

    /**
     * @return \DateTime
     */
    public function getCreated()
    {
        return $this->created;
    }

    /**
     * Set modified
     *
     * @param string|\DateTime $modified
     *
     * @return Company
     */
    public function setModified($modified)
    {
        $this->modified = $modified;

        return $this;
    }
    /**
     * @return \DateTime
     */
    public function getModified()
    {
        return $this->modified;
    }

    /**
     * Set X0
     *
     * @param string $description
     *
     * @return Company
     */
    public function setDescription($description)
    {
        $this->description = $description;

        return $this;
    }

    /**
     * Get Description
     *
     * @return string
     */
    public function getDescription()
    {
        return $this->description;
    }

    /**
     * Set X0
     *
     * @param string $name
     *
     * @return Company
     */
    public function setName($name)
    {
        $this->name = $name;

        return $this;
    }

    /**
     * Get Name
     *
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @return Collection
     */
    public function getBadges()
    {
        return $this->badges;
    }
    /**
     * @param Badge $badge
     */
    public function addBadge(Badge $badge)
    {
        $this->badges->add($badge);
    }

    /**
     * @return Collection
     */
    public function getEmployees()
    {
        return $this->employees;
    }
    /**
     * @param Employee $employee
     */
    public function addEmployee(Employee $employee)
    {
        $this->employees->add($employee);
    }

}