<html>
<head>
	<title>Blog</title>
</head>
<body>
	<h1>Welcome to blog</h1>
	<?php
	
		foreach($blog as $blog_item):
		?>
			<h1><?php echo $blog_item['title'] ?></h1>
			<p><?php echo $blog_item['text'] ?></p>
			<a href=blog/<?php echo $blog_item['slug']?>>View Blog</a>
		<?php
	endforeach
		?>  
		
</body>

</html>