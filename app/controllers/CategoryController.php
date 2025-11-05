<?php 
	load(['CategoryForm'] , APPROOT.DS.'form');
	use Form\CategoryForm;

	class CategoryController extends Controller
	{
		public function __construct()
		{
			parent::__construct();
			_authRequired([
				USER_TYPES['ADMIN']
			]);
			$this->_form = new CategoryForm();
			$this->model = model('CategoryModel');
		}

		public function index()
		{
			$categories =  $this->model->getAssoc('category');

			$data = [
				'categories' => $categories,
				'title' => 'Categories'
			];

			return $this->view('category/index' , $data);
		}

		public function create()
		{
			if( isSubmitted() )
			{
				$post = request()->posts();

				$res = $this->model->save($post);

				if(!$res) {
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				Flash::set( $this->model->getMessageString() );
				return redirect( _route('category:index') );
			}

			$data = [
				'form' => $this->_form,
				'title' => 'Create Categories'
			];

			return $this->view('category/create' , $data);
		}

		public function edit( $id )
		{
			if(isSubmitted())
			{
				$post = request()->posts();

				$res = $this->model->save($post , $post['id']);

				if(!$res) {
					Flash::set( $this->model->getErrorString() , 'danger');
					return request()->return();
				}

				Flash::set( $this->model->getMessageString() );
				return redirect( _route('category:index') );
			}

			$category = $this->model->get($id);

			$this->_form->init([
				'url' => _route('category:edit' , $category->id)
			]);

			$this->_form->addId( $category->id );

			$this->_form->setValueObject($category);

			$data = [
				'title' => $category->category . ' |Edit',
				'category' => $category,
				'form' => $this->_form
			];

			return $this->view('category/edit' , $data);
		}


		public function enable($id)
		{
			$this->model->update([
				'is_disabled' => false
			], $id);

			Flash::set("Category enabled");
			return request()->return();
		}

		public function disable($id)
		{
			$this->model->update([
				'is_disabled' => true
			], $id);

			Flash::set("Category disbled");
			return request()->return();
		}

	}