<?
include('class/fileSend/sendFile.class.php');

//echo "<pre>"; //print_r($_FILES); //echo "</pre>";

//$file, $user, $sigla,

print_r($_FILES);

$file=new fileSend($_FILES, 42685, 'PORTAL');
//$msg=$file->uploadFile();

//$msg=$file->getFile(175);

//$msg=$file->delTmpFile(175);

print_r($msg);


unset($file);
?>