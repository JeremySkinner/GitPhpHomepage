<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" >
<head runat="server">
    <title>Git</title>
	<link rel="Stylesheet" type="text/css" href="content/Site.css" />
	<!--[if IE 7]> <style type="text/css">@import "content/IE7-override.css";</style> <![endif]-->
	<script type="text/javascript" src="content/jquery-1.4.1.min.js"></script>
	<script type="text/javascript" src="content/jquery.modal.js"></script>
</head>
<body>
    <div>
      
<div class="repositoryContainer">
		<h1>Repositories</h1>	
		
		<a href="javascript:void(0)" class="createRepository">Create a new bare repository</a>
		<div class="clear"></div>

		<ul id="repositories">
			<?php foreach($repositories as $repo) { ?>
				<li>
					<a class="repository" href="javascript:void(0)" title="<?php echo $repo->getUrl() ?>">
						<?php echo $repo->getName() ?>
					</a>
				</li>
			<?php } ?>
		</ul>

	</div>

	<div class="jqmWindow" id="dialog">
		<div class="title">Clone the repository using this command <a href="#" class="jqmClose"><img src="content/images/close.png" alt="Close" /></a></div>		
		<div class="content">			
			<pre>git clone <input type="text" id="repository-url" /></pre>
		</div>
	</div>

	<div class="jqmWindow" id="createRepositoryDialog">
		<div class="title">Create a new repository <a href="#" class="jqmClose"><img src="content/images/close.png" alt="Close" /></a></div>		
		<div class="content">
		<form method="post" action="createrepository.php">

			<input type="text" name="project" />.git<br /><br />
			<input type="checkbox" id="allowAnonymousPush" value="true" name="allowAnonymousPush" />
			<label for="allowAnonymousPush">Allow anonymous pushes</label>
			<br /><br />
			<input type="submit" value="Create a new repository" class="button" />
			

		</form>
		</div>
	</div>

<script type="text/javascript">
	$(function () {
		$('#dialog').jqm();
		$('#createRepositoryDialog').jqm();

		$('#repository-url').click(function () {
			$(this).select();
		});

		$('a.repository').click(function () {
			var url = $(this).attr('title');
			$('#dialog').jqmShow();
			$('#repository-url').val(url).focus().select();
		});

		$('a.createRepository').click(function () {
			$('#createRepositoryDialog').jqmShow();
		});
	});
</script>
	  
		<div id="footer">
			
		</div>
    </div>
</body>
</html>
