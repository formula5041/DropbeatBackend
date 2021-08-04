
function doinsert(){

    //傳需求給insert.php將資料寫入資料庫
    $.ajax({            
        method: "POST",
        url: "./php/add_admin.php",
        data:{ 
            Name:$("#name").val(),
            Account:$("#account").val(),
            PWD:$("#pwd").val()
        },            
        dataType: "text",
        success: function (response) {
            //顯示insert回傳資料"註冊成功"
            $("#result").text(response);
            
            //如果顯示註冊成功，的function
            if(response=="註冊成功！"){
                $("#result").text("新增成功")
            }else{
                $("#result").text("輸入錯誤，請重新輸入")
            }
            
        },
        error: function(exception) {
            alert("發生錯誤: " + exception.status);
        }
    });

}
