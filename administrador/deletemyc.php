<?php 
if (isset($_GET['id']))
{
	include('database.php');
	$myc = new Database();
	$id=intval($_GET['id']);
	$res = $myc->delete($id);
	if($res)
	{
		header('location: Listamyc.php');
	}
	else
	{
		echo "Error al eliminar el registro";
	}
}
?>