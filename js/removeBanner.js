
function removeBanner (name) {
    const xhr = new XMLHttpRequest();
    xhr.open("POST", "./removeBanner.php");
    xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
    xhr.send("name="+name);
    xhr.onreadystatechange = function(){
        if (xhr.readyState==4 && xhr.status==200){
            location.reload();
        }
    }
}