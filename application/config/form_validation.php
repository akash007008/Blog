<?php 
$config=[
			'add_article_rules' => [
										[
											'field'=>'title',
											'label'=>'Article Title',
											'rules'=>'required|alpha_numeric_spaces'
										],
										[
											'field'=>'body',
											'label'=>'Article Body',
											'rules'=>'trim|required'
										]
									],

			'admin_login' =>      	[
										[
											'field'=>'uname',
											'label'=>'Username',
											'rules'=>'trim|required|alpha_numeric'
										],
										[
											'field'=>'pass',
											'label'=>'password',
											'rules'=>'trim|required|alpha_numeric'
										]

									],
			'register'	=>          [
										[
											'field'=>'fname',
											'label'=>'First Name',
											'rules'=>'trim|required|alpha_numeric_spaces'
										],
										[
											'field'=>'lname',
											'label'=>'Last Name',
											'rules'=>'trim|required|alpha_numeric_spaces'
										],
										[
											'field'=>'uname',
											'label'=>'Username',
											'rules'=>'trim|required|alpha_numeric_spaces|is_unique[users.uname]'
										],
										[
											'field'=>'pass',
											'label'=>'Password',
											'rules'=>'trim|required|alpha_numeric'
										],
										[
											'field'=>'cpass',
											'label'=>'Confirm Password',
											'rules'=>'trim|required|alpha_numeric|matches[pass]'
										]
										

									]

		];


 ?>