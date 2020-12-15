<h3>Dashboard</h3>

<?php 

if(! $this->session->userdata('logedin')){
    redirect('Home/login');
}

if($this->session->flashdata('msg')){
    echo "<h3>".$this->session->flashdata('msg')."</h3>";
  }
  echo $this->session->userdata('fname'); ?>

  <a href="<?php echo base_url('index.php/login/logout_user');?>">Logout</a>