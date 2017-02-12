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
		$politics = $repo->findNumb('5', '1');
		$sports = $repo->findNumb('5', '2');
		$sciences = $repo->findNumb('5', '3');
        
        
        
        $args = ['politics' => $politics, 'sciences' => $sciences, 'sports' => $sports];

		return $this->render('index.phtml', $args);	
	}

	public function searchAction(Request $request)
	{
		$repo = $this->container->get('repository_manager')->getRepository('News');
		$search = $repo->findTitle();
		$getSearch = $request->get('search');
		
		$args = ['search' => $search, 'getSearch' => $getSearch];

		return $this->render('search.phtml', $args);
	}

}




 ?>