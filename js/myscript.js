/*
 * This function "disable_f5bk will disable backspace key & F5 Key
 */
function disable_f5bk(e)        
{
    if ((e.keyCode) === 116) {
        e.preventDefault();
}
}

function ajax_get(url,objID)
{
    var xhr=new XMLHttpRequest();
    
    xhr.open("GET",url,true);
    
    xhr.setRequestHeader("Content-type","application/x-www-form-urlencoded");
    
    xhr.onreadystatechange = function () {
      if ((xhr.readyState===4) && (xhr.status===200))  
      {
          var return_data = xhr.responseText;
          document.getElementById("LoadID").innerHTML="";
          document.getElementById(objID).innerHTML=return_data;
      }
    };
    xhr.send(null);
    
    document.getElementById("LoadID").innerHTML="<img src='images/ajax-loader.gif'>Loading........";
    //document.getElementById(objID).innerHTML="<img src='images/ajax-loader.gif'>Loading........";
}

function loadingAjax(id,target)
{
    //$("#LoadID").html('<img src="images/ajax-loader.gif"> Loading.....');
    $("#"+id).html('<center><img src="images/ajax-loader.gif"><h4> Please wait........</h4></center>');
    $.ajax({
       type:"GET",
       url:target,
       data:"",
       success:function(data)  {
           $("#"+id).html(data);
           //$("#LoadID").html('');
       }
    }); 
}

function loadProjectCode(source,str)
{
    //$("#"+id).html('<img src="images/ajax-loader.gif">');
    $.ajax({
       type:"POST",
       url:"search.php",
       data: {
           term:$(source).val()
       },
       dataType:"TEXT",
       success:function(r_data)  {
           $(source).val(r_data); 
           console.log (r_data);
       },
       error: function(xhr, status, errorThrown) {
           //alert("Sorry. there was a problem");
           console.log("Error :"+errorThrown);
           console.log("Status :"+ status);
       },
       complete: function(xhr, status) {
           //alert("The request is complete");
           console.log("Completed..");
           console.log($(source).val());
       }
    }); 
}