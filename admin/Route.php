<?php

$this->router->add('login', '/admin/login', 'LoginController:form');
$this->router->add('dashboard', '/admin/', 'DashboardController:index');
$this->router->add('aut-admin', '/admin/auth/', 'LoginController:authAdmin', 'POST');