<?php

class Dashboard extends CI_Controller
{
	public function __construct()
	{
		parent::__construct();
	}

	public function index()
	{
		$this->slice->view('pages.admin.dashboard');
	}
}
