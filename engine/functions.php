<?php


function render($file, $variables = [])
{
	if (!is_file($file)) {
		echo 'Template file "' . $file . '" not found';
		exit();
	}

	if (filesize($file) === 0) {
		echo 'Template file "' . $file . '" is empty';
		exit();
	}


	$templateContent = file_get_contents($file);

	foreach ($variables as $key => $value) {
		if (!is_string($value)) {
			continue;
		}

		$key = '{{' . strtoupper($key) . '}}';

		$templateContent = str_replace($key, $value, $templateContent);
	}

	return $templateContent;
}

/*function galleryDraw($img){
	$images = scandir(WWW_DIR . $img);
	foreach($images as $image){
		if(is_file(WWW_DIR . $img . $image)){
			$result .= render(TEMPLATES_DIR . 'gallery_item.tpl', [
				'src' => IMG_DIR . $image,
			]);	
		}
	}	
	return $result;
}*/

function DB(){
	$connect = mysqli_connect('localhost', 'root', '', 'php_1');
	mysqli_query($connect, "SET CHARACTER SET 'utf8'");
	mysqli_set_charset($connect, 'utf8');
	return $connect;
}

function createGallery(){
	$db = DB();	
	$query = mysqli_query($db, 'SELECT * FROM `gallery` ORDER BY count_view DESC');
	$i = -1;
	while($row = mysqli_fetch_assoc($query)){
		$rows[] = $row;
		$i++;
		$result .= render(TEMPLATES_DIR . 'gallery_item.tpl', [
				'src' => $rows[$i]['src'],
				'id' => $rows[$i]['id'],
				'count_view' => $rows[$i]['count_view'],
			]);	
	}	
	return $result;
	mysql_close($db);
}

function galleryimg($id){
	$db = DB();	
	$query = mysqli_query($db, 'SELECT * FROM `gallery` WHERE id = '.$id);
	
	while($row = mysqli_fetch_row($query)){
		$result .= render(TEMPLATES_DIR . 'galleryimg.tpl', [
				'id' => $row[0],
			]);	
	}
	mysqli_query($db, 'UPDATE `gallery` SET count_view = count_view + 1 WHERE id = '.$id);
	return $result;
	mysql_close($db);
}

