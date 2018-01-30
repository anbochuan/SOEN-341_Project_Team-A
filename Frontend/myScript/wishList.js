function deleteConfirm()
{
	var check = false;
	if(confirm("Do you really want to remove this item from your wish list?"))
		check = true;
	else
		check = false;

	return check;
}