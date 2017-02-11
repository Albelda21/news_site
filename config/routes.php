<?php

use Library\Route;

return  array(
    // site routes
    'default' => new Route('/', 'Site', 'index'),
    'index' => new Route('/index.php', 'Site', 'index'),
    'politic' => new Route('/politic', 'News', 'politic'),
    'sport' => new Route('/sport', 'News', 'sport'),
    'science' => new Route('/science', 'News', 'science'),
    'politic_page' => new Route('/politic-{id}\.html', 'News', 'show', array('id' => '[0-9]+') ),
    'contact_us' => new Route('/contact-us', 'Site', 'contact'),
    'login' => new Route('/login', 'Security', 'login'),
    'logout' => new Route('/logout', 'Security', 'logout'),
    'cart_list' => new Route('/cart', 'Cart', 'showList'),
    'cart_add' => new Route('/cart/add/{id}', 'Cart', 'add', array('id' => '[0-9]+')),
    
    // admin routes
    'admin_default' => new Route('/admin', 'Admin\\Default', 'index'),
    'admin_books' => new Route('/admin/books', 'Admin\\Book', 'index'),
    'admin_book_edit' => new Route('/admin/books/edit/{id}', 'Admin\\Book', 'edit', array('id' => '[0-9]+')),
);