<?php
namespace Phppot;

use Phppot\DataSource;
require_once __DIR__ . '/lib/ImageModel.php';
$imageModel = new ImageModel();
if (isset($_POST['send'])) {
    if (file_exists('../uploads/' . $_FILES['image']['name'])) {
        $fileName = $_FILES['image']['name'];
        $_SESSION['message'] = $fileName . " file already exists.";
    } else {
        $result = $imageModel->uploadImage();
        $id = $imageModel->insertImage($result);
        if (! empty($id)) {
            $_SESSION['message'] = "Image added to the server and database.";
        } else {
            $_SESSION['message'] = "Image upload incomplete.";
        }
    }
    header('Location: index.php');
}

?>
<html>
<head>
<link href="assets/style.css" rel="stylesheet" type="text/css" />
</head>
<body>

	<div class="form-container">
		<h1>Add new image</h1>
		<form action="" method="post" name="frm-add"
			enctype="multipart/form-data" onsubmit="return imageValidation()">
			<div Class="input-row">
				<input type="file" name="image" id="input-file" class="input-file"
					accept=".jpg,.jpeg,.png">
			</div>
			<input type="submit" name="send" value="Submit" class="btn-link"> <span
				id="message"></span>
	
	</div>

	</form>

	<script src="https://code.jquery.com/jquery-3.6.0.min.js"
		integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4="
		crossorigin="anonymous"></script>
	<script src="assets/validate.js"></script>
</body>
</html>

   