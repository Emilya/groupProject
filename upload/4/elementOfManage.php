public function actionCreate()
	{
		$model=new Extenshions;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Extenshions']))
		{
			$model->attributes=$_POST['Extenshions'];
			if($model->save())
				$this->redirect(array('index'));
		}

		$this->render('create',array(
			'model'=>$model,
		));
	}