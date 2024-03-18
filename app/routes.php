<?php
//defined a few routes "url"=>"controller,method"
$this->addRoute('User/register' , 'User,register');
$this->addRoute('User/login' , 'User,login');
$this->addRoute('Person/index' , 'Person,main');
$this->addRoute('Publication/create' , 'Publication,create');
$this->addRoute('Publication/edit' , 'Publication,edit');

$this->addRoute('User/logout' , 'User,logout');
$this->addRoute('User/update' , 'User,update');
$this->addRoute('User/delete' , 'User,delete');
$this->addRoute('User/securePlace' , 'User,main');
$this->addRoute('Profile/index' , 'Profile,index');
$this->addRoute('Profile/create' , 'Profile,create');
$this->addRoute('Profile/modify' , 'Profile,modify');