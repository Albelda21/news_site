<?php
namespace Controller;
use Library\Controller;
use Library\Request;
//use Library\Pagination\Pagination;
class BookController extends Controller
{
   
       public function indexAction(Request $request)
    {
        $repo = $this->container->get('repository_manager')->getRepository('Book');
        // todo: findActive();
        $books = $repo->findAll();
        
        $args = ['books' => $books];
        
        return $this->render('index.phtml', $args);
    }
    
    
}