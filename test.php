<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <title>Test Page</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="css/bootstrap.min.css" />
        <link href="css/jquery-ui.min.css" rel="stylesheet" type="text/css"/>
        <script src="js/jquery-2.1.4.min.js"></script>
        <script src="js/jquery-ui.min.js" type="text/javascript"></script>
        <script src="js/bootstrap.js"></script>
        <script src="js/myscript.js"></script>
        <script>
            $(function() {
               var availableTags=<?php $id=1; include("autocomplete.php"); ?>;
               $("#pcode").autocomplete({
                       source: availableTags, 
                       autoFocus: true
                   });
               $(document).bind("keydown",disable_f5bk);    
            });
        </script>
    </head>
    <body>
        <div class="container">
             <form name="newprojectform" role="form" action="addprojectdetails" method="POST">
                <div class="form-group">
                    <label class="badge">Code:</label>
                    <input type="text" class="form-control" id="pcode" maxlength="5"  placeholder="Enter Project code here..." required> 
                </div>
                <div class="form-group">
                    <label class="badge">Project Name:</label>
                    <input type="text" class="form-control" id="projname" maxlength="50"placeholder="Enter Project Name here...." required>
                </div>
            </form>
        </div>
        <div id="newproject" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
            <div  class="modal-dialog"><div class="modal-content">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-success">New Project Details</h4>
                    </div>
                    <div class="modal-body">
                            <form class="form form-horizontal form-group form-group-lg" name="newprojectform" role="form" action="addprojectdetails.php" method="POST">
                                <div class="form-group">
                                    <span class="label label-primary">Code: (5 characters)</span>
                                    <input type="text" class="form-control" id="pcode" maxlength=5 placeholder="Enter Project code here..."> 
                                </div>
                                <div class="form-group">
                                        <label class="label label-primary">Project Name:(50 characters)</label>
                                        <input type="text" class="form-control" id="projname" maxlength=50 placeholder="Enter Project Name here...." required>
                               </div>
                            </form>
                         </div>               
                    <div class="modal-footer" id="newprojectbody1">
                        <button class="btn btn-success btn-lg">Submit</button>
                        <button class="btn btn-warning btn-lg" data-dismiss="modal">Cancel</button> 
                    </div>
                    </div>
             </div></div>

    </body>
</html>
