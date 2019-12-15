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
     * @ORM\Column(name="score0", type="boolean")
     */
    private $score0;

    /**
     * @var int
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="score1", type="boolean")
     */
    private $score1;

    /**
     * @var int
     * @Assert\NotBlank()
     *
     * @ORM\Column(name="score2", type="boolean")
     */
    private $score2;

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
     * Set score0
     *
     * @param boolean $score0
     *
     * @return Employee
     */
    public function setScore0($score0)
    {
        $this->score0 = $score0;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getScore0()
    {
        return $this->score0;
    }

    /**
     * Set score1
     *
     * @param boolean $score1
     *
     * @return Employee
     */
    public function setScore1($score1)
    {
        $this->score1 = $score1;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getScore1()
    {
        return $this->score1;
    }


    /**
     * Set score2
     *
     * @param boolean $score2
     *
     * @return Employee
     */
    public function setScore2($score2)
    {
        $this->score2 = $score2;

        return $this;
    }

    /**
     * @return boolean
     */
    public function getScore2()
    {
        return $this->score2;
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