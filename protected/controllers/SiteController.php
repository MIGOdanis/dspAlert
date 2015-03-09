<?php
/**
 * 搜尋控制器
 * 
 * 主要功能為聯絡我們、首頁、會員登入頁、廠商登入頁、會員註冊、臉書會員註冊、臉書登入、臉書登出
 * 廠商忘記密碼、會員忘記密碼。
 *
 * @author	KeaNy
 * @date	2013.3
 * @spend	1 day
 * ------------------
 * 新增將聯絡我們資料儲存到資料庫 actionContact
 *
 * @author	KeaNy
 * @date	2013.3.28
 * @spend	30 min
 * ------------------
 * 修改註冊會員欄位驗證 actionRegister
 *
 * @author	KeaNy
 * @date	2013.7.10
 * @spend	30 min
 * ------------------
 * 新增會員登入頁面 actionLogin
 *
 * @author	KeaNy
 * @date	2013.7.11
 * @spend	30 min
 * ------------------
 * 忘記密碼改為發送重設密碼確認信 actionRecover actionCompanyForgetPassword
 *
 * @author	KeaNy
 * @date	2013.7.11
 * @spend	2 hour
 * ------------------
 * 加上臉書登入註冊和帳號連結 actionFbregister, actionFblogin, actionFbconnect, actionFbdisconnect
 *
 * @author	KeaNy
 * @date	2013.7.16
 * @spend	8 hour
 * ------------------
 * 修改會員登入程序 actionLogin
 *
 * @author	KeaNy
 * @date	2013.7.18
 * @spend	5 min
 * ------------------
 * 首頁套版，將部分轉成widget actionIndex
 *
 * @author	KeaNy
 * @date	2013.8.5
 * @spend	1 hour
 * ------------------
 * 會員登入時沒有指定頁面直接進入會員主頁 actionLogin
 *
 * @author	KeaNy
 * @date	2013.8.19
 * @spend	15 min
 * ------------------
 * 重新編寫"取得手動設定之熱門或當日優惠，分層置入陣列" manually_preferential
 *
 * @author	KeaNy
 * @date	2013.9.11
 * @spend	30 min
 * ----------------
 * 檢舉文章加下拉選單
 *
 * @author 	Danis
 * @date    2013.6.14
 * @spend   2 hour
 * ----------------
 * 首頁套版 v1
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 week
 * ----------------
 * 指定優惠訊息 ad_preferential
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 取得手動設定之熱門或當日優惠，分層置入陣列 manually_preferential
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 取得手動設定之有效位置之後填充未設定之區域 preferential
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 熱門話題 hot_topics
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 將話題透過字詞篩選完畢之後置入陣列 topics
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 排行榜 get_feature
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 公告與活動訊息 get_bulletin
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 首頁套版 get_bulletin
 *
 * @author 	Danis
 * @date    2013.7.26
 * @spend   1 Week
 * ----------------
 * Ajax 建議字 ( 地區 ) actionLocation_prompt
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * Ajax 建議字 ( 關鍵字 ) actionKeyword_prompt
 *
 * @author 	Danis
 * @date    2013.8.26
 * @spend   1 Day
 * ----------------
 * 首頁套版 v2
 *
 * @author 	Danis
 * @date    2013.9.02
 * @spend   1 Week 
 * ----------------
 * 會員登入後回到原先頁面 actionLogin
 *
 * @author KeaNy
 * @date 2013.9.24
 * @spend 1 min
 * ----------------
 * 臉書登入加上判斷網址使用測試帳號 init actionFblogin actionFbregister
 *
 * @author KeaNy
 * @date 2013.9.24
 * @spend 15 min
 * ----------------
 * 修改臉書登入條件判斷 actionFblogin
 *
 * @author KeaNy
 * @date 2013.9.25
 * @spend 15 min
 * ----------------
 * 會員登入後回到會員專區 actionLogin
 *
 * @author KeaNy
 * @date 2013.9.25
 * @spend 1 min
 * ----------------
 * 修改會員專區網址名稱 actionLogin actionFblogin
 *
 * @author KeaNy
 * @date 2013.9.25
 * @spend 1 min
 * ----------------
 * 清空token移到認證通過後，修改會員專區路徑 actionResetPassword
 *
 * @author KeaNy
 * @date 2013.10.1
 * @spend 5 min
 * ----------------
 * 新版加入會員和會員註冊完成頁 actionRegister actionRegisted
 *
 * @author KeaNy
 * @date 2013.10.1
 * @spend 30 min
 * ----------------
 * 加入附近店家功能
 *
 * @author Danis
 * @date 2013.10.3
 * @spend 30 min
 * ----------------
 * 附近店家 nearby 移至 mode information
 *
 * @author Danis
 * @date 2013.10.7
 * @spend 5 min
 * ----------------
 * 修改FB登入用的認證 actionFbLogin
 *
 * @author KeaNy
 * @date 2013.10.14
 * @spend 1 min
 * ----------------
 * 調整使用到的變數 actionLogin actionCompanyLogin
 *
 * @author KeaNy
 * @date 2013.10.14
 * @spend 5 min
 * ----------------
 * 寫入登入時間 actionLogin
 *
 * @author KeaNy
 * @date 2013.10.15
 * @spend 5 min
 * ----------------
 * 首頁優惠區塊改靜態頁面生成
 *
 * @author Danis
 * @date 2013.10.15
 * @spend 15 min
 *  ---------------------
 * 修改驗證碼更新次數
 *
 * @author Danis
 * @date 2013.10.15
 * @spend 5 min
 * ----------------
 * 首頁主題區塊改靜態頁面生成
 *
 * @author Danis
 * @date 2013.10.16
 * @spend 5 min
 * ----------------
 * 首頁熱門話題靜態頁面生成
 *
 * @author Danis
 * @date 2013.10.16
 * @spend 5 min
 * ----------------
 * 首頁公告靜態頁面生成
 *
 * @author Danis
 * @date 2013.10.16
 * @spend 5 min
 * ----------------
 * 首頁活動靜態頁面生成
 *
 * @author Danis
 * @date 2013.10.16
 * @spend 5 min
 * ---------------------
 * 執行 php Formatting
 *
 * @author Danis
 * @date 2013.10.18
 * @spend 10 min 
 * ---------------------
 * 修改首頁顯示人數的參數取得方式
 *
 * @author KeaNy
 * @date 2013.10.21
 * @spend 15 min
 * ---------------------
 * 新增店家註冊和店家註冊完成
 *
 * @author KeaNy
 * @date 2013.11.5
 * @spend 2 hour
 * ---------------------
 * 套入新版聯絡我們
 *
 * @author Danis
 * @date 2013.11.6
 * @spend 15 min
 * ---------------------
 * 調整程式，刪除掉部分$model->scenario，可以直接用$model = new User('register')將scenario寫在變數中
 *
 * @author KeaNy
 * @date 2013.11.6
 * @spend 15 min
 * ---------------------
 * 調整臉書註冊，改用會員註冊的頁面 fbregister
 *
 * @author KeaNy
 * @date 2013.11.6
 * @spend 30 min
 * ------------------
 * 修改會員登入和店家登入，加上驗證碼
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 15 min 
 * ------------------
 * 修改會員忘記密碼和店家忘記密碼，加上驗證碼，刪除忘記密碼完成頁
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 2 hour
 * ------------------
 * 預設版型改成一欄式
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 1 min
 * ------------------
 * 取消重設密碼後直接登入 actionResetPassword
 *
 * @author KeaNy
 * @date 2013.11.7
 * @spend 5 min
 * ------------------
 * 新增重設密碼設定完成 actionResetPasswordDone
 *
 * @author KeaNy
 * @date 2013.11.8
 * @spend 5 min
 * ------------------
 * 微調部分程式碼
 *
 * @author KeaNy
 * @date 2013.11.8
 * @spend 15 min
 * ------------------
 * 修改店家登入檔案名稱
 *
 * @author KeaNy
 * @date 2013.11.12
 * @spend 1 min
 * ------------------
 * 修改店家註冊，改成存到店家註冊資料表 actionCompanyRegister
 *
 * @author KeaNy
 * @date 2013.11.13
 * @spend 30 min
 * ---------------------
 * 加入註冊後增加庫幣
 *
 * @author Danis
 * @date 2013.11.26
 * @spend 20 min
 * ---------------------
 * 修改登入後轉頁的路徑
 *
 * @author KeaNy
 * @date 2013.11.28
 * @spend 30 min
 * ---------------------
 * 加上登入判斷
 *
 * @author KeaNy
 * @date 2013.11.28
 * @spend 30 min
 * ---------------------
 * 修改初始化的判斷 init
 *
 * @author KeaNy
 * @date 2013.11.28
 * @spend 5 min
 * ---------------------
 * 修改郵件伺服器參數 contactEmail
 *
 * @author KeaNy
 * @date 2013.11.28
 * @spend 1 min
 * ---------------------
 * 修改郵件伺服器參數 contactEmail
 *
 * @author KeaNy
 * @date 2013.11.29
 * @spend 5 min
 * ---------------------
 * 修改聯絡我們 contactEmail
 *
 * @author KeaNy
 * @date 2013.11.29
 * @spend 5 min
 * ------------------
 * 套入信件內容
 *
 * @author Danis
 * @date 2013.11.29
 * @spend 45 min
 * ------------------
 * 登入後轉到會員專區
 *
 * @author KeaNy
 * @date 2013.11.29
 * @spend 1 min
 * ------------------
 * 店家登入新增判斷
 *
 * @author KeaNy
 * @date 2013.12.23
 * @spend 5 min
 * ------------------
 * 新增臉書按讚獎勵功能
 *
 * @author Danis
 * @date 2013.12.31
 * @spend 180 min
 * -------------------
 * 修改忘記密碼驗證
 *
 * @author Danis 
 * @date 2014.1.8
 * @spend 10 min
 * ------------------
 * 修改廠商註冊驗證
 *
 * @author Danis
 * @date 2014.1.8
 * @spend 30 min
 * ------------------
 * 修改廠商註冊驗證 (流程修改)
 *
 * @author Danis
 * @date 2014.1.8
 * @spend 5 min
 * ------------------
 * fb註冊點數補充
 *
 * @author Danis
 * @date 2014.1.10
 * @spend 5 min
 * ------------------
 * FB-SDK資料夾位置修改
 * 
 * @author Danis
 * @date 2014.1.15
 * @spend 5 min
 * ------------------
 * 修正註冊有時無法通過驗證的bug
 *
 * @author Danis
 * @date 2014.1.27
 * @spend 10 min
 * ------------------
 * 新增function accessLog 登入紀錄 
 *
 * @author Danis
 * @date 2014.2.11
 * @spend 15 min
 * ------------
 * 欄位名稱修改
 *
 * @author	Danis
 * @date 	2014.2.11
 * @spend  	1 min
 * ------------
 * 新增轉址頁
 *
 * @author Danis
 * @date 2014.2.19
 * @spend 10 min
 * ------------
 * 登入紀錄地點欄位
 *
 * @author	Danis
 * @date 	2014.2.24
 * @spend  	10 min
 * ------------
 * 轉址頁補充熱門類別轉址
 *
 * @author	Danis
 * @date 	2014.3.3
 * @spend  	10 min
 * -------------------
 * 首頁熱門話題類別增加轉址
 *
 * @author Danis 
 * @date 2014.3.4
 * @spend 10 min
 * -------------------
 * 修改登入判斷已登入會員重新導向
 *
 * @author Danis 
 * @date 2014.4.29
 * @spend 10 min
 * -------------------
 * 程式架構調整
 *
 * @author Danis 
 * @date 2014.4.29
 * @spend 5 min
 * -------------------
 * 修改首頁
 *
 * @author KeaNy
 * @date 2014.5.27
 * @spend 5 min
 * -------------------
 * 配地圖說明增加分流頁面
 *
 * @author Danis 
 * @date 2014.6.25
 * @spend 5 min
 * -------------------
 * 移出ip取得
 *
 * @author Danis 
 * @date 2014.8.8
 * @spend 5 min
 */
