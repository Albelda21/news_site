<?php 

namespace Controller;

use Library\Controller;
use Library\Request;
use Model\Form\ContactForm;
use Model\News;
use Library\Session;
use Library\Router;


class SiteController extends Controller
{
	public function indexAction(Request $request)
	{
		$repo = $this->container->get('repository_manager')->getRepository('News');
        // todo: findActive();
        $politics = $repo->findNumb('5', '1');
        $sports = $repo->findNumb('5', '2');
        $sciences = $repo->findNumb('5', '3');
        
        
        
        $args = ['politics' => $politics, 'sciences' => $sciences, 'sports' => $sports];

		return $this->render('index.phtml', $args);	
	}

	// public function contactAction(Request $request)
	// {
	// 	$form = new ContactForm($request); //object Contact form
	// 	$repo = $this->container->get('repository_manager')->getRepository('Feedback'); // => instance FeedbackRepository;


	// 	if ($request->isPost()) {
	// 		if ($form->isValid()) {
	// 			$feedback = (new Feedback()) //return this in setters to set 1 by 1
	// 				->setName($form->username)
	// 				->setEmail($form->email)
	// 				->setMessage($form->message)
	// 				->setIpAddress($request->getIpAddress())
	// 			;

	// 			$repo->save($feedback);
	// 			Session::setFlash('Feedback saved');
	// 			Router::redirect('/index.php?route=site/contact');

	// 		}

	// 		Session::setFlash('Fill the filds');			

	// 	}
	// 	return $this->render('contact.phtml', ['form' => $form]);
	// }

	public function politicAction()
	{
		$repo = $this->container->get('repository_manager')->getRepository('News');
        // todo: findActive();
        $politics = $repo->findAllPolitic();
        
        
        $args = ['politics' => $politics];

        
        
		return $this->render('politic.phtml', $args);
	}

	public function sportAction()
	{
		$repo = $this->container->get('repository_manager')->getRepository('News');
        // todo: findActive();
        $sports = $repo->findAllSport();
        
        
        $args = ['sports' => $sports];

		return $this->render('sport.phtml', $args);
	}

	public function scienceAction()
	{
		$repo = $this->container->get('repository_manager')->getRepository('News');
        // todo: findActive();
        $sciences = $repo->findAllScience();
        
        
        $args = ['sciences' => $sciences];

		return $this->render('science.phtml', $args);
	}
}




 ?>