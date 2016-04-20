<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blogs</title>
	</head>
	<style>
	.new-post{
		width: 100%;
	}
	.new-post-text{
		margin:7px 0px 7px 300px;
		border-radius: 5px;
		width: 700px;
		padding-left: 10px;
		font-size: 20px;
		font-family: "Calibri";
		color: #000000;
		border: 1px solid #225950;
	}
	.button-new-post{
		margin:10px;
		border-radius: 5px;
		width: 150px;
		padding-left: 10px;
		font-size: 18px;
		font-family: "Calibri";
		background:#7DC9BD;
		color: #ffffff; 
		border: 1px solid #225950;
	}
	.posts{
		width: 700px;
		margin: 10px auto;
	}
	span{
		font-size: 20px;
		font-family: "Calibri";
	}
	legend{
		margin: 10px auto;
		font-size: 24px;
		font-family: "Calibri";
		font-weight: bold;
		color: #007864;
	}
	a{
		color: #225950;
	}
	.exit{
		color: #225950;
		float: right;
	}
	.qwe{
		text-align: center;
		margin: 0 auto;
		font-family: 'Calibri';
		font-style: italic;
	}
	.page{
		color: #007864;
		text-decoration: none;
		border:1px solid #007864;
		margin-right: 5px;
		border-radius: 100px;
		padding: 10px;
		background: #C1ECE4;
		font-weight: bold;
	}
	.page:hover{
		color: #225950;
		text-decoration: underline;
	}
	</style>
	<body>
	<a href="index.php?action=exit" class="exit">Выход</a>
		<div class="new-post">
			<form action="index.php?action=newpost" method="POST" autocomplete="off">
				<legend>Пост</legend>
				<input class="new-post-text" type="text" name="author" placeholder="Автор">
				<input class="new-post-text" type="text" name="title" placeholder="Заголовок">
				<textarea class="new-post-text" name="post" rows="3" placeholder="Сообщение"></textarea>
				<input class="button-new-post" type="submit" value="Отправить">
				<input type="hidden" name="token" value="<?php echo $token; ?>">
			</form>
		</div>
		<div class="posts">
			<span> <?php foreach ($row as $key => $value) { 
					echo "<p>".$value["author"]."<br><a href='index.php?action=edit&id=".$value['id']."'>".$value["title"]."</a><br>".htmlspecialchars($value["post"])."<br>".$value["date"]."<br><a href='index.php?action=delet&id=".$value['id']."'>Удалить"."</a></p>"; } ?></span>
		</div>  
		
		<div class="qwe">
			<?php 
				for ($page=1; $page<=$pages;$page++){
					echo "<a class=\"page\"  href='index.php?page=$page'> $page </a>";
			}
			?>
		</div>

	</body>
</html>