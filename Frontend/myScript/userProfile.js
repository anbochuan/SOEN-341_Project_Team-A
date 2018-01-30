function deleteConfirm()
{
	var check = false;
	if(confirm("Do you really want to delete this item?"))
		check = true;
	else
		check = false;

	return check;
}