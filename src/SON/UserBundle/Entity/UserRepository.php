<?php

namespace SON\UserBundle\Entity;

use Doctrine\ORM\EntityRepository;
use Symfony\Component\Security\Core\Exception\UsernameNotFoundException;
use Symfony\Component\Security\Core\User\UserInterface;
use Symfony\Component\Security\Core\User\UserProviderInterface;

/**
 * UserRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class UserRepository extends EntityRepository implements UserProviderInterface
{

    public function findOneByUserOrEmail($user){

        /** Utilizando o gerador de query o QUERYBUILDER do DOCTRINE */

        return $this->createQueryBuilder("u")
            ->where("u.username = :username or u.email = :email")
            ->setParameter("username",$user)
            ->setParameter("email",$user)
            ->getQuery()
            ->getOneOrNullResult();
    }

    public function loadUserByUsername($username)
    {
        $user = $this->findOneByUserOrEmail($username);
        if(!$user){
            //Nesse ponto vamos lançar uma exceção do frame de segurança do symfony
            //Em cima da Classe importar: UserNameNotFoundException
            throw new UsernameNotFoundException("Usuário não econtrado: " . $username);
        }
        return $user;
    }

    public function refreshUser(UserInterface $user)
    {
        $class = get_class($user);
        if(! $this->supportsClass($class)){
            throw new UnsupportedUserException("Classe não suportada.");
	    }
	    return $this->loadUserByUserName($user->getUsername());
    }

    public function supportsClass($class)
    {
        return $this->getEntityName() == $class || is_subclass_of ($class, $this->getEntityName());
    }


}
