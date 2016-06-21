<!DOCTYPE html>
<?php
    session_start();
    include 'db_lib.php';
    $db_obj = new db();
    //$db_obj->query($sql);
    //$role=$_SESSION["role"];
    //$username=$_SESSION["name"];
    $role=0;
    $username="Venkatesh LS";
    $statusflag=$_SESSION["status"];
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0">
        <title>Menu Screen</title>
        <link rel="icon" type="image/png" sizes="96x96" href="images/favicon.ico">
        <link rel="stylesheet" href="css/bootstrap.min.css">        
        <link rel="stylesheet" href="css/jquery-ui.min.css">
        <script  src="js/jquery-2.1.4.min.js"></script>
        <script src="js/jquery-ui.min.js"></script>
        <script  src="js/bootstrap.min.js"></script>
        <script src="js/myscript.js"></script>
        <style>
            .ui-autocomplete-input {
                border: none; 
                font-size: 14px;
                width: 300px;
                height: 40px;
                margin-bottom: 5px;
                padding-top: 2px;
                border: 1px solid #DDD !important;
                padding-top: 0px !important;
                z-index: 1511;
                position: static;
            }
            .ui-menu .ui-menu-item a {
                font-size: 12px;
            }
            .ui-autocomplete {
                position: absolute;
                top: 100%;
                left: 0;
                z-index: 1051 !important;
                float: left;
                display: none;
                min-width: 160px;
                _width: 160px;
                padding: 4px 0;
                margin: 2px 0 0 0;
                list-style: none;
                background-color: #ffffdd;
                border-color: #ccc;
                border-color: rgba(0, 0, 0, 0.2);
                border-style: solid;
                border-width: 1px;
                -webkit-border-radius: 2px;
                -moz-border-radius: 2px;
                border-radius: 2px;
                -webkit-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -moz-box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                box-shadow: 0 5px 10px rgba(0, 0, 0, 0.2);
                -webkit-background-clip: padding-box;
                -moz-background-clip: padding;
                background-clip: padding-box;
                *border-right-width: 2px;
                *border-bottom-width: 2px;
            }
            .ui-menu-item > a.ui-corner-all {
                    display: block;
                    padding: 3px 15px;
                    clear: both;
                    font-weight: normal;
                    line-height: 18px;
                    color: #555555;
                    white-space: nowrap;
                    text-decoration: none;
            }
            .ui-state-hover, .ui-state-active {
                  color: #ffffff;
                  text-decoration: none;
                  background-color: #0088cc;
                  border-radius: 0px;
                  -webkit-border-radius: 0px;
                  -moz-border-radius: 0px;
                  background-image: none;
            }
    </style>
   </head>
<body>
      <nav class="nav nav-tabs nav-tabs-justified navbar-inverse navbar-fixed-top">
          <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse"  data-target="#menu-navbar-collapse">
                    <span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span>                    
                 </button>
                <a href="#" class="navbar-brand">Menu</a>
          </div>
          <div class="collapse navbar-collapse" id="menu-navbar-collapse">
              <ul class="nav navbar-nav">
                       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Upload<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="#"  data-target="#docupload" data-toggle="modal">Project Document</a></li>
                             <li class="divider"></li>
                             <li><a href="#">Display Window</a></li>
                        </ul>
                      </li>
              </ul>
              <ul class="nav navbar-nav">
                       <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Report<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                             <li><a href="#">Project Status</a></li>
                             <li><a href="#">Document Status</a></li>
                             <li class="divider"></li>
                             <li><a href="#">Metrics Report</a></li>
                        </ul>
                      </li>
                <?php
                    if ($role==0) {
                ?>   
                   <li class="dropdown">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown">Admin<b class="caret"></b></a>
                          <ul class="dropdown-menu">
                              <li><a href="#" data-target="#viewproject" data-toggle="modal">View Project Details</a></li>
                              <li><a href="#" data-target="#newproject" data-toggle="modal">Add New Project</a></li>
                             <li class="divider"></li>
                              <li><a href="#" data-target="#newupdateuser" data-toggle="modal">User</a></li>
                        </ul>
                    </li>
                <?php
                    };                
                 ?> 
                    <li><a href="logout.php">Logout</a></li>
                </ul>
              <div>
                  <p class="navbar-text navbar-right">
                      Signed in as  <?php echo $username;?>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  </p>    
              </div>                   
      </div>
      </nav>
      <?php
                 if ($statusflag==0)   {
        ?>
            <br><br><br>
            <div id="myStatusAlert" class="alert alert-danger pull-right">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $_SESSION["msg"];?> &nbsp;&nbsp;&nbsp;&nbsp;</strong>
            </div>
        <?php               
                 }else
                 if (strlen($_SESSION["msg"])>0)
                 { 
         ?>
             <br><br><br>
            <div id="myStatusAlert" class="alert alert-success pull-right">
                <a href="#" class="close" data-dismiss="alert">&times;</a>
                <strong><?php echo $_SESSION["msg"];?> &nbsp;&nbsp;&nbsp;&nbsp;</strong>
            </div>
        <?php
                 }
        ?>
    <!--Upload Project Document Window-->  
    <div id="docupload" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static">
            <div  class="modal-dialog">
                <div class="modal-content">
                  <form class="form form-group form-group-lg" name="uploadform" role="form" method="POST" action="docUpload.php">
                    <div class="modal-header">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title">Artifacts for Review</h4>
                    </div>
                    <div class="modal-body" id="docuploadbody">
                         <div class="form-group" id="newprojectdoc">
                            <span class="label label-primary">Code:(Maximum 5 characters)</span><div class="pull-right small"  id="availability"></div>
                            <input type="text"  class="form-control" id="pcode" name="pcode" maxlength=5 placeholder="Enter Project code here" required>
                            <BR>
                            <span class="label label-primary">Project Name:(Maximum 50 characters)</span>
                            <input type="text" class="form-control" id="pname" name="pname" maxlength=50 placeholder="Enter Project Name here" required>
                            
                         </div>
                    </div>
                    <div class="modal-footer"></div>
                  </form>
             </div></div>
        </div>
