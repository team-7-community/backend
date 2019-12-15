<?php


namespace ApiBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Validator\Constraints as Assert;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Employee
 *
 * @ORM\Table(name="employee")
 * @ORM\Entity(repositoryClass="ApiBundle\Repository\EmployeeRepository")
 */
class Employee
{
    /**
     * @var int
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

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
     * @var int
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="score", type="integer")
     */
    private $score;

    /**
     * @Assert\NotBlank()
     *
     * Many Badges have One Company
     *
     * @ORM\ManyToOne(targetEntity="Company", inversedBy="badges")
     * @ORM\JoinColumn(name="company_id", referencedColumnName="id")
     */
    private $company;


    /**
     * Set score
     *
     * @param int $score
     *
     * @return Employee
     */
    public function setScore($score)
    {
        $this->score = $score;

        return $this;
    }

    /**
     * @return int
     */
    public function getScore()
    {
        return $this->score;
    }

    /**
     * Set created
     *
     * @param string|\DateTime $created
     *
     * @return Employee
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
     * @return Employee
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
     * Set company
     *
     * @param Company $company
     *
     * @return Employee
     */
    public function setCompany($company)
    {
        $this->company = $company;

        return $this;
    }

    /**
     * Get company
     *
     * @return Company
     */
    public function getCompany()
    {
        return $this->company;
    }

}