<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8" />
		<title>Blogs</title>
	</head>
	<style>
	legend{
		margin: 10px auto;
		font-size: 24px;
		font-family: "Calibri";
		font-weight: bold;
		color: #007864;
	}
	input,textarea{
		margin:7px 0px 7px 300px;
		border-radius: 5px;
		width: 700px;
		padding-left: 10px;
		font-size: 20px;
		font-family: "Calibri";
		color: #000000;
		border: 1px solid #225950;
	}
	.button{
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
	</style>
	<body>
		<div >
			<form action="index.php?action=delet-post" method="POST" autocomplete="off">
				<legend>Удаление поста</legend>
				<input type="text" name="title" placeholder="Автор" value="<?php echo $row['author'] ?>">
				<input type="text" name="title" placeholder="Заголовок" value="<?php echo $row['title'] ?>">
				<textarea name="post" rows="3" placeholder="Сообщение" > <?php echo $row['post'] ?> </textarea>
				<input class="button" type="submit" value="Удалить">
				<input type="hidden" name="token" value="<? echo $token ?>">
				<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
			</form>
		</div>
	</body>
</html>