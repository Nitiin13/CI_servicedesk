<?php $config=array(
'signin'=>array(array(
		'field'=>'email',
		'label'=>'Email:',
		'rules'=>'required|trim'),
		array(
		'field'=>'pass',
		'label'=>'Password:',
		'rules'=>'required|trim')
	),
'signup'=>array(array(
		'field'=>'name',
		'label'=>'Name:',
		'rules'=>'required|trim|xss_clean'),
		array(
		'field'=>'email',
		'label'=>'Email:',
		'rules'=>'required|trim|valid_email|is_unique[users.email]'),
		array(
		'field'=>'pass',
		'label'=>'Password:',
		'rules'=>'required|matches[cpass]|md5'),
		array(
		'field'=>'cpass',
		'label'=>'CPassword:',
		'rules'=>'required')
		),
'ticket-add'=>array(
			array(
		'field'=>'ticket-title',
		'label'=>'ticket-title:',
		'rules'=>'required|trim'),
		array(
		'field'=>'ticket-detail',
		'label'=>'Description:',
		'rules'=>'required|trim')
		)
		);

		?>