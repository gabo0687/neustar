<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>NeuStart</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
<?php echo $this->Html->css('style.css'); ?>

<?php echo $this->Html->script('jquery-3.5.1.min.js'); ?>
<?php echo $this->Html->script('scripts.js'); ?>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>



</head>

<body>
	
    
        <?php echo $this->Flash->render(); ?>
        <?php echo $this->fetch('content'); ?>
    
</body>
</html>