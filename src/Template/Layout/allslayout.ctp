<!doctype html>
<html>
<head>
<title><?php echo $this->fetch('title') ?></title>
	
</head>


<body>
  <?= $this->element('header')  ?>
    <div class="container clearfix">
        <?= $this->fetch('content') ?>
    </div>
   <footer>
     <?= $this->element('footer')  ?>
   </footer>
</body>





</html>