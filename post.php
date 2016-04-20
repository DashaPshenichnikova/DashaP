<?php

class post{
	public function pages($perpage,$pdo){
		$sth=$pdo -> query("select count(`id`) from messages");
		$count=$sth->fetch();
		$pages=ceil($count[0]/$perpage);
		return $pages;
	}
	public function showposts($perpage,$page,$pdo){
		$limit=$perpage*$page-$perpage;
		$sth=$pdo->query("select * from messages order by `date` desc limit $limit,$perpage");
		return $sth->fetchAll();
	}
	public function postfunc($author,$title,$post,$token,$pdo){
		if(!empty($author) && $token==$_SESSION['token']){
			$new_post = $pdo->prepare("INSERT INTO `messages` SET `author`=:author, `date`=now(), `title`=:title,`post`=:post");
			$new_post->execute([':author' => $author,
				    			':title'=>$title,
				    			':post'=>$post]);
		}
		header("Location: index.php");
	}
	public function del($id,$pdo){
		if(!empty($id)){
	 		$delet_post = $pdo->prepare("delete from `messages` where `id`=:id");
	 		$delet_post->execute([':id'=>$id]);
	 		}
	 	header("Location:index.php");
	}
		public function editfunc($post,$title,$id,$pdo){
			if(!empty($post)){
				$new_post = $pdo->prepare("update `messages` SET `title`=:title, `post`=:post where `id`=:id");
				$new_post->execute([':post'=>$post,
						':title'=>$title,
						':id'=>$id]);
			}
			header("Location:index.php");
	}
	public function showpost($id,$pdo){
		if(!empty($id)){
			$edit_post = $pdo->prepare("select * from `messages` where `id`=:id");
			$edit_post->execute([':id' => $id]);
			$row = $edit_post -> fetch();
			return $row;
		}
	}
}