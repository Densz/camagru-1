<?php
$form = new BootstrapForm();
?>

<form method="post" action="#">
    <?= $form->input('username', 'Login'); ?>
    <?= $form->input('username', 'Email address'); ?>
    <?= $form->input('password', 'Password', ['type' => 'password']); ?> 
    <?= $form->input('password', 'Password confirmation', ['type' => 'password']); ?> 
    <button class="btn btn-primary">Subscribe</button>
</form>

<hr>
<p>Already have an account? <a href="http://e2r5p7.42.fr:8080/Camagru_AD/3_Model_Cyp/visitorsignin/View/">Sign in</a></p>