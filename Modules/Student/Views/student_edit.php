<?php $this->extend("\Modules\Student\Views\app"); ?>

<?php $this->section("title") ?>
	Edit Student Page
<?php $this->endSection() ?>

<?= $this->section("styles") ?>
	<style>
	    #frm-edit-student label.error{
	        color: red;
	    }
	  	.img_student{
	    	height: 100px;
	    	width: 100px;
	    	box-shadow: 0.5px 0.5px 2px 0.5px grey;
	  	}
	</style>
<?= $this->endSection() ?>


<?php $this->section("body") ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
    	Edit Student
    	<a href="<?= base_url('student')?>" 
    		style="margin-top: -7px;" class="btn btn-info pull-right">
    			List Student
		</a>
  	</div>
    <div class="panel-body">
		<form class="form-horizontal" id="frm-edit-student" action="<?= base_url('student/edit-student/'.$student['id']) ?>" method="post" enctype="multipart/form-data">

			<input type="hidden" name="_method" value="PUT">

			<div class="form-group">
		      <label class="control-label col-sm-2" for="name">Name:</label>
		      <div class="col-sm-10">
		        <input type="text" class="form-control" id="name" value="<?= $student['name'] ?>" placeholder="Enter name" name="name" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="email">Email:</label>
		      <div class="col-sm-10">
		        <input type="email" class="form-control" id="email" value="<?= $student['email'] ?>" placeholder="Enter email" name="email" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="mobile">Mobile:</label>
		      <div class="col-sm-10">          
		        <input type="text" class="form-control" id="mobile" value="<?= $student['mobile'] ?>" placeholder="Enter mobile" name="mobile" required>
		      </div>
		    </div>
		    <div class="form-group">
		      <label class="control-label col-sm-2" for="image">Image:</label>
		      <div class="col-sm-10">          
		        <input type="file" class="form-control" id="image" placeholder="Enter image" name="image">
		        <br>
		        <?php
			        if(!empty($student['image'])){
			            ?>
			                <img src="<?= $student["image"] ?>" class="img_student"/>
			            <?php
			        } else{
			            echo "Image not found.";
			        }
		      	?>
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
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>
	<script>
	    $(function(){
	        $('#frm-edit-student').validate();
	    });
	</script>
<?= $this->endSection() ?>