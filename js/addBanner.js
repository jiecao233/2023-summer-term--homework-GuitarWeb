$(function () {
    $("#addBannerBtn").click(function () {
        const name = document.getElementById('banner_name').value.replace(/(^\s*)|(\s*$)/g, '');
        const path = document.getElementById('banner_path').value.replace(/(^\s*)|(\s*$)/g, '');
        if (name.length === 0 || path.length === 0) {
            document.getElementById("addBannerTip").innerHTML="<span style='color: red'>信息不能为空</span>";
            return;
        }

        const xhr = new XMLHttpRequest();
        xhr.open("POST", "./addBanner.php");
        xhr.setRequestHeader('Content-Type',' application/x-www-form-urlencoded');
        xhr.send("name="+name+"&path="+path);
        xhr.onreadystatechange = function(){
            if (xhr.readyState==4 && xhr.status==200){
                const repTxt = xhr.responseText;
                document.getElementById("addGoodTip").innerHTML=xhr.responseText;
                if(repTxt == "<span style='color: green'>添加成功</span>")
                    location.reload();
            }
        }
    })
})