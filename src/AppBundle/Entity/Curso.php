<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Curso
 *
 * @ORM\Table(name="curso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CursoRepository")
 */
class Curso
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
     * @ORM\OneToMany(targetEntity="AlumnoCurso", mappedBy="curso")
     * @ORM\OrderBy({"order_id" = "ASC"})
     */
    protected $cursoAlumnos;

    public function __construct()
    {
        $this->cursoAlumnos = new ArrayCollection();
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
     * @return Curso
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
     * Add cursoAlumno
     *
     * @param \AppBundle\Entity\AlumnoCurso $cursoAlumno
     *
     * @return Curso
     */
    public function addCursoAlumno(\AppBundle\Entity\AlumnoCurso $cursoAlumno)
    {
        $this->cursoAlumnos[] = $cursoAlumno;

        return $this;
    }

    /**
     * Remove cursoAlumno
     *
     * @param \AppBundle\Entity\AlumnoCurso $cursoAlumno
     */
    public function removeCursoAlumno(\AppBundle\Entity\AlumnoCurso $cursoAlumno)
    {
        $this->cursoAlumnos->removeElement($cursoAlumno);
    }

    /**
     * Get cursoAlumnos
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCursoAlumnos()
    {
        return $this->cursoAlumnos;
    }

    public function __toString()
    {
      return $this->nombre;
    }
}