class SiteController extends Controller
{
	public $layout = 'column1';
	private $fb_appId;
	private $fb_secret;
	
	public function init()
	{
		if ($_SERVER['HTTP_HOST'] == '127.0.0.1' or $_SERVER['HTTP_HOST'] == 'localhost') {
			$this->fb_appId = Yii::app()->params['fb_appId_dev'];
			$this->fb_secret = Yii::app()->params['fb_secret_dev'];
		} else {
			$this->fb_appId = Yii::app()->params['fb_appId'];
			$this->fb_secret = Yii::app()->params['fb_secret'];
		}
	}
	
	/**
	 * Declares class-based actions.
	 */
	public function actions()
	{
		return array(
			// 驗證碼
			'captcha' => Yii::app()->params['captcha'],
		);
	}
	
	/**
	 * This is the action to handle external exceptions.
	 */
	public function actionError()
	{
		print_r(Yii::app()->errorHandler->error); exit;
		if ($error = Yii::app()->errorHandler->error) {
			if (Yii::app()->request->isAjaxRequest)
				echo $error['message'];
			else
				$this->render('error', $error);
		}
	}
	
	/**
	 * 聯絡我們
	 * 儲存到資料庫後寄信給系統管理員
	 */
	public function actionContact()
	{
		$model = new Contact('verifyCode');
		if (isset($_POST['Contact'])) {			
			$model->attributes = $_POST['Contact'];
			$model->create_time = time();
			if($model->save()){
				if ($this->contactEmail($model)) {
					Yii::app()->user->setFlash('contact', '<div class="alert alert-success"><p>感謝您的來信，我們會盡快回覆。</p></div>');
				} else {
					Yii::app()->user->setFlash('contact', '<div class="alert alert-primary"><p>系統維護中，請稍後再試。</p></div>');
					$this->refresh();
				}
			}
		}
		
		$this->render('contact', array(
			'model' => $model
		));
	}
	
