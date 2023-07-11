
function removeUser (username) {
        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./removeUser.php");
        xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
        xhr.send("username="+username);
        xhr.onreadystatechange = function(){
            if (xhr.readyState==4 && xhr.status==200){
                    location.reload();
            }
        }
    }