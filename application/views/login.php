<?php include 'layout/header.php';?>

<br><br>
<div class="container">
    <h2>Login</h2>

    <?php if($this->session->flashdata('msg')){
      echo "<h3>".$this->session->flashdata('msg')."</h3>";
    }
    ?>

<?php echo validation_errors(); ?>
    <?php echo form_open('login/login_user'); ?>
  <div class="mb-3">
    <label for="exampleInputEmail1" class="form-label">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email">
    
  <div class="mb-3">
    <label for="exampleInputPassword1" class="form-label">Password</label>
    <input type="password" class="form-control" id="exampleInputPassword1" name="password">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
  <?php echo form_close();?>
</div>



<?php include 'layout/footer.php';?>
