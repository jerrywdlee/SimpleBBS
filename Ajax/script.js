function confer(){
  $.get("confer.php",function(json){
    var obj=eval("("+json+")");
    ans=obj.ans;
    $("#code").html(obj.var);
  });
  $("#lname").val("");
}

function getData(){
  $.get("getBBS.php",function(data){
    $("#allMsg").html(data);
  });
}

function postData(){
if($(".input").val()!=""){
   $.post("postBBS.php",
    {
      name:$("#name").val(),
      msg:$("#msg").val()
    },
    function(){
    //todo sth.
   });
  }
}

$(document).ready(function(){
  confer();getData();
  
  $("button").click(function(){
    if($("#lname").val()===ans&&
       $("#name").val()!=""&&$("#msg").val()!=""){
      postData();
      getData();
      $(".input").val("");//reset input
      confer();
      //alert("true");
    }else{
     if($("#name").val()==""||$("#msg").val()==""){
      alert("名前とメッセージを入力してください。");  
     }
     if($("#lname").val()!=ans){
      alert("認証コードは正しくありません。")
      confer();
     }  
    }
  });
});


