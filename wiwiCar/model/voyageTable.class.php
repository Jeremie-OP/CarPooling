<?php
// Inclusion de la classe voyage
require_once "voyage.class.php";

class voyageTable {

    public static function getVoyageByTrajet($trajet) {
        $em = dbconnection::getInstance()->getEntityManager() ;

        $voyageRepository = $em -> getRepository('voyage');
        $voyage = $voyageRepository->findBy(array('trajet' => $trajet));

        if ($voyage == false) {
            return false;
        }
        return $voyage;
    }

    public static function getVoyageById($id) {
        $em = dbconnection::getInstance()->getEntityManager() ;

        $voyageRepository = $em -> getRepository('voyage');
        $voyage = $voyageRepository->findOneBy(array('id' => $id));

        if ($voyage == false) {
            return false;
        }
        return $voyage;
    }

    public static function getVoyageByConducteur($conducteur) {
        $em = dbconnection::getInstance()->getEntityManager() ;

        $voyageRepository = $em -> getRepository('voyage');
        $voyages = $voyageRepository->findBy(array('conducteur' => $conducteur));

        if ($voyages == false) {
            return false;
        }
        return $voyages;
    }

}


?>
