<?php
if (isset($_POST["link"])) {
  $link=$_POST["link"];
 if(strpos($link, "http://") !== false||strpos($link, "https://") !== false){   
}else{$link="http://".$link;}
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
}</style><h1 style="text-align:center;"><input type="text" value="https://'.$_SERVER['HTTP_HOST']."/".$short.'" id="myInput">
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
?>