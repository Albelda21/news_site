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

            Router::redirect('/index.php?router=news/politic');
        }

        $pagination = new Pagination(['itemsCount' => $count, 'itemsPerPage' => self::BOOKS_PER_PAGE, 'currentPage' => $page]);
	        
	        $args = ['politics' => $politics, 'pagination' => $pagination];

	        
	        
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