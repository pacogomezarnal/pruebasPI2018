<?php

namespace AppBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;
use Doctrine\Common\Collections\Collection;

/**
 * Categoria
 *
 * @ORM\Table(name="categoria")
 * @ORM\Entity(repositoryClass="AppBundle\Repository\CategoriaRepository")
 */
class Categoria
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

    //RELACION  MANY-TO-MANY
    /**
    * @ORM\ManyToMany(targetEntity="Actividad", mappedBy="categorias")
    */
    private $actividades;

    public function __construct() {
        $this->actividades = new \Doctrine\Common\Collections\ArrayCollection();
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
     * Set nombre
     *
     * @param string $nombre
     *
     * @return Categoria
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
     * Add actividade
     *
     * @param \AppBundle\Entity\Actividad $actividade
     *
     * @return Categoria
     */
    public function addActividade(\AppBundle\Entity\Actividad $actividade)
    {
        $this->actividades[] = $actividade;

        return $this;
    }

    /**
     * Remove actividade
     *
     * @param \AppBundle\Entity\Actividad $actividade
     */
    public function removeActividade(\AppBundle\Entity\Actividad $actividade)
    {
        $this->actividades->removeElement($actividade);
    }

    /**
     * Get actividades
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getActividades()
    {
        return $this->actividades;
    }

    public function __toString(){
      return $this->nombre;
    }
}
