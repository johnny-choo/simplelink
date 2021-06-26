<?php
if (!empty($_POST['link'])&&!empty($_POST['short'])) {
  $link=$_POST["link"];
  
 if(strpos($link, "http://") !== 0||strpos($link, "https://") !== 0){
  if (filter_var($link, FILTER_VALIDATE_URL)) {
    $short=$_POST["short"];
if (file_exists($short)) {
    echo "<h1 style='text-align:center;'>short link already exist</h1>";
} else {
mkdir($short);
$myfile = fopen($short."/index.php", "w") or die("failed");
$txt = '<?php
  header("Location: '.$link.'");
?>';
fwrite($myfile, $txt);
fclose($myfile);
echo '<style>
input{
    margin-top:30vh;
  width: 100%;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 4px;
  resize: vertical;
}</style><h1 style="text-align:center;"><input type="text" value="http://'.$_SERVER['HTTP_HOST']."/".$short.'" id="myInput">
<button onclick="myFunction()">Copy text</button></h1>

<script>
function myFunction() {
  var copyText = document.getElementById("myInput");
  copyText.select();
  copyText.setSelectionRange(0, 99999)
  document.execCommand("copy");
}
</script>';
} 
  }
}

}
?>