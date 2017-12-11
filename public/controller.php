<?php
$current_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
$path = parse_url($current_link, PHP_URL_PATH);
$pathFragments = explode('/', $path);
$end = end($pathFragments);
?>

<html>
  <head>
    <script src="http://code.jquery.com/jquery-latest.min.js"></script>
  </head>
<body> 
  

  
  <h3>Here is the sliced url (we dont need it in future)<h3>
    <div>
      <h4> <u><?php echo $end ?></u></h4>
    </div>
  <br>
  <br>
 

  <h3>Controller, Pick a file and read its content<h3>
    <h4>This is a bit im confused in so you want replace the url with the text file words?<h4>
  
<form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="post" enctype="multipart/form-data">
<input type="file" name="file" size="60" />
<input type="submit" value="Read Contents" />
</form>
</body>
</html>

<?php
if($_FILES){
  if($_FILES['file']['name'] != "") {
  
  if(isset($_FILES) && $_FILES['file']['type'] != 'text/plain') {
  echo "<h3>File could not be accepted ! Please upload any '*.txt' file.</h3>";
  exit();
  } 
  echo "<center><h3 id='Content'>Contents of ".$_FILES['file']['name']." File</h3></center>";
  
  $fileName = $_FILES['file']['tmp_name'];
  
  $file = fopen($fileName,"r") or exit("Unable to open file!");
   
  while(!feof($file)) {
  echo fgets($file). "";
  }
   
  while(!feof($file)) {
 echo fgetc($file);
 }
 fclose($file);
 }

 else {
 if(isset($_FILES) && $_FILES['file']['type'] == '')
 echo "<h3>Please Choose a file by click on 'Browse' or 'Choose File' button.</h3>";
 }
 
}
?>