	/**
	 * 聯絡我們的寄信功能
	 * @param object $model
	 * @return object 寄信
	 */
	public function contactEmail($model)
	{
		$mailer = Yii::createComponent('application.extensions.mailer.EMailer');
		$mailer->Host = Yii::app()->params['smtpHost'];
		$mailer->SMTPAuth = Yii::app()->params['smtpAuth'];
		$mailer->Username = Yii::app()->params['smtpUsername'];
		$mailer->Password = Yii::app()->params['smtpPassword'];
		$mailer->IsSMTP();
		$mailer->From = $model->email;
		$mailer->AddReplyTo($model->email);
		$mailer->AddAddress(Yii::app()->params['adminEmail']);
		$mailer->FromName = $model->name;
		$mailer->CharSet = 'UTF-8';
		$mailer->Subject = Yii::t('demo', $model->subject);
		$mailer->Body = $model->body;
		return $mailer->Send();
	}

	/**
	 * 登入狀態判斷
	 */	
	public function loginCheck()
	{
		//已登入判斷	
		if (isset(Yii::app()->user->company_id)){
			$this->redirect(array('/company-admin'));
		}elseif (!Yii::app()->user->isGuest){
			//重新導向
			if(isset($_GET['redirect'])){
				$this->redirect(array($_GET['redirect']));
			}		
			$this->redirect(array('/member-admin'));
		}
	}

