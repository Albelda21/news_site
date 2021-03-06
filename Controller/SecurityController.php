<?php 

namespace Controller;

use Library\Controller;
use Library\Request;
use Library\Password;
use Model\Form\LoginForm;
use Model\Form\RegisterForm;
use Library\Session;
use Library\Router;

class SecurityController extends Controller
{
	public function loginAction(Request $request)
	{
		$form = new LoginForm($request);
		if ($request->isPost()) {
			if ($form->isValid()) {
				$password = new Password($form->password);
				$email = $form->email;

				$repo = $this->container->get('repository_manager')->getRepository('User');
				if ($user = $repo->find($email, $password)) {
					
					Session::set('user', $user->getEmail());
					Session::setFlash('Login success');
					$this->container->get('router')->redirect('/admin');
				} 
				
			}
			Session::setFlash('Fill the filds!');
		}
		//$repo = $this->container->get('repository_manager')->getRepository('User');
		return $this->render('login.phtml', ['form' => $form]);
	}

	public function logoutAction(Request $request)
	{
		Session::remove('user');
		Session::setFlash('Logout success');
		Router::redirect('/');
	}

	public function registerAction(Request $request)
	{
		$form = new RegisterForm($request);
		
		if ($request->isPost()) {
			if($form->isValid()) {
				$password = new Password($form->password);
				$email = $form->email;
				$repo = $this->container->get('repository_manager')->getRepository('User');
				
			}
		}





		return $this->render('register.phtml', ['form' => $form]);
	}
}


 ?>