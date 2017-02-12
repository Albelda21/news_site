<?php
namespace Controller\Admin;

use Library\Controller;
use Library\Request;
use Library\Session;
use Model\Form\NewsFrom;

class NewsController extends Controller
{
    public function indexAction(Request $request)
    {
        if (!Session::has('user')) {
            $this->container->get('router')->redirect('/login');
        }
        
        $repo = $this->container->get('repository_manager')->getRepository('News');
        
        $news = $repo->findAll();
        
        $args = ['news' => $news];
        
        return $this->render('index.phtml', $args);
    }
    
    public function editAction(Request $request)
    {
        if (!Session::has('user')) {
            $this->container->get('router')->redirect('/login');
        }
        
        $id = $request->get('id');
        $new = $this
            ->container
            ->get('repository_manager')
            ->getRepository('News')
            ->find($id);
            
        // $form = new BookForm($request); // todo
        // if ($request->isPost()) {
        //     if ($form->isValid()) {
        //         // save($book)
        //     }
        // }

            $form = new NewsForm($request); // todo
        if ($request->isPost()) {
            if ($form->isValid()) {
                // save($news)
            }
        }


    }
    
    public function newAction(Request $request)
    {
        
    }
    
    public function deleteAction(Request $request)
    {
        // $id = $request->get('id');
        // $this
        //     ->container
        //     ->get('repository_manager')
        //     ->getRepository('News')
        //     ->removeById($id); 
    }
}