	/**
	 * 會員登入
	 */
	public function actionLogin()
	{

		$this->loginCheck();

		if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
			throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");
		
		$model = new LoginForm;
		
		if (!isset(Yii::app()->session['login-fail'])) {
			Yii::app()->session['login-fail'] = 0;
		} 
		
		if (Yii::app()->session['login-fail'] >= 2) {
			$model->scenario = "verifyCode";
		}
		
		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
		
		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$_POST['LoginForm']['username'] = trim($_POST['LoginForm']['username']);
			$model->attributes = $_POST['LoginForm'];
			
			if ($model->validate() && $model->login()) {
				if (Yii::app()->user->level == 0) {
					Yii::app()->session['login-fail'] = 0;
					
					// 寫入登入時間
					$user = User::model()->findByPk((int) Yii::app()->user->id);
					$user->login_time = time();
					$user->save();

					//重新導向
					if(isset($_GET['redirect'])){
						$this->redirect(array($_GET['redirect']));
					}

					$this->redirect(array('/member-admin'));

//					if (!strstr($_SERVER['HTTP_REFERER'], 'site/login'))
//						$this->redirect($_SERVER['HTTP_REFERER']);
//					else if (Yii::app()->user->returnUrl != Yii::app()->baseUrl . '/')
//						$this->redirect(Yii::app()->user->returnUrl);
//					else
//						$this->redirect(array('/member-admin'));

				} else {
					Yii::app()->user->logout(false);
					$this->redirect(array('site/login?error'));
				}
			}
			
			Yii::app()->session['login-fail'] = Yii::app()->session['login-fail'] + 1;
		}
		
		if (isset($_GET['error'])) {
			Yii::app()->user->setFlash('user-login', '會員登入失敗');
		}
		
