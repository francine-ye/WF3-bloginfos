<?php

namespace Controller;

use \W\Controller\Controller;

class ContactController extends BaseController
{

	public function seeContact() {

		if (!empty($_POST)) {

			if(empty($_POST)) {
				$this->getFlashMessenger()->error('Veuillez remplir les champs');
			}
		}
		

		$this->show('contact/contact');

	}

}