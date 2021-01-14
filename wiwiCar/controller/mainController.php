<?php

class mainController
{

	public static function helloWorld($request,$context)    //wiwiCar.php?action=helloWorld
	{
		$context->mavariable="hello world";
		return context::SUCCESS;
	}



	public static function index($request,$context){
		return context::SUCCESS;
	}

	public static function superTest($request,$context){
		if(key_exists("param1", $request) && key_exists("param2", $request) ) {
			$context->param1 = $request['param1'];
			$context->param2 = $request['param2'];
			$context->notif = "nickel";
			return context::SUCCESS;
		}
		else {
			$context->notif = "c'est non";
			return context::ERROR;
		}
	}

    /* Ancienne version (si on devait avoir un view par test)
	public static function voyageGetByTrajetTest($request,$context){
	    if (key_exists("param1", $_REQUEST)) {
            $context->voyage = voyageTable::getVoyageByTrajet($request['param1']);
	        if ($context->voyage != null) {
	            return $context::SUCCESS;
            }
        }
	    return $context::ERROR;
    }
    */

    public static function tableTest($request,$context){
	    if (key_exists("depart", $request) && key_exists("arrivee", $_REQUEST))         //Test de getTrajet si un depart "depart" et une arrivee "arrivee" est donné en parametre
	        $context->result = trajetTable::getTrajet($request['depart'],$request['arrivee']);
	    elseif (key_exists("trajet", $request))                                             //Test de getVoyageByTrajet si un id de trajet "trajet" est donné en parametre
            $context->result = voyageTable::getVoyageByTrajet($request['trajet']);
	    elseif (key_exists("voyage", $request))                                             //Test de getReservationByVoyage si un id de voyage "voyage" est donné en parametre
            $context->result = reservationTable::getReservationByVoyage($request['voyage']);
	    elseif (key_exists("id", $request))                                                 //Test de getUserById si un id d'utilisateur "id" est donné en parametre
            $context->result = utilisateurTable::getUserById($request['id']);
	    if ($context->result != null)
	        return $context::SUCCESS;

	    return $context::ERROR;
    }

    public static function search($request,$context) {
        $context->tableData = trajetTable::getVilles();
        if (key_exists("depart", $request) && key_exists("arrivee", $request)) {
            $context->depart = $request['depart'];
            $context->arrivee = $request['arrivee'];
        }
        return $context::SUCCESS;
    }

    public static function result($request, $context) {
        if (key_exists("depart", $request) && key_exists("arrivee", $request)) {
            $trajet = trajetTable::getTrajet($request['depart'],$request['arrivee']);
            if (!$trajet) return $context::ERROR;
            $context->result = voyageTable::getVoyageByTrajet($trajet);
            if (!$context->result) {
                $context->notifMsg = "Aucun résultat trouvé.";
                $context->notif = true;
            }
            $context->trajet = $trajet;
            return $context::SUCCESS;
        }
        else {
            return $context::ERROR;
        }
    }

    public static function propVoyage($request, $context) {
        $context->tableData = trajetTable::getVilles();
        return $context::SUCCESS;
    }

    public static function createVoyage($request, $context) {
        $trajet = trajetTable::getTrajet($request['depart_create'],$request['arrivee_create']);
        if (!isset($trajet)) return $context::ERROR;
        $voyage = new voyage();
        $voyage->trajet = $trajet;
        $voyage->conducteur = utilisateurTable::getUserById($context->getSessionAttribute("id"));
        $voyage->contraintes = $request['contraintes'];
        $voyage->tarif = $trajet->distance*$request['tarif'];
        $voyage->heuredepart = $request['heure'];
        $voyage->nbplace = $request['nb_voyageur'];
        $em = dbconnection::getInstance()->getEntityManager();
        $em->persist($voyage);
        $em->flush();
        return $context::SUCCESS;
    }

    public static function mesReservations($request, $context) {
        $reservation = reservationTable::getReservationByVoyageur($context->getSessionAttribute("id"));
        if ($reservation == false) {

        }
        $context->result = $reservation;
        if (!$context->result) {
            $context->notifMsg = "Vous n'avez aucune reservation.";
            $context->notif = true;
        }
        return $context::SUCCESS;
    }

    public static function mesVoyages($request, $context) {
        $voyages = voyageTable::getVoyageByConducteur($context->getSessionAttribute("id"));
        if (!isset($voyages)) {
            return $context::ERROR;
        }
        $context->result = $voyages;
        if ($context->result) {
            foreach ($context->result as $voyage) {
                $voyage->reservation = reservationTable::getReservationByVoyage($voyage->id);
            }
        }
        else {
            $context->notifMsg = "Vous n'avez aucun voyage.";
            $context->notif = true;
        }
        return $context::SUCCESS;
}

    public static function disconnect($request, $context) {
        $context->setSessionAttribute("id", null);
        $context->setSessionAttribute("identifiant", null);
        return $context::SUCCESS;
    }

    public static function login($request, $context) {
        if (key_exists("login", $request) && key_exists("password", $request)) {
            $user = utilisateurTable::getUserByLoginAndPass($request["login"], $request["password"]);
            if ($user == false) {
                $context->message = "Mauvais login/mot de passe";
                return $context::ERROR;
            }
            $context->setSessionAttribute("id", $user->id);
            $context->setSessionAttribute("identifiant", $user->identifiant);
            return $context::SUCCESS;
        }
        $context->message = "Login/mot de passe manquant";
        return $context::ERROR;
    }

    public static function reserver($request, $context) {
        if (key_exists("reservation", $request)) {
            $voyage = voyageTable::getVoyageById($request['reservation']);
            if ($voyage->nbplace > 0) {

                 $reservation = new reservation();
                 $reservation->voyage = $voyage;
                 $reservation->voyageur = utilisateurTable::getUserById($context->getSessionAttribute("id"));
                 $context->reservation = $reservation;
                 $em = dbconnection::getInstance()->getEntityManager();
                 $em->persist($reservation);
                 //$em->flush();
                 $voyageRepo = $em->getRepository(Voyage::class);
                 $voyage = $voyageRepo->find($reservation->voyage->id);
                 $voyage->nbplace--;
                 $em->flush();
                 return $context::SUCCESS;
            }
        }
        return $context::ERROR;
    }

    public static function signup($request, $context) {
        if (key_exists("login", $request) && key_exists("password", $request)) {
            if (utilisateurTable::getUserByLogin($request["login"])) {
                //notification que le login existe déjà
                return $context::NONE;
            }
            else {
                $user = new utilisateur();
                $user->nom = $request['nom'];
                $user->prenom = $request['prenom'];
                $user->identifiant = $request['login'];
                $user->pass = sha1($request['password']);
                $context->user = $user;
                $em = dbconnection::getInstance()->getEntityManager();
                $em->persist($user);
                $em->flush();
                return $context::SUCCESS;
            }
        }
        else {
            return $context::ERROR;
        }
    }

}