		$this->render('login', array(
			'model' => $model
		));
	}
	
	/**
	 * 廠商登入
	 */
	public function actionCompanyLogin()
	{
		
		$this->loginCheck();
		
		if (!defined('CRYPT_BLOWFISH') || !CRYPT_BLOWFISH)
			throw new CHttpException(500, "This application requires that PHP was compiled with Blowfish support for crypt().");
		
		$model = new LoginForm;
		
		if (!isset(Yii::app()->session['login-fail'])) {
			Yii::app()->session['login-fail'] = 0;
		} 
		
		if (Yii::app()->session['login-fail'] >= 2) {
			$model->scenario = "verifyCode";
		}
		
		// if it is ajax validation request
		if (isset($_POST['ajax']) && $_POST['ajax'] === 'login-form') {
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}

		// collect user input data
		if (isset($_POST['LoginForm'])) {
			$_POST['LoginForm']['username'] = trim($_POST['LoginForm']['username']);
			$model->attributes = $_POST['LoginForm'];
			
			if ($model->validate() && $model->login()) {
				if (Yii::app()->user->level == 2 and !empty(Yii::app()->user->company_id)) {
					Yii::app()->session['login-fail'] = 0;
					$this->accessLog(Yii::app()->user->company_id,"一般店家登入");
					$this->redirect(array('company/index'));
				} else {
					Yii::app()->user->logout(false);
					$this->redirect(array('site/companyLogin?error'));
				}
			}
			
			Yii::app()->session['login-fail'] = Yii::app()->session['login-fail'] + 1;
		}
		
		if (isset($_GET['error'])) {
			Yii::app()->user->setFlash('company-login', '廠商登入失敗');
		}
		
		$this->render('company_login', array(
			'model' => $model
		));
	}

	/**
	 * 建立登入紀錄
	 * @param int $id user id
	 * @param string $from 登入方式 (ex : fb登入 一般店家登入)
	 */
	public function accessLog($id,$from)
	{
		$ip = $this->getUserIp();

		if($ip == "127.0.0.1"){
			$loc = "本機登入";
		}else{
			 $db = Yii::app()->db;
			 $command = $db->createCommand
			("
				SELECT loc. * 
				FROM sc_geoip_blocks
				JOIN sc_geoip_locations loc ON locations_id = loc.id
				WHERE INET_ATON( '" . $ip . "' ) 
				BETWEEN block_start 
				AND block_end
				LIMIT 0 , 1
			");
			$result = $command->queryAll();
			$loc = $result[0]['country'] . "," . $result[0]['city'];
		}
		$model = new AccessLog();
		$model->user_id = $id;
		$model->ip = $ip;
		$model->browser = $_SERVER["HTTP_USER_AGENT"];
		$model->login_from = $from;
		$model->create_time = time();
		$model->localtion = $loc;
		$model->save();
	}

	
	/**
	 * 登出並轉回首頁
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout(false);
		$this->redirect(Yii::app()->homeUrl);
	}
	
	/**
	 * 首頁
	 */
	public function actionIndex()
	{
		$this->layout = '';
		$userCount = User::model()->count("level = 0") + Yii::app()->params['siteSetting']['number_of_people'];
		$this->render('index', array(
			'userCount' => $userCount
		));
	}
	
	/**
	 * Ajax 建議字 ( 地區 )
	 */
	public function actionLocation_prompt()
	{
		$return = array();
		$criteria = new CDbCriteria;
		$criteria->addCondition("t.name LIKE :keyword");
		$criteria->params[':keyword'] = '%' . $_POST['kwd'] . '%';
		$remplacer = RemplacerGeo::model()->find($criteria);
		
		$criteria2 = new CDbCriteria;
		$criteria2->addCondition("name LIKE :location");
		$criteria2->params[':location'] = (count($remplacer) > 0) ? $remplacer['remplacer'] : '%' . $_POST['kwd'] . '%';
		$city = City::model()->findAll($criteria2);
		$area = Area::model()->findAll($criteria2);
		
		if (count($city) > 0) {
			foreach ($city AS $row) {
				array_push($return, $row['name']);
			}
		}
		if (count($area) > 0) {
			foreach ($area AS $row) {
				array_push($return, $row['name']);
			}
		}
		header('Content-type: application/json');
		echo CJSON::encode($return);
		Yii::app()->end();
	}
	
	/**
	 * Ajax 建議字 ( 關鍵字 )
	 */
	public function actionKeyword_prompt()
	{
		$return = array();
		$criteria = new CDbCriteria;
		$criteria->addCondition("t.keyword LIKE :keyword");
		$criteria->params[':keyword'] = '%' . $_POST['kwd'] . '%';
		$keyword = Keyword::model()->findAll($criteria);
		if (count($keyword) > 0) {
			foreach ($keyword AS $row) {
				$return[] = $row['keyword'];
			}
		}
		header('Content-type: application/json');
		echo CJSON::encode($return);
		Yii::app()->end();
	}
	
	/**
	 * 廠商忘記密碼
	 */
	public function actionCompanyRecover()
	{
		$newUser = new User('recover');
		
		if (isset($_POST['User'])) {
			$newUser->attributes = $_POST['User'];
			if ($newUser->validate()) {			
				$user = User::model()->findByAttributes(array(
					'level' => 2,
					'username' => $_POST['User']['username']
				));
				
				if ($user!==null) {
					$user->scenario = 'reset';

					// 建立token
					$token = substr(MD5($user->username . time()), 0, 16);
					$user->reset_password_token = $token;
					if ($user->save()) {
						// Email
						$mail = $this->getMail("forgetPassword.html");
						$address = $user->username;
						$subject = '【KuruMap庫嚕網】店家重設密碼連結通知';
						$link = "<a href=\"" . Yii::app()->createAbsoluteUrl('site/resetPassword') . "?token={$token}\">重新設定密碼</a>";
						$message = str_replace("{link}", $link , $mail);
						if (!$this->email($address, $subject, $message)) {
							Yii::app()->user->setFlash('company_recover', '發信系統發生錯誤，請稍後再試。');
						} else {
							$this->redirect('?done');
						}
					}
				} else {
					Yii::app()->user->setFlash('company_recover', '搜尋沒有任何結果，請重新輸入。');
				}
			}
		}
		
		$this->render('company_recover', array(
			'user' => $newUser
		));
	}
	
	/**
	 * 加入會員
	 * 完成註冊後轉到完成頁面
	 */
	public function actionRegister()
	{
		if (!Yii::app()->user->isGuest)
			$this->redirect(array('/member-admin'));

		$model = new User('register');

		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			
			if (!empty($_POST['User']['birthday_month']) && !empty($_POST['User']['birthday_day']) && !empty($_POST['User']['birthday_year'])) {
				$model->birthday = $_POST['User']['birthday_month'] . '/' . $_POST['User']['birthday_day'] . '/' . $_POST['User']['birthday_year'];
			}
			
			if (!empty($_POST['User']['password']))
				$model->password = $model->hashPassword($_POST['User']['password']);
			
			$model->allow_emails = 1;
			$model->subscribe_edm = 1;
			$model->active = 1;
			$model->create_time = time();


			$pointSetting = PointSetting::model()->find(array(
				"condition" => "t.key = 'after_register'"
			));
			
			if ($pointSetting['value'] > 0) {
				$model->point = $pointSetting['value'];
			}
			if ($model->save()) {

				if ($pointSetting['value'] > 0) {
					$chk = PointLog::model()->save_log(0, $model->id, $pointSetting['value'], $pointSetting['name'],0);
				}

				// Email
				$mail = $this->getMail("register.html");
				$address = $_POST['User']['username'];
				$subject = '【KuruMap庫嚕網】會員通知信';
				$repUsername = str_replace("{mail}", $_POST['User']['username'] , $mail);
				$message = str_replace("{passwd}", substr_replace($_POST['User']['password'],"xxx",0,3) , $repUsername);
				$this->email($address, $subject, $message);

				$loginForm = new LoginForm;
				$loginForm->username = $model->username;
				$loginForm->password = $_POST['User']['password'];
				if ($loginForm->validate() && $loginForm->login()) {
					$this->redirect(array('registed'));
				}
			}
		}
		
		$model->password = '';
		$model->repeat_password = '';
		
		$this->render('register', array(
			'model' => $model
		));
	}
	
	/**
	 * 臉書會員註冊
	 * 完成註冊後轉到完成頁面
	 */
	public function actionFbregister()
	{
		if (!Yii::app()->user->isGuest)
			$this->redirect(array('/member-admin'));
		
		require Yii::getPathOfAlias('fb-sdk') . '/src/facebook.php';
		
		$facebook = new Facebook(array(
			'appId' => $this->fb_appId,
			'secret' => $this->fb_secret
		));
		
		$user = $facebook->getUser();
		
		if ($user) {
			try {
				$user_profile = $facebook->api('/me');
			}
			catch (FacebookApiException $e) {
				// error_log($e);
				$user = null;
			}
		}
		
		if ($user === null) {
			$error = array(
				'message' => '請稍後再試'
			);
			$this->render('error', $error);
			Yii::app()->end();
		}
		
		$model = new User('register');
		$model->username = $user_profile['email'];
		$model->name = $user_profile['name'];
		$model->nickname = $user_profile['first_name'];
		$birthday = explode('/', $user_profile['birthday']);
		$model->birthday_month = (int) $birthday[0];
		$model->birthday_day = (int) $birthday[1];
		$model->birthday_year = (int) $birthday[2];
		$model->gender = ($user_profile['gender'] == 'female') ? 1 : 2;
		
		if (isset($_POST['User'])) {

			//抓取庫幣參數
			$pointSetting = PointSetting::model()->find(array(
				"condition" => "t.key = 'after_register'"
			));
			$model->attributes = $_POST['User'];
			
			if (!empty($_POST['User']['birthday_month']) && !empty($_POST['User']['birthday_day']) && !empty($_POST['User']['birthday_year'])) {
				$model->birthday = $_POST['User']['birthday_month'] . '/' . $_POST['User']['birthday_day'] . '/' . $_POST['User']['birthday_year'];
			}
			
			if (!empty($_POST['User']['password']))
				$model->password = $model->hashPassword($_POST['User']['password']);
			
			$model->allow_emails = 1;
			$model->subscribe_edm = 1;
			$model->active = 1;
			$model->create_time = time();
			$model->facebook_account = $user_profile['email'];

			//加入庫幣
			if ($pointSetting['value'] > 0) {
				$model->point = $pointSetting['value'];
			}
			if ($model->save()) {

				//紀錄庫幣
				if ($pointSetting['value'] > 0) {
					$chk = PointLog::model()->save_log(0, $model->id, $pointSetting['value'], $pointSetting['name'],0);
				}

				$loginForm = new LoginForm;
				$loginForm->username = $model->username;
				$loginForm->password = $_POST['User']['password'];
				if ($loginForm->validate() && $loginForm->login()) {
					$this->redirect(array('registed'));
				}
			}
		}		
		
		$model->password = '';
		$model->repeat_password = '';
		
		$this->render('register', array(
			'model' => $model,
			'facebook' => $facebook,
			'user' => $user
		));
	}
	
	/**
	 * 會員註冊完成頁
	 */
	public function actionRegisted()
	{
		$user = User::model()->with(array(
			'activity_city',
			'activity_area'
		))->findByPk((int) Yii::app()->user->id);
		$nearby = Information::model()->nearby($user->activity_area_id);
		$this->render('registed', array(
			'user' => $user,
			'nearby' => $nearby
		));
	}
	
	/**
	 * 會員忘記密碼
	 */
	public function actionRecover()
	{
		if (!Yii::app()->user->isGuest)
			$this->redirect(array('/member-admin'));
		
		$model = new User('recover');
		
		if (isset($_POST['User'])) {
			$model->attributes = $_POST['User'];
			if ($model->validate()) {
				$user = User::model()->findByAttributes(array(
					'username' => $_POST['User']['username'],
					'level' => 0
				));
				if ($user!==null) {
					$user->scenario = 'reset';
					
					// 建立token
					$token = substr(MD5($user->username . time()), 0, 16);
					$user->reset_password_token = $token;
					if ($user->save()) {
						// Email
						$mail = $this->getMail("recover.html");
						$address = $user->username;
						$subject = '【KuruMap庫嚕網】會員重設密碼連結通知';
						$link = "<a href=\"" . Yii::app()->createAbsoluteUrl('site/resetPassword') . "?token={$token}\">重新設定密碼</a>";
						$message = str_replace("{link}", $link , $mail);
						if (!$this->email($address, $subject, $message)) {
							Yii::app()->user->setFlash('recover', '發信系統發生錯誤，請稍後再試。');
						} else {
							$this->redirect('?done');
						}
					}
				} else {
					Yii::app()->user->setFlash('recover', '搜尋沒有任何結果，請重新輸入。');
				}
			}
		}
		
		$model->password = '';
		
		$this->render('recover', array(
			'model' => $model
		));
	}
	
	/**
	 * 重設密碼頁
	 * @param string $token Token
	 */
	public function actionResetPassword($token)
	{
		if (!Yii::app()->user->isGuest)
			$this->redirect(array('/member-admin'));
		
		if (empty($token))
			$this->redirect(array('/'));
		
		$model = User::model()->findByAttributes(array(
			'reset_password_token' => $token
		));
		
		if ($model===null)
			$this->redirect(array('/'));
		
		$model->scenario = 'resetpassword';
		
		if (isset($_POST['User'])) {
			if ($model->saveModel($_POST['User']) === true) {
				$model->reset_password_token = '';
				if ($model->save()) {
					$this->redirect(array('site/resetPasswordDone'));
				}
			}
		}
		
		$model->password = '';
		$model->repeat_password = '';
		
		$this->render('reset_pw', array(
			'model' => $model
		));
	}
	
	/**
	 * 重設密碼設定完成
	 */
	public function actionResetPasswordDone()
	{
		$this->render('reset_pw_done');		
	}	

	/**
	 * 臉書登入
	 */
	public function actionFblogin()
	{
		//已登入判斷	
		$this->loginCheck();		

		require Yii::getPathOfAlias('fb-sdk') . '/src/facebook.php';
		
		$facebook = new Facebook(array(
			'appId' => $this->fb_appId,
			'secret' => $this->fb_secret
		));
		
		$user = $facebook->getUser();
		
		if ($user) {
			try {
				$user_profile = $facebook->api('/me');
			}
			catch (FacebookApiException $e) {
				// echo '<pre>'.htmlspecialchars(print_r($e, true)).'</pre>';
				$user = null;
			}
		}
		
		if ($user !== null) {
			//重新導向
			if(isset($_GET['redirect'])){
				$this->redirect(array($_GET['redirect']));
			}
			
			$model = User::model()->findByAttributes(array(
				'facebook_account' => $user_profile['email'],
				'level' => 0,
				'active' => 1
			));
			
			if ($model === null) {
				$this->redirect(array('site/fbregister'));
			}
			
			$identity = new UserIdentity($model->username, $model->password);
			$identity->remoteAuthenticate();
			Yii::app()->user->login($identity, NULL);
			$this->redirect(array('/member-admin'));
		}
		
		$this->redirect(array('site/login'));
	}
	
	/**
	 * 連結臉書
	 */
	public function actionFbconnect()
	{
		$model = User::model()->findByPk(Yii::app()->user->id);
		$model->scenario = 'facebook';
		$model->facebook_account = $_POST['email'];
		if ($model->save())
			echo 1;
		else
			echo 0;
	}
	
	/**
	 * 停止連結臉書
	 */
	public function actionFbdisconnect()
	{
		$model = User::model()->findByPk(Yii::app()->user->id);
		$model->scenario = 'facebook';
		$model->facebook_account = '';
		if ($model->save())
			echo 1;
		else
			echo 0;
	}
	
	/**
	 * 店家註冊
	 * 完成註冊後轉到完成頁面
	 */
	public function actionCompanyRegister()
	{
		if (isset(Yii::app()->user->company_id))
			$this->redirect(array('/company-admin'));
		else if (!Yii::app()->user->isGuest)
			$this->redirect(array('/member-admin'));
		
		$model = new CompanyRegister;
		$user = new User('chkUserName');

		if(isset($_POST['User']) && isset($_POST['CompanyRegister'])){
			$user->attributes = $_POST['User'];
			$model->attributes = $_POST['CompanyRegister'];
			$model->username = $_POST['User']['username'];
			$model->cityarea = $_POST['cityarea'];
			if ($user->validate() && $model->save()) {
				$this->redirect(array('companyRegisted'));
			}
		}

		$this->render('company_register', array(
			'model' => $model,
			'user' => $user
		));
	}	
	
	/**
	 * 店家註冊完成頁
	 */
	public function actionCompanyRegisted()
	{
		$this->render('company_registed');
	}	

	/**
	 * 臉書按讚
	 */
	public function actionFbLikeChk()
	{	
		$model="";
		if(Yii::app()->user->isGuest){
			$model = new LoginForm;
		}
		$this->render('fblike_chk', array(
			'model' => $model,
			'appId' => $this->fb_appId,
		));
	}

	/**
	 * 轉址 (適用於資料庫內有紀錄之連結)
	 * $_GET['type'] 為資料表判別
	 * $_GET['id'] 為資料編號
	 */
	public function actionRedirectUrl()
	{	
		switch($_GET['type']){
			case "adPreferntial":
				$model = IndexPreferential::model()->findByPk((int)$_GET['id']);
				$link = $model->url;
				break;

			case "bulletin":
			case "activity":
				$model = Bulletin::model()->findByPk((int)$_GET['id']);
				$link = $model->link;
				break;

			case "banner":
				$model = Banner::model()->findByPk((int)$_GET['id']);
				$link = $model->link;
				break;

			case "ad":
				$model = Ad::model()->findByPk((int)$_GET['id']);
				$link = $model->link;
				break;		

			case "hotCategory":
				$model = Feature::model()->findByPk((int)$_GET['id']);
				$link = $model->url;
				break;
			
			case "hotCategoryImage":
				$model = FeatureCategory::model()->findByPk((int)$_GET['id']);
				$link = $model->image_url;
				break;	
		}

		//不正常狀態時候導回首頁(id錯誤或連結為空的時候)
		if(!isset($link) || empty($link)){
			$link = array('/');
		}

		$this->redirect($link);
	}


	/**
	 * 按讚後送出點數
	 */
	public function actionFbLikeGp()
	{	
		$user_like = "";

		require Yii::getPathOfAlias('fb-sdk') . '/src/facebook.php';
		
		$facebook = new Facebook(array(
			'appId' => $this->fb_appId,
			'secret' => $this->fb_secret
		));

		$fb_user = $facebook->getUser();
		if ($fb_user) {
			try {
				$user_like = $facebook->api('/me/likes/553731008043791','GET');
			}
			catch (FacebookApiException $e) {
				// error_log($e);
				$fb_user = null;
			}
		}

		//判斷是否有按讚
		if(!empty($fb_user) && !empty($user_like) && !Yii::app()->user->isGuest){
			$fb_id = $facebook->api('/me','GET');
			//抓取資料
			$user = User::model()->findByPk(Yii::app()->user->id);

			$pointSetting = PointSetting::model()->find(array(
				"condition" => "t.key = 'fb_like'"
			));

			$chkLog = FbLike::model()->find(array(
				"condition" => "t.user_id = '" . Yii::app()->user->id . "' OR t.fb_id = '" . $fb_id['id'] . "'"
			));

			//確認是否已經領取
			if(empty($chkLog)){
				//確認送出點數是否為0
				if($pointSetting->value > 0){
					$user->point = $user->point + $pointSetting->value;	
					if($user->save()){
						//送出成功區 存入紀錄
						PointLog::model()->save_log(0, Yii::app()->user->id, $pointSetting->value, $pointSetting->name, 0, $pointSetting->id);
						//存入領取紀錄
						
						$model = new FbLike;
						$model->user_id = Yii::app()->user->id;
						$model->fb_id = $fb_id['id'];
						$model->create_time = time();
						$model->save();

						echo CJSON::encode(array(
							"data" => "感謝您完成本次活動！已將庫幣發放到您帳號中。"
						));
						Yii::app()->end();
					}else{
						//存入失敗
						echo CJSON::encode(array(
							"data" => "系統忙碌中，請稍後重試或與我們聯繫。"
						));
						Yii::app()->end();
					}
				}else{
					//送出點數為0
					echo CJSON::encode(array(
						"data" => "活動已經結束，下次請早。"
					));
					Yii::app()->end();
				}
			}else{
				//已經領過
				echo CJSON::encode(array(
					"data" => "您已經領取過囉！"
				));
				Yii::app()->end();
			}

		}else{
			//可能有錯 JS驗證通過 PHP 驗證失敗
			echo CJSON::encode(array(
				"data" => "系統忙碌中，請稍後重試或與我們聯繫。",
				"err" => $user,
				"ul" => $user_like,
				"uid" => Yii::app()->user->id

			));
			Yii::app()->end();
		}

	}
	/**
	 * 地圖說明頁面
	 */
	public function actionMapExplain()
	{
		if($this->checkMobile()){
			$this->redirect(array('/pages/mapproxs'));
		}else{
			$this->redirect(array('/pages/mappro'));			
		}
	}
}