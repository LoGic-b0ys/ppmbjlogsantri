<?php
	/*
		* Class ini mengatur tentang apa saja yang diperlukan oleh blog page
		* Seperti : 
		- Blog page memerlukan web component ini, menu ini dan lain
		- Article page memerlukan data posting, posting terkait dsb

		@package controller
		@author Logic_boys
	*/
	class Blog extends Frontend_Controller
	{

		public function __construct()
		{
			parent::__construct();

			$this->load->model('Web_Component_m');
			$this->load->model('Category_m');
			$this->load->model('Post_m');
		}
		
		/*
			* Method ini merupakan method untuk memanggil list blog post
		*/
		public function index($page = 0)
		{
			//fetch the data
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE,0,1);

			$postPerPage = 3;
			$this->data['totalPost'] = $this->Post_m->get_total();

			$this->data['previous'] = $page - $postPerPage;
			$this->data['next'] = $page + $postPerPage;


			$this->data['postData'] = $this->Post_m->get_full(array('sticky' => 0), FALSE, $postPerPage, $page);

			//load page
			$this->data['title'] = "Blog | ".$this->data['title']->value;
			$this->data['subview'] = 'blog';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk memanggil info artikel berdasarkan id dari artikel yang bersangkutan

			@param $id int: article id yang akan ditampilkan
		*/
		public function post($id)
		{
			//fetch the data
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('id' => $id), TRUE);

			//load page
			$this->data['title'] = $this->data['postData']->title." | ".$this->data['title']->value;
			$this->data['subview'] = 'post';
			$this->load->view('front/main_layout', $this->data);
		}

		/*
			* Method ini merupakan method untuk memanggil list dari post dengan kategori tertentu melalui kategori id yang bersangkutan

			@param $id int: id dari kategori yang akan ditampilkan
		*/
		public function category($id)
		{
			//fetch data from database
			$this->data['catData'] = $this->Category_m->get();
			$this->data['stickyData'] = $this->Post_m->get_full(array('sticky' => 1), TRUE);
			$this->data['postData'] = $this->Post_m->get_full(array('categories' => $id));
			$catName = $this->Category_m->get_by(array('cat_id' => $id), TRUE)->name;

			//load page
			$this->data['title'] = $catName." | ".$this->data['title']->value;
			$this->data['subview'] = 'blog';
			$this->load->view('front/main_layout', $this->data);
		}
	}
?>