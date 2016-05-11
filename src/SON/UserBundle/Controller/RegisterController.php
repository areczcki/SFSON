<?php

namespace SON\UserBundle\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

use Symfony\Component\Security\Core\Exception\AccessDeniedException;

use SON\UserBundle\Entity\User;
use SON\UserBundle\Form\UserType;



class RegisterController extends Controller
{

    /**
     * Lists all User entities.
     *
     * @Route("/register", name="user_register")
     * @Template()
     */
    public function registerAction(Request $request)
    {
        $form = $this->createFormBuilder()
            ->add("username", "text")
            ->add("email", "text")
            ->add("password", "repeated",  array(
                "type" => "password"
            ))
            ->getForm();

        if('POST' == $request->getMethod()){
            $form->bind($request);

            if($form->isValid()){
                $data = $form->getData();

                $user = new User();
                $user->setUsername($data['username']);
                $user->setEmail($data['email']);
                $user->setPassword($this->encodePassword($user, $data['password']));

                $em = $this->getDoctrine()->getManager();
                $em->persist($user);
                $em->flush();

                return $this->redirect($this->generateUrl("catalogo"));

            }

        }

        return array("form"=>$form->createView());
    }

    private function encodePassword($user, $plainPassword) {
        $encoder = $this->get("security.encoder_factory")
            ->getEncoder($user);

        return $encoder->encodePassword($plainPassword, $user->getSalt());
    }

}
