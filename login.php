<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        
        <title>Login Screen</title>
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/bootstrap.js"></script>
    </head>
    <body class="bg-info">
         <div  class="modal fade"  id="loginmodal" data-backdrop="static">
            <div class="modal-dialog">
                <form class="form form-group-lg" name="loginform" action="http://webserver1.lrde.com/ldap/getuidpwd.asp" method="POST">   
                <div class="modal-content">
                    <div class="modal-header">
                        <button id="closebutton" type="button" class="close" 
                                data-dismiss="modal" aria-hidden="true" >&times;</button>
                            <h4 class="text-center text-uppercase text-success">Software Quality Assurance Group </h4>
                    </div>
                    <div class="modal-body">
                          <div class="form-group input-group">
                            <input type="text" class="form-control " placeholder="Email ID" id="txtuserid" name="txtuserid"  value="venkatesh.ls" required>
                            <span class="input-group-addon">@lrde.com</span>
                          </div>
                          <div class="form-group">
                            <input type="password" class="form-control" placeholder="Password" id="txtpassword" name="txtpassword"  value="shivesh" required>
                            <input id="txtpage" type="hidden" name="txtpage" value='http://venkatesh-ls/sqa/getPCNO.php'>
                          </div>
                    </div>
                    <div class="modal-footer">
                          <div class="form-group">
                            <button class="btn btn-success btn-lg btn-block">Sign In</button>
                          </div>
                    </div>
            </form>
                </div>
            </div>
        </div>
    <script>
        $(document).ready(function(){
            $("#loginmodal").modal('show');
            $("#loginmodal").modal({keyboard: true});
            $("#loginmodal").on('hide.bs.modal',function(){
              location.replace("http://www.lrde.com");
            });
        });
    </script>
    </body>
</html>
