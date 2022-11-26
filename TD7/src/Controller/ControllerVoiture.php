<?php

namespace App\Covoiturage\Controller;

use App\Covoiturage\Model\Repository\VoitureRepository;

class ControllerVoiture extends GenericController implements InterfaceController
{
	public function getRepository() : VoitureRepository
	{
		return new VoitureRepository();
	}
}