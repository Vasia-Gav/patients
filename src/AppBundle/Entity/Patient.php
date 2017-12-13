<?php

namespace AppBundle\Entity;

use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\ORM\Mapping as ORM;
use Gedmo\Timestampable\Traits\TimestampableEntity;
use Symfony\Component\Serializer\Annotation\Groups;

/**
 * Patient
 *
 * @ORM\Entity(repositoryClass="AppBundle\Repository\PatientRepository")
 */
class Patient
{
    use TimestampableEntity;

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
     * @var string
     * @ORM\Column(type="string", nullable=false)
     *
     * @Groups("default")
     */
    private $email;

    /**
     * @var string
     * @ORM\Column(type="string", nullable=false)
     *
     * @Groups("default")
     */
    private $phone;


    /**
     * @var boolean
     * @ORM\Column(type="boolean", nullable=false)
     *
     * @Groups("default")
     */
    private $status;


    /**
     * @var ArrayCollection|Group[]
     * @ORM\ManyToMany(targetEntity="AppBundle\Entity\Group")
     * @ORM\JoinTable(name="patients_groups",
     *      joinColumns={@ORM\JoinColumn(name="patient_id", referencedColumnName="id")},
     *      inverseJoinColumns={@ORM\JoinColumn(name="group_id", referencedColumnName="id")}
     *      )
     *
     * @Groups("default")
     */
    private $groups;

    public function __construct()
    {
        $this->groups = new ArrayCollection();
    }

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
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPhone()
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     */
    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return bool
     */
    public function getStatus()
    {
        return $this->status;
    }

    /**
     * @param bool $status
     */
    public function setStatus($status)
    {
        $this->status = $status;
    }


    /**
     * @return ArrayCollection
     */
    public function getGroups()
    {
        return $this->groups;
    }

    /**
     * @param $group
     * @return $this
     */
    public function addGroup($group)
    {
        $this->groups->add($group);

        return $this;
    }

    /**
     * @param string $group
     */
    public function removeGroup($group)
    {
        $this->groups->removeElement($group);
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

}
