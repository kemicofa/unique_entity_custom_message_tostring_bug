<?php
/**
 * Created by PhpStorm.
 * User: kfaulhaber
 * Date: 29/01/2019
 * Time: 20:54
 */

namespace App\Controller;


use App\Entity\User;
use Doctrine\Common\Persistence\ObjectManager;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\Validator\Validator\ValidatorInterface;

class UserController
{
    public function register(ObjectManager $manager, ValidatorInterface $validator){
         $user = new User();
         $user->setEmail("test@email.com");

         $errors = $validator->validate($user);

         if(count($errors) > 0){
             return new JsonResponse(["message" => (string) $errors], 400);
         }

         $manager->persist($user);
         $manager->flush();

         return new JsonResponse(["message" => "done"]);
    }
}