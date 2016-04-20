<?php

 class router {
 	public $action;
 	public function action (){
 		$action=empty($_GET['action']) ? 'home' : $_GET['action'];
			if (empty($_SESSION['login']) && $action!='authorization'){
				$action='forma';
		}
		$this->action=$action;
 	}

 	public function route($pdo){
 		$action=$this->action;
 		switch ($action) {
 	 		case 'forma':
 	 			echo template('authorization2.php', ['login'=>empty($_SESSION['login'])?'': $_SESSION['login'],'token'=>token()]);
 	 		break;

 			case 'authorization':
 				$user=new user();
 				$user->login($_POST['pass'],$_POST['login'],$_POST['token'],$pdo);
 			break;

 			case 'registr':
 				$user=new user();
 				$user->regist($_POST['pass'], $_POST['login'], $_POST['name'], $_POST['token'], $pdo);
 			break;

 			case 'edit':
 				$write=new post();
 				$row=$write->showpost($_GET['id'],$pdo);
 				echo template('edit.php', ['row'=>$row, 'token'=>token()]);
 			break;

 			case 'edit-post':	
 				$edit=new post();
 				$edit->editfunc($_POST['post'],$_POST['title'],$_POST['id'],$pdo);
 			break;

 			case 'delet':
 				$write=new post();
 				$row=$write->showpost($_GET['id'],$pdo);
 				echo template('delet.php', ['row'=>$row, 'token'=>token()]);
 			break;

 			case 'delet-post':
 	 			$delet=new post();
 	 			$delet->del($_POST['id'],$pdo);
 			break;

 			case 'newpost':
 				$post_new=new post();
 				$post_new->postfunc($_POST['author'],$_POST['title'],$_POST['post'],$_POST['token'],$pdo);
 			break;

 			case 'exit':
 				unset($_SESSION);
 				header('Location:index.php?action=forma');
 			break;

 			default:
 				$page=empty($_GET['page']) ? 1 : (int)$_GET['page'];
 				$post=new post();
 				$row=$post->showposts(5,$page,$pdo);
 				$pages=$post->pages(5,$pdo);
 				echo template ('index2.php',['row'=>$row,'token'=>token(), 'pages'=>$pages]);
 			break;
 		}
 	}
 }
 