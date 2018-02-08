<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Alumno
 *
 * @ORM\Table(name="alumno")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlumnoRepository")
 */
class Alumno
{
    /**
     * @var int
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nombre", type="string", length=255)
     */
    private $nombre;


    //RELACIONES
    /**
      * @ORM\OneToMany(targetEntity="AlumnoCurso", mappedBy="alumno")
      */
     protected $alumnoCursos;

     public function __construct()
     {
         $this->alumnoCursos = new ArrayCollection();
     }



    /**
     * Get id
     *
     * @return integer
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Alumno
     */
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get nombre
     *
     * @return string
     */
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Add alumnoCurso
     *
     * @param \AppBundle\Entity\AlumnoCurso $alumnoCurso
     *
     * @return Alumno
     */
    public function addAlumnoCurso(\AppBundle\Entity\AlumnoCurso $alumnoCurso)
    {
        $this->alumnoCursos[] = $alumnoCurso;
        // set the *owning* side!
        //$alumnoCurso->setAlumno($this);

        return $this;
    }

    /**
     * Remove alumnoCurso
     *
     * @param \AppBundle\Entity\AlumnoCurso $alumnoCurso
     */
    public function removeAlumnoCurso(\AppBundle\Entity\AlumnoCurso $alumnoCurso)
    {
        $this->alumnoCursos->removeElement($alumnoCurso);
    }

    /**
     * Get alumnoCursos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getAlumnoCursos()
    {
        return $this->alumnoCursos;
    }
    public function __toString()
    {
      return $this->nombre;
    }
}
