<?php 

namespace Controller;

use Library\Controller;
use Library\Request;
use Model\News;
use Library\Session;
use Library\Router;
use Library\Pagination\Pagination;

	class NewsController extends Controller
	{

		const BOOKS_PER_PAGE = 5;

		public function politicAction(Request $request)
		{
			$repo = $this->container->get('repository_manager')->getRepository('News');
			$page = (int) $request->get('page', 1);
			$count = $repo->count('1');
	        $politics = $repo->findNewsByPage($page, self::BOOKS_PER_PAGE, 1);

	        if (!$politics && $count) {

             $this->container->get('router')->redirect('/politic');
        }

        $pagination = new Pagination(['itemsCount' => $count, 'itemsPerPage' => self::BOOKS_PER_PAGE, 'currentPage' => $page]);
	        
	        $args = ['politics' => $politics, 'pagination' => $pagination];

	        
	        
			return $this->render('politic.phtml', $args);
		}

		public function sportAction(Request $request)
		{
			$repo = $this->container->get('repository_manager')->getRepository('News');
			$page = (int) $request->get('page', 1);
			$count = $repo->count('1');
	        
	        $sports = $repo->findNewsByPage($page, self::BOOKS_PER_PAGE, 2);

	         if (!$sports && $count) {

             $this->container->get('router')->redirect('/sport');
        }

        $pagination = new Pagination(['itemsCount' => $count, 'itemsPerPage' => self::BOOKS_PER_PAGE, 'currentPage' => $page]);
	        
	        
	        $args = ['sports' => $sports, 'pagination' => $pagination];

			return $this->render('sport.phtml', $args);
		}

		public function scienceAction(Request $request)
		{
			$repo = $this->container->get('repository_manager')->getRepository('News');
			$page = (int) $request->get('page', 1);
			$count = $repo->count('1');
	        
	        $sciences = $repo->findNewsByPage($page, self::BOOKS_PER_PAGE, 3);

	        if (!$sciences && $count) {

             $this->container->get('router')->redirect('/science');
        }

             $pagination = new Pagination(['itemsCount' => $count, 'itemsPerPage' => self::BOOKS_PER_PAGE, 'currentPage' => $page]);

	        
	        
	        $args = ['sciences' => $sciences, 'pagination' => $pagination];

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