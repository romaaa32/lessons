<?php

namespace Admin\Controller;

class DashboardController extends AdminController
{
    public function index()
    {
//        UPDATE `user` SET `email` = 'admin@admin.com' WHERE `user`.`id` = 1;
        $userModel = $this->load->model('User');

        $userModel->repository->test();

        print_r($userModel->repository->getUsers());

        $this->view->render('dashboard');
    }
}