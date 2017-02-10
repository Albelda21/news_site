<?php 

namespace Controller;

use Library\Controller;
use Library\Request;
use Model\News;
use Library\Session;
use Library\Router;

	class NewsController extends Controller
	{
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

		public function showAction(Request $request)
    	{
	        $repo = $this->container->get('repository_manager')->getRepository('News');
	        $id = $request->get('id');
	        $news = $repo->find($id);
	        
	        return $this->render('show.phtml', compact('news'));
    	}
	}

	 ?>