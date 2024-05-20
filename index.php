<?php
require_once("./header.php"); 
require_once("./student.php");

$user = new Students();

?>


<?php
if(isset($_GET['delete']))
{
?>
	<p class="alert alert-info">دانش آموز با موفقیت حذف شد</p>

<?php
}
?>


<?php
if (isset($_POST['submit']))
{
	$name = $_POST['name'];
	$age = $_POST['age'];
	$filed = $_POST['field'];


	$user->setName($name);
	$user->setAge($age);
	$user->setField($filed);

	$user->insertData();


?>
	<p class="alert alert-info">دانش آموز با موفقیت ثبت شد</p>

<?php } ?>



<?php

if(isset($_POST['edit']))
{
	$id = $_GET['id'];

	$name = $_POST['name'];
	$age = $_POST['age'];
	$filed = $_POST['field'];


	$user->setName($name);
	$user->setAge($age);
	$user->setField($filed);


	if($user->updateData($id))
	{


		?>
		<p class="alert alert-info">دانش آموز با موفقیت ویرایش شد</p>
	
		<?php
		//header("Location:index.php");
	}


}	

?>







<div class="container"dir="rtl">
	<div class="card my-5">
		<div class="card-header"><strong>لیست دانش آموزان</strong>
			<a href="add-user.php" class="float-right btn btn-dark btn-sm">افزودن دانش آموز جدید</a>
		</div>
	</div>
	<div>
		<table class="table table-striped table-bordered">
		<thead>
			<tr class="bg-primary text-white">
				
				<th>نام</th>
				<th>رشته تحصیلی</th>
				<th>سن</th>
				<th class="text-center">عملیات</th>
			</tr>
		</thead>
		<tbody>
			<?php
			foreach($user->getAll() as $key => $value)
			{
			?>
				<tr>
					<td align="center"><?php echo $value['name']; ?></td>
					<td align="center"><?php echo $value['field']; ?></td>
					<td align="center"><?php echo $value['age']; ?></td>

					<td align="center">
						<a href="edit-user.php?action=edit&id=<?php echo $value['id']?>" class="text-primary"> ویرایش</a> | 
						<a href="delete.php?action=delete&id=<?php echo $value['id']?>" class="text-danger" onclick="return confirm('آیا میخواید کاربر حذف شود؟?');"> حذف</a>
					</td>
				</tr>
			<?php
			}
			?>


		</tbody>
		</table>
	</div>
</div>
<?php require_once("./footer.php"); ?>