<?php
include 'upload.php'; 

?>
<!DOCTYPE html>
<html>
<title>Imgur Image upload in php</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<link rel="stylesheet" href="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.0/build/styles/atom-one-dark-reasonable.min.css">
<script src="//cdn.jsdelivr.net/gh/highlightjs/cdn-release@9.13.0/build/highlight.min.js"></script>
<script>hljs.initHighlightingOnLoad();</script>
<body>
<header class="w3-container w3-teal">
  <h1 class='w3-center'>Imgur Image Upload</h1>
</header>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- #2 new ad for blog responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3641343196914554"
     data-ad-slot="1990645199"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<div class='w3-content w3-center'>
<form class="w3-border w3-padding w3-round w3-margin" action="index.php" method="post" enctype="multipart/form-data">
  <p>
  <label><b>Select Image - </b></label>
  <input type="file" name="image" id="image"></p>
  <p>
  <input type="submit" class='w3-blue w3-round w3-btn' name="submit" value="Submit"></p>
  <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- #2 new ad for blog responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3641343196914554"
     data-ad-slot="1990645199"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
<br>
</form>

</div>

<div class='w3-content'>
<?php
	
	if(isset($_POST['submit'])){
	$path = "images/";
	$image = $_FILES['image']['tmp_name'];
	
	$image = json_decode(upload_image($path,$image),true);
	echo "<pre>";
	echo "<b><h1>Image -</h1></b><img src=".$image['data']['link']." class='w3-image'>";
	echo "<br>";
	echo "<b><h1>Image Link -</h1></b> <a href=".$image['data']['link'].">".$image['data']['link']."</a>";	


?>
<pre><code class='json'><?php print_r($image); ?></code></pre>
<script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js"></script>
<!-- #2 new ad for blog responsive -->
<ins class="adsbygoogle"
     style="display:block"
     data-ad-client="ca-pub-3641343196914554"
     data-ad-slot="1990645199"
     data-ad-format="auto"
     data-full-width-responsive="true"></ins>
<script>
(adsbygoogle = window.adsbygoogle || []).push({});
</script>
	<?php } ?>
</div>

</body>
</html>