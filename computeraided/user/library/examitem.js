// JavaScript Document
function checkAddUserForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtAnswer, 'Enter the Correct Answer')) {
			return;
		} else {
			submit();
		}
	}
}

function checkStudentForm()
{
	with (window.document.frmAddUser) {
		if (isEmpty(txtsName, 'Enter ID Number')) {
			return;
		} else if (isEmpty(txtPassword, 'Enter Password')) {
			return;
		} else {
			submit();
		}
	}
}

function addUser()
{
	window.location.href = 'index.php?view=add';
}

function changePassword(userId)
{
	window.location.href = 'index.php?view=modify&userId=' + userId;
}

function deleteUser(userId)
{
	if (confirm('Delete this user?')) {
		window.location.href = 'processUser.php?action=delete&userId=' + userId;
	}
}

function deleteItem(userId)
{
	if (confirm('Change the answer?')) {
		window.location.href = 'processUser.php?action=delete&userId=' + userId;
	}
}

