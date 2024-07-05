<?php $this->extend("\Modules\Student\Views\app"); ?>

<?php $this->section("title") ?>
	List Students Page
<?php $this->endSection() ?>

<?= $this->section("styles") ?>
	<link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css"/>
	<style>
	  .img_student{
	    height: 50px;
	    width: 50px;
	    box-shadow: 0.5px 0.5px 2px 0.5px grey;
	  }
	</style>
<?= $this->endSection() ?>

<?php $this->section("body") ?>
  <div class="panel panel-primary">
    <div class="panel-heading">
    	Student List
    	<a href="<?= base_url('student/add-student')?>" 
    		style="margin-top: -7px;" class="btn btn-info pull-right">
    			Add Student
		</a>
  	</div>
    <div class="panel-body">
		<table class="table table-hover" id="tbl-student-list">
		    <thead>
		      <tr>
		        <th>ID</th>
		        <th>NAME</th>
		        <th>EMAIL</th>
		        <th>MOBILE</th>
		        <th>IMAGE</th>
		        <th>ACTIONS</th>
		      </tr>
		    </thead>
		    <tbody>
	    	<?php
			    if(count($students) > 0) {
			        foreach($students as $student) {
			?>
			<tr>
			    <td><?= $student["id"] ?></td>
			    <td><?= $student["name"] ?></td>
			    <td><?= $student["email"] ?></td>
			    <td><?= $student["mobile"] ?></td>
			    <td>
			        <?php if(isset($student["image"]) && !empty($student["image"])): ?>
			            <img src="<?= $student["image"] ?>" alt="Student Image" class="img_student">
			        <?php else: ?>
			            Image not found.
			        <?php endif; ?>
			    </td>
			    <td>
			        <a href="<?= base_url('student/edit-student/'.$student['id']) ?>" class="btn btn-info">
			        	Edit
			        </a>
                    <a href="#" class="btn btn-danger" 
                    	onclick="if(confirm('Are you sure about deleting the student information?')){ 
                    		$('#frm-delete-student_<?= $student['id'] ?>').submit() 
                    	}">
                    	Remove
                    </a>

                    <form id="frm-delete-student_<?= $student['id'] ?>" 
                    	action="<?= base_url('student/delete-student/'.$student['id']) ?>" method="post"> 
                    	<input type="hidden" name="_method" value="DELETE">
                    </form>
			    </td>
			</tr>
			<?php
			        }
			    }
			?>
		    </tbody>
		</table>
    </div>
  </div>
<?php $this->endSection() ?>

<?= $this->section("scripts") ?>
	<script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
	<script>
	    $(document).ready(function(){
	        $('#tbl-student-list').DataTable();
	    });
	</script>
<?= $this->endSection() ?>