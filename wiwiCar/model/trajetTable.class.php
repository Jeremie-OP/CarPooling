<?php

//Inclusion de la class trajet
require_once "trajet.class.php";

class trajetTable
{
 public static function getTrajet($depart,$arrivee) {
     $em = dbconnection::getInstance()->getEntityManager();

     $trajetRepository = $em->getRepository('trajet');
     $trajet = $trajetRepository->findOneBy(array('depart'=>$depart,'arrivee'=>$arrivee));

     if ($trajet == false) {
         echo 'Erreur sql';
     }
     return $trajet;
 }

 public static function getVilles() {
     $em = dbconnection::getInstance()->getEntityManager();
     $villes = $em->createQueryBuilder();
     $villes->select('trajet.depart')
            ->distinct(true)
            ->from('Trajet', 'trajet')
            ->orderBy('trajet.depart', 'ASC');
     $result = $villes->getQuery();
     return $result->getResult();
 }

}