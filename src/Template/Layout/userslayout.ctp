<!doctype html>
<html>
<head>
<title><?php echo $this->fetch('title') ?></title>
<link rel="stylesheet" href="<?php echo $this->url->css('bootstrap.min.css') ?>">
</head>


<body>

  <?= $this->element('header')  ?>
    <div class="container clearfix">
    	<?= $this->Flash->render() ?>
        <?= $this->fetch('content') ?>
    </div>
   <footer>
     <?= $this->element('footer')  ?>
   </footer>
</body>





</html>