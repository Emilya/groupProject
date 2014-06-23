<?php

class SiteController extends Controller
{
    public $avatar;
	/**
	 * Declares class-based actions.
	 */


	public function actions()
	{
		return array(
			// captcha action renders the CAPTCHA image displayed on the contact page
			'captcha'=>array(
				'class'=>'CCaptchaAction',
				'backColor'=>0xFFFFFF,
			),
			// page action renders "static" pages stored under 'protected/views/site/pages'
			// They can be accessed via: index.php?r=site/page&view=FileName
			'page'=>array(
				'class'=>'CViewAction',
			),
		);
	}

	/**
	 * This is the default 'index' action that is invoked
	 * when an action is not explicitly requested by users.
	 */
	public function actionIndex()
	{
		if(Yii::app()->user->isGuest){
            $this->redirect(Yii::app()->createUrl('/site/login'));
        }
        $user=User::model()->findByPk(Yii::app()->user->id);
		$this->render('index',array('user'=>$user));
	}

	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		if($error=Yii::app()->errorHandler->error)
		{
			if(Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}

	/**
	 * Displays the contact page
	 */
	public function actionContact()
	{
		$model=new ContactForm;
		if(isset($_POST['ContactForm']))
		{
			$model->attributes=$_POST['ContactForm'];
			if($model->validate())
			{
				$name='=?UTF-8?B?'.base64_encode($model->name).'?=';
				$subject='=?UTF-8?B?'.base64_encode($model->subject).'?=';
				$headers="From: $name <{$model->email}>\r\n".
					"Reply-To: {$model->email}\r\n".
					"MIME-Version: 1.0\r\n".
					"Content-Type: text/plain; charset=UTF-8";

				mail(Yii::app()->params['adminEmail'],$subject,$model->body,$headers);
				Yii::app()->user->setFlash('contact','Thank you for contacting us. We will respond to you as soon as possible.');
				$this->refresh();
			}
		}
		$this->render('contact',array('model'=>$model));
	}

	/**
	 * Displays the login page
	 */
    public function actionLogin(){
        $this->layout='login';
        $model=new LoginForm;
        if(isset($_POST['LoginForm'])){
            $model->attributes=$_POST['LoginForm'];
            if($model->validate() && $model->login()){
                $this->redirect(Yii::app()->user->returnUrl);
            }
        }
        $this->render('login',array('model'=>$model));
    }
    public function actionRegistration() {
        $this->layout='login';
        $model = new User;
        if(isset($_POST['ajax']) && $_POST['ajax']==='registration-form'){
            echo CActiveForm::validate($model);
            Yii::app()->end();
        }
        if(isset($_POST['User'])){
            $model->attributes = $_POST['User'];
             if($model->save()){
                 $dir = dirname(__FILE__).'/../../upload/'.$model->id;
                 if(!file_exists($dir)) {
                     mkdir("./upload/".$model->id);
                 }
                $auth_user = new LoginForm();
                $auth_user->username = $model->email;
                $auth_user->password = $model->password;
                if($auth_user->login()){
                    $this->redirect(Yii::app()->user->returnUrl);
                }

            } else {
                echo json_encode($model->errors);
                Yii::app()->end();
            }
        }
        $this->render('registration',array('model'=>$model));
    }

    public function actionLogout(){
        Yii::app()->user->logout();
        $this->redirect(Yii::app()->homeUrl);
    }

    public function actionEdit(){

        $model=User::model()->findByPk(Yii::app()->user->id);
        if(isset($_POST['User']))
        {
            $model->attributes=$_POST['User'];
            $model->photo=CUploadedFile::getInstance($model,'photo');
            if($model->save()) {
                $path = dirname(__FILE__).'/../../upload/avatar/';
                if ($model->photo){
                    $model->photo->saveAs($path.$model->photo->name);
                }
            }
            $this->redirect(array('index'));
        }

        $this->render('edit', array('model'=>$model));
    }

    public function actionServer() {
        $dataProvider=new CActiveDataProvider('Files', array(
            'criteria' => array(
                'order'  => 'id DESC',
                'offset' => 2,
            ),
        ));
        $this->render('server',array(
            'dataProvider'=>$dataProvider,
        ));
    }
    public function actionMySuccess() {
        $dataProvider=new CActiveDataProvider('Files', array(
            'criteria' => array(
                'condition' => 'id = :userId',
                'params' => array(':userId' => Yii::app()->user->id),
                'order'  => 'id DESC',
                'offset' => 2,
            ),
        ));
        $this->render('server',array(
            'dataProvider'=>$dataProvider,
        ));
    }
    public function actionDocumentation() {
        $dataProvider=new CActiveDataProvider('Files', array(
            'criteria' => array(
                'condition' => 'level = :level',
                'params' => array(':level' => 1),
                'order'  => 'id DESC',
            ),
        ));
        $this->render('server',array(
            'dataProvider'=>$dataProvider,
        ));
    }
    public function actionReiting(){
        $users = User::model()->findAll();
        foreach ($users as $user) {
            $chats = Chat::model()->count('user_id = :user', $params=array(':user'=>$user->id));
            $files = Files::model()->count('user_id = :user', $params=array(':user'=>$user->id));
            $user->reiting = $chats+$files;
            $user->save();
        }
        $dataProvider=new CActiveDataProvider('User', array(
            'criteria' => array(
                'order'  => 'reiting DESC',
            ),
        ));
        $this->render('reiting',array(
            'dataProvider'=>$dataProvider,
        ));
    }
    public function actionUpload() {
        $dataProvider=new CActiveDataProvider('Extenshions');

         $model=new Files();

        if(isset($_POST['Files']))
        {
            $model->attributes=$_POST['Files'];
            $model->name=CUploadedFile::getInstance($model,'name');
            $model->user_id = Yii::app()->user->id;
            $model->user_name = Yii::app()->user->name;
            $model->extenshion = $model->name->getExtensionName();
            $model->size = $model->name->size;
            $model->level = $model->getLevel($model->extenshion);

            if(($model->checkLevel($model->level,$model->user_id)) and ($model->level)){
                if($model->save()) {
                    $dir = dirname(__FILE__).'/../../upload/'.Yii::app()->user->id;
                    if(!file_exists($dir)) {
                      mkdir($dir);
                    }
                    if ($model->name){
                        $model->name->saveAs($dir.'/'.$model->name->name);
                    }

                }

            }
            $this->redirect(array('server'));
        }
        $this->render('form',array(
            'model'=>$model,
            'dataProvider'=>$dataProvider,
        ));
    }
    public function actionArchive(){
        if(isset($_POST['Dependencies']))
        {
            $module = Dependencies::model()->findByPk($_POST['Dependencies']['name']);
            $parts = explode(",", $module->parts);
            $criteria = new CDBCriteria;
            $criteria->addInCondition('id', $parts);
            $allArchive = Dependencies::model()->findAll($criteria);
            $arrFolders = array();
           /* foreach ($allArchive as $arr) {
                $arrFolders[] = $arr->user;
            }*/

            $zip = new ZipArchive();
            $zip->open("./upload/archive/".Yii::app()->user->id."_backup_".date('j_m_Y_H_i_s').".zip", ZipArchive::CREATE);
            $zip_file = "./upload/archive/".Yii::app()->user->id."_backup_".date('j_m_Y_H_i_s').".zip";

           foreach ($allArchive as $arr) {
                $src_dir = './upload/'.$arr->user."/";
                $dirHandle = opendir('./upload/'.$arr->user);
                while (false !== ($file = readdir($dirHandle))) {
                    if(strlen($file)>=4){
                        $zip->addFile($src_dir.$file, $file);
                    }
                }
           }
           $zip->close();

           Yii::import('ext.helpers.EDownloadHelper');
           EDownloadHelper::download($zip_file);

        }else{
            $model = new Dependencies();
            $this->render('archive',array(
                'model'=>$model,
            ));
        }
    }

    public function actionOnline(){
        $data = $_POST["data"];
        $chat = new Chat();
        if(isset($data) and $data !=''){
            $chat->message = $data;
            $chat->user_id = Yii::app()->user->id;
            $chat->created = date("Y-m-d H:i:s");
            $chat->save();
        }
        $all = Chat::model()->findAll();
        $allMessage = array();
        foreach ($all as $test){
            if($test->user->id == Yii::app()->user->id){
                $allMessage[] = CHtml::tag('div', array('class'=>'wrapChat alert alert-success'),
                    CHtml::tag('div', array('class'=>'nameChat'),$test->user->name).
                    CHtml::tag('div', array('class'=>'dateChat'),date("G:i, d.m.Y", strtotime($test->created))).
                    CHtml::tag('div', array('class'=>'messageChat'),$test->message));
            }else{
            $allMessage[] = CHtml::tag('div', array('class'=>'wrapChat alert alert-info'),
                CHtml::tag('div', array('class'=>'nameChat'),$test->user->name).
                CHtml::tag('div', array('class'=>'dateChat'),date("G:i, d.m.Y", strtotime($test->created))).
                CHtml::tag('div', array('class'=>'messageChat'),$test->message));
            }
        }

        $response = $allMessage;
        echo json_encode($response);
    }
}
