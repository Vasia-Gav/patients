<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Group
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\GroupRepository")
 * @ORM\Table(name="`group`")
 */
class Group
{

    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     *
     * @Groups("default")
     */
    private $id;

    /**
     * @var string Media name
     *
     * @ORM\Column(type="string", nullable=true)
     *
     * @Groups("default")
     */
    private $name;

    /**
     * @var ArrayCollection|Patient[]
     *
     * @ORM\ManyToMany(targetEntity="Patient", mappedBy="groups")
     */
    private $patients;

    /**
     * @return int
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @param int $id
     */
    public function setId($id)
    {
        $this->id = $id;
    }

    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    public function __toString()
    {
        return $this->name;
    }

    /**
     * @return Patient[]|ArrayCollection
     */
    public function getPatients()
    {
        return $this->patients;
    }

    /**
     * @param Patient[]|ArrayCollection $patients
     */
    public function setPatients($patients)
    {
        $this->patients = $patients;
    }

}
