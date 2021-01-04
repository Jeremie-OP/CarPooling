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

    public static function menu($request,$context) {
        return $context::SUCCESS;
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
            $context->result = voyageTable::getVoyageByTrajet($trajet);
            if (!$context->result) {
                $context->notifMsg = "Aucun voyage disponible pour ce trajet";
                $context->notif = true;
            }
            return $context::SUCCESS;
        }
        else {
            return $context::ERROR;
        }
    }

    public static function notification($request, $context) {
        return $context::SUCCESS;
    }

}
