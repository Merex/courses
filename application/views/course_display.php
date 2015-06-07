<?php
/*TODO: Change from session var to array passed through parameter, 
error handling:Make sure that when the form is submitted, it does NOT allow you to add a course without a course name. Make sure the course name is at least 15 characters. You can make the course description optional.
Have the most recently added course appear on the top
*/
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to Course Scheduler</title>
	<style type="text/css">

	::selection { background-color: #E13300; color: white; }
	::-moz-selection { background-color: #E13300; color: white; }

	body {
		background-color: #fff;
		margin: 40px;
		font: 13px/20px normal Helvetica, Arial, sans-serif;
		color: #4F5155;
	}

	a {
		color: #003399;
		background-color: transparent;
		font-weight: normal;
	}

	h1 {
		color: #444;
		background-color: transparent;
		border-bottom: 1px solid #D0D0D0;
		font-size: 19px;
		font-weight: normal;
		margin: 0 0 14px 0;
		padding: 14px 15px 10px 15px;
	}

	code {
		font-family: Consolas, Monaco, Courier New, Courier, monospace;
		font-size: 12px;
		background-color: #f9f9f9;
		border: 1px solid #D0D0D0;
		color: #002166;
		display: block;
		margin: 14px 0 14px 0;
		padding: 12px 10px 12px 10px;
	}

	#body {
		margin: 0 15px 0 15px;
	}

	p.footer {
		text-align: right;
		font-size: 11px;
		border-top: 1px solid #D0D0D0;
		line-height: 32px;
		padding: 0 10px 0 10px;
		margin: 20px 0 0 0;
	}

	#container {
		margin: 10px;
		border: 1px solid #D0D0D0;
		box-shadow: 0 0 8px #D0D0D0;
	}

	textarea{
		resize:none;
	}

	table{
	border: 1px black solid;
	}

	td{

	}

	tr{
	outline: 1px black;
	outline-style: ridge;
	}
	th, td {
    padding: 15px;
}
	</style>
</head>
<body>

<div id="container">
	<h1>Add a new Course</h1>
	<form method="post" action="localhost/courses/add">
		<label>Name: <input type="text" size="50" name="c_name"></label><br>
		<label>Description: <textarea cols="40" rows="5" name="c_desc"></textarea></label>
		<button type="submit" value="Submit">Submit</button>
	</form>
	<div id="body">
		<?= $this->session->flashdata('errors') ?>
		<table>
		<tr>
			<th>Course Name</th>
			<th>Description</th>
			<th>Date Added</th>
			<th>Actions</th>	
		</tr>
<?php foreach ($courses as $entry) {
	?><tr><td style="background-color:darkgrey"><?php
			echo $entry['name'];
			$id = $entry['id'];
			?></td><td style="background-color:lightgrey"><?=
 			$entry['description'];
			?></td><td style="background-color:lightgrey"><?=
			$entry['date_added'];
			?></td><td style="background-color:grey">
			<a href="<?= "localhost/courses/destroy/$id" ?>">Delete</a> 			
</td></tr><?php }
?>
		</table>
	</div>
</div>
</body>
</html>