<!DOCTYPE html>
<html>
    <head>
        <title>AutoComplete Textbox Demos</title>
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css" />
        
        <link href="css/bootstrap.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script src="js/bootstrap.min.js" type="text/javascript"></script>
        <script>
            $(function() {
               var availableTags=<?php $id=1; include("autocomplete_ui.php"); ?>;
               $("#cname").autocomplete({
                       source: availableTags, 
                       autoFocus: true
                   });
            });
        </script>
    </head>
    <body>
        <label>Country Name</label>
        <input id="cname" type="text" size="50" />
        
        
           <div id="docupload" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
            <div  class="modal-dialog">
                <div class="modal-content">
                  <form class="form form-group form-group-lg" name="uploadform" role="form" method="POST" action="docUpload.php">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Artifacts for Review</h4>
                    </div>
                    <div class="modal-body" id="docuploadbody">
                         <div class="form-group" id="newprojectbody1">
                            <span class="label label-primary">Code:(Maximum 5 characters)</span><div class="pull-right small"  id="availability"></div>
                            <input  class="form-control" type=text id="pcode" placeholder="Enter Project code here" required>                                     
                            <span class="label label-primary">Project Name:(Maximum 50 characters)</span>
                            <input type="text" class="form-control" id="pname" name="pname" maxlength=50 placeholder="Enter Project Name here" required>
                            
                         </div>
                    </div>
                    <div class="modal-footer"></div>
                  </form>
             </div></div>
        </div>
    </body>
    
</html>