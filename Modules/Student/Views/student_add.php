<?php $this->extend("\Modules\Student\Views\app"); ?>

<?php $this->section("title") ?>
	Add Student Page
<?php $this->endSection() ?>

<?= $this->section("styles") ?>
	<style>
	    #frm-add-student label.error{
	        color: red;
	    }
	</style>
<?= $this->endSection() ?>

<?php
  if(isset($validation)){
    //print_r($validation->listErrors());
  }
?>

<?php $this->section("body") ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
    	Create Student
    	<a href="<?= base_url('student')?>" 
    		style="margin-top: -7px;" class="btn btn-info pull-right">
    			List Student
		</a>
  	</div>
    <div class="panel-body">
		<form class="form-horizontal" id="frm-add-student" action="<?= base_url('student/add-student') ?>" method="post" enctype="multipart/form-data">
			<div class="form-group">
		      <label class="control-label col-sm-2" for="name">Name:</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="name" placeholder="Enter name" name="name">
		        <?php
			        if(isset($validation) && $validation->hasError('name')){
			          echo $validation->getError("name");
			        }
		      	?>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Email:</label>
		      <div class="col-sm-10">
		        <input type="email" class="form-control" id="email" placeholder="Enter email" name="email">
		        <?php
			        if(isset($validation) && $validation->hasError('email')){
			          echo $validation->getError("email");
			        }
		      	?>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="mobile">Mobile:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="mobile" placeholder="Enter mobile" name="mobile">
		        <?php
			        if(isset($validation) && $validation->hasError('mobile')){
			          echo $validation->getError("mobile");
			        }
		      	?>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="image">Image:</label>
		      <div class="col-sm-10">          
		        <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
		      </div>
		    </div>
		    <div class="form-group">        
		      <div class="col-sm-offset-2 col-sm-10">
		        <button type="submit" class="btn btn-success">Submit</button>
		      </div>
		    </div>
		</form>
    </div>
  </div>
<?php $this->endSection() ?>

<?= $this->section("scripts") ?>
	<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script> -->
	<script>
	    $(function(){
	        // $('#frm-add-student').validate();
	    });
	</script>
<?= $this->endSection() ?>