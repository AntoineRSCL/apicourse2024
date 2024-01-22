<?php

namespace App\Events;

use Lexik\Bundle\JWTAuthenticationBundle\Event\JWTCreatedEvent;

class JwtCreatedSubscriber{

    public function updateJwtData(JWTCreatedEvent $event)
    {
        // recup l'utilisateur pour avoir firstname et le lastname
        $user = $event->getUser(); //permet de recup l'user

        $data = $event->getData();//recup un tableau

        $data['firstName'] = $user->getFirstName();
        $data['lastName'] = $user->getLastName();

        $event->setData($data); // on repasse le tableau data avec les nouvelles donnes 
    }
}