<!--New / Update User Window-->
<div id="newupdateuser" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                    <button class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">User Management</h4>                
            </div>
            <div class="modal-body" id="newuserbody">
                <center><h4>Page Under Construction..................</h4></center>
            </div>
            <div class="modal-footer"></div>
        </div>
    </div>
</div>
<!--New Project window-->
    <div id="newproject" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true">
            <div  class="modal-dialog" id="newprojectdiag">
                <div class="modal-content" id="newprojectcont">
                   <form class="form form-group form-group-lg" name="newprojectform" role="form" method="POST" action="addProjectDetails.php">
                    <div class="modal-header" id="newprojectheader">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-success">New Project Details</h4>
                    </div>
                    <div class="modal-body">
                                <div class="form-group" id="newprojectbody1">
                                    <span class="label label-primary">Code:(Maximum 5 characters)</span><div class="pull-right small"  id="availability"></div>
                                    <input type="text" id="pcode" name="pcode" class="form-control" maxlength=5 placeholder="Enter Project code here" required>
                                     
                                    <span class="label label-primary">Project Name:(Maximum 50 characters)</span>
                                    <input type="text" class="form-control" id="pname" name="pname" maxlength=50 placeholder="Enter Project Name here" required>
                                     
                                </div>
                    </div>               
                    <div class="modal-footer" id="newprojectfooter">
                        <button class="btn btn-success">Submit</button> 
                        <button class="btn btn-warning" data-dismiss="modal">Cancel</button> 
                    </div>
                    </form>
                  </div>
             </div></div>                                       

<!--View Project Information-->         
    <div id="viewproject" class="modal fade" aria-labelledby="myModalLabel" aria-hidden="true">
            <div  class="modal-dialog" id="viewprojectdiag">
                <div class="modal-content" id="viewprojectcont">
                    <div class="modal-header" id="viewprojectheader">
                        <button class="close" data-dismiss="modal">&times;</button>
                        <h4 class="modal-title text-success">Existing Project Details</h4>
                    </div>
                    <div class="modal-body">
                        <div class="container-fluid success">
                            <table class="table table-hover table-condensed table-striped table-bordered table-responsive">
                                    <thead>
                                        <tr class="bg-primary">
                                            <th>Code</th>
                                            <th>Name</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php
                                        $color=0;
                                        $sql="Select projectcode, projectname from project";
                                        $db_obj->query($sql);
                                        while ($row = mysqli_fetch_assoc($db_obj->RS))  {
                                            $pcode=$row['projectcode'];
                                            $pname=$row['projectname'];
                                            if ($color==0){
                                    ?>
                                        <tr class="bg-success">
                                            <td><?php echo $pcode;?></td>
                                            <td><?php echo $pname;?></td>
                                        </tr>
                                    <?php
                                        $color=1;
                                        }
                                        else
                                        {
                                     ?>
                                        <tr class="bg-info">
                                            <td><?php echo $pcode;?></td>
                                            <td><?php echo $pcode;?></td>
                                        </tr>
                                        
                                     <?php       
                                          $color=0;  
                                        }
                                        }
                                        $db_obj->queryclose();
                                    ?>
                                    </tbody>
                            </table>
                       </div>

                    </div>               
                  </div>
            </div>
         </div>                                       
             
      <script>
            $(function() {
//                $(document).bind("keydown",disable_f5bk);    
                $("#mySuccessAlert").bind("closed.bs.alert", function () {
                            <?php $_SESSION["msg"]="";?>
                            });
                 $("#myStatusAlert").delay(2000).fadeOut(2000);
                $("#newproject #newprojectdiag #newprojectcont #newprojectbody1 #pcode") .blur(function (){
                  var code=$(this).val();
                  if (code===''){
                      $("#newproject #newprojectdiag #newprojectcont #newprojectbody1 #availability").html("");
                  }
                  else
                  {
                      $.ajax({
                         url: "validation.php?code="+code 
                      }).done(function (data) {
                          $("#newproject #newprojectdiag #newprojectcont #newprojectbody1 #availability").html(data);
                      })  ;
                  }
               }); 
            });   
            $(function() {
              var availableTags=<?php include("projectcodelist.php");?>;
             $("#docupload #docuploadbody #newprojectdoc #pcode").autocomplete({
                         source: availableTags,
                         autoFocus: false,
                         select: function(event, ui) {
                             $("#docupload #docuploadbody #newprojectdoc #pname").val($(this).val());
                         }
              }) ;

              /*$("#docupload #docuploadbody #newprojectdoc #pcode").on("mouseenter mouseleave click dblclick", function() {
                    alert("mouseenter mouseleave click dblclick");
                    
                });*/
            }) ;
            
            
        </script>
</body>
</html>
