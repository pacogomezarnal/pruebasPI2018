<?php

namespace AppBundle\Controller;

use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

use AppBundle\Entity\Actividad;
use AppBundle\Form\ActividadType;
use AppBundle\Entity\Alumno;
use AppBundle\Form\AlumnoType;
use AppBundle\Entity\Curso;
use AppBundle\Form\CursoType;
use AppBundle\Entity\AlumnoCurso;
use AppBundle\Form\AlumnoCursoType;

class DefaultController extends Controller
{
    /**
     * @Route("/", name="homepage")
     */
    public function indexAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/nuevaActividad", name="nuevaActividad")
     */
     public function nuevaActividad(Request $request)
    {
      $actividad = new Actividad();
      $form = $this->createForm(ActividadType::class, $actividad);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $actividad = $form->getData();
        $em = $this->getDoctrine()->getManager();
        $em->persist($actividad);
        $em->flush();
        return $this->redirectToRoute('listaActividades');
      }
      return $this->render('gestion/nuevaActividad.html.twig',array('form'=>$form->createView()));
    }
    /**
     * @Route("/listaActividades", name="listaActividades")
     */
    public function listaActividadesAction(Request $request)
    {
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
    }
    /**
     * @Route("/nuevoAlumnoCursos", name="nuevoAlumnoCursos")
     */
     public function nuevoAlumnoCursos(Request $request)
    {
      $alumno = new Alumno();
      $form = $this->createForm(AlumnoType::class, $alumno);

      $form->handleRequest($request);

      if ($form->isSubmitted() && $form->isValid()) {
        $alumno = $form->getData();
        $alumnoCursos=$alumno->getAlumnoCursos();
        $em = $this->getDoctrine()->getManager();
        foreach ($alumnoCursos as $alumnoCurso) {
          $alumnoCurso->setAlumno($alumno);
          $em->persist($alumnoCurso);
        }
        $em->persist($alumno);
        $em->flush();
        // replace this example code with whatever you need
        return $this->render('default/index.html.twig', [
            'base_dir' => realpath($this->getParameter('kernel.project_dir')).DIRECTORY_SEPARATOR,
        ]);
      }
      return $this->render('gestion/nuevoAlumnoCurso.html.twig',array('form'=>$form->createView()));
    }
}
