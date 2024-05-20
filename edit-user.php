<?php 
require_once("./header.php"); 
require_once("./student.php"); 

?>


<?php
$user = new Students();

if( isset($_GET['action']) && $_GET['action'] == "edit")
{
	$id = $_GET['id'];
	$result = $user->getOneUser($id);
}
?>



<div class="container"dir="rtl">
<div class="card my-5">
	<div class="card-header"><strong>ویرایش کاربر</strong> <a href="index.php" class="float-right btn btn-dark btn-sm"><i class="fa fa-fw fa-globe"></i>لیست دانش آموزان</a></div>
		<div class="card-body">
			<div class="col">
				<form method="post" action="index.php?action=edit&id=<?php echo $result['id']; ?>">
				<input type="hidden" name="id" value="test" >
					<div class="form-group">
						<label>نام</label>
						<input type="text" name="name" class="form-control" value="<?php echo $result['name']; ?>" required="">
					</div>

					<div class="form-group">
						<label>رشته تحصیلی</label>
						<input type="text" name="field" class="form-control"  value="<?php echo $result['field']; ?>" required="">
					</div>

					<div class="form-group">
						<label>سن</label>
						<input type="text" name="age" class="form-control"  value="<?php echo $result['age']; ?>" required="">
					</div>

					<div class="form-group">
						<button type="submit" name="edit" value="submit" id="submit" class="btn btn-primary"><i class="fa fa-fw fa-plus-circle"></i>ویرایش</button>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>
</div>
<?php require_once("./footer.php"); ?>