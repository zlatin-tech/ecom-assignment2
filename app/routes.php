<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/register' , 'User,register');
$this->addRoute('User/login' , 'User,login');
$this->addRoute('Main/index' , 'Publication,main');
$this->addRoute('Publication/create' , 'Publication,create');
$this->addRoute('Publication/edit/{publication_id}' , 'Publication,edit');
$this->addRoute('Publication/store' , 'Publication,store');
$this->addRoute('Publication/view/{id}' , 'Publication,displayPublicationById');
$this->addRoute('Publication/update/{publication_id}' , 'Publication,update');
$this->addRoute('Publication/delete' , 'Publication,delete');

$this->addRoute('User/logout' , 'User,logout');
$this->addRoute('User/update' , 'User,update');
$this->addRoute('User/delete' , 'User,delete');
$this->addRoute('User/securePlace' , 'User,securePlace');
$this->addRoute('Profile/index' , 'Profile,index');
$this->addRoute('Profile/create' , 'Profile,create');
$this->addRoute('Profile/modify' , 'Profile,modify');