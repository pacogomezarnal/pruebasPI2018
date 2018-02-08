<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * AlumnoCurso
 *
 * @ORM\Table(name="alumno_curso")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\AlumnoCursoRepository")
 */
class AlumnoCurso
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
     * @var \DateTime
     *
     * @ORM\Column(name="anyoMatricula", type="datetime")
     */
    private $anyoMatricula;

    /**
     * @ORM\ManyToOne(targetEntity="Curso", inversedBy="cursoAlumnos")
     * @ORM\JoinColumn(name="cursoAlumno_id", referencedColumnName="id")
     */
    protected $curso;

    /**
     * @ORM\ManyToOne(targetEntity="Alumno", inversedBy="alumnoCursos")
     * @ORM\JoinColumn(name="alumnoCurso_id", referencedColumnName="id")
     */
    protected $alumno;



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
     * Set anyoMatricula
     *
     * @param \DateTime $anyoMatricula
     *
     * @return AlumnoCurso
     */
    public function setAnyoMatricula($anyoMatricula)
    {
        $this->anyoMatricula = $anyoMatricula;

        return $this;
    }

    /**
     * Get anyoMatricula
     *
     * @return \DateTime
     */
    public function getAnyoMatricula()
    {
        return $this->anyoMatricula;
    }

    /**
     * Set curso
     *
     * @param \AppBundle\Entity\Curso $curso
     *
     * @return AlumnoCurso
     */
    public function setCurso(\AppBundle\Entity\Curso $curso = null)
    {
        $this->curso = $curso;

        return $this;
    }

    /**
     * Get curso
     *
     * @return \AppBundle\Entity\Curso
     */
    public function getCurso()
    {
        return $this->curso;
    }

    /**
     * Set alumno
     *
     * @param \AppBundle\Entity\Alumno $alumno
     *
     * @return AlumnoCurso
     */
    public function setAlumno(\AppBundle\Entity\Alumno $alumno = null)
    {
        $this->alumno = $alumno;

        return $this;
    }
    /**
     * Get alumno
     *
     * @return \AppBundle\Entity\Alumno
     */
    public function getAlumno()
    {
        return $this->alumno;
    }
}
