<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" media="screen" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.0/jquery.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <script>
    $(document).ready(function(){
        $(".FAQpanelhead").click(function(){
            $(".FAQpanelbody").toggle();
            $(this).toggleClass('glyphicon-menu-up').toggleClass('glyphicon-menu-down');
        });
    });

    $(document).ready(function(){
        $(".Deadlinepanelhead").click(function(){
            $(".Deadlinepanelbody").toggle();
            $(this).toggleClass('glyphicon-menu-up').toggleClass('glyphicon-menu-down');
        });
    });
    </script>

    <title>Module</title>

    <!--  -->

    <link rel="stylesheet" href="style.css">

</head>

<body>
<?php
session_start();
$_SESSION['moduleID'] = $_POST['moduleID'];
echo "
    <div class='container-fluid'>
        <nav class='navbar navbar-default'>
          <div class='container-fluid'>
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class='navbar-header'>
                <a href><img src='logo.png'></a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <form action='Working_MSR_With_userlist.php' method='POST'>
            <div class='collapse navbar-collapse' id='bs-example-navbar-collapse-1'>
              <ul class='nav navbar-nav intelekt-nav-left'>
                <li><a href='module.php'><img src='ModulesIcon.png' width='50%'></a></li>
                <li><a href='Working_MSR_With_userlist.php'?moduleID=".$_SESSION['moduleID']."'><img src='MSRicon.png' width='50%'></a></li>              
                <li><a href='module.php'><img src='forumsicon.png' width='50%'></a></li>
              </ul>
              </form>";
              ?>
              <div class="nav navbar-nav navbar-right">
                <span class="glyphicon glyphicon-user"></span>
                <span>Username: </span>
                <span><?php echo $_SESSION["username"]?></span>
                <a href="login-2.php"><button class="btn-md">Log out</button></a>
              </div>
            </div><!-- /.navbar-collapse -->
          </div><!-- /.container-fluid -->
        </nav>
    </div>

    <div class="row">

        <div class="col-md-7">
            <div class="well">
                <h3><?php echo $_SESSION["moduleID"]?></h3>
                <h4>Module Title</h4>
                <?php
                
                    $DBserver = "csmysql.cs.cf.ac.uk"; //mysql server
                    $DBuser = "group6.2015"; //mysql username
                    $DBpass = "bhF54FWzyq"; //mysql password
                    $DBdatabase = "group6_2015"; //mysql database name
                    $db = mysqli_connect($DBserver,$DBuser,$DBpass,$DBdatabase);
                    if( $db === FALSE ){
                      header( "Location: error.html" ); //redirects to an error page in case of an error.
                      die();
                    }
                    $query = 'SELECT * FROM MODULE WHERE Module_ID="'.$_SESSION["moduleID"].'"';
                    $result = mysqli_query($db, $query);
                    while ($row = mysqli_fetch_assoc($result)){
                      $moduleTitle = $row['Module_TITLE'];
                      $moduleDesc = $row['Module_DESCRIPTION'];
                echo"
                <p>".$moduleTitle."</p>
                <br>";
                echo"<h4> Module Description</h4>";
                echo "<p>".$moduleDesc."</p>";
              }
                ?>
                <div class="modules-lect-button">
                    <a href="#" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Lecture1</a>
                    <button class="btn-md">Download</button>
                    <button class="btn-md" type="button" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Open</button>
                </div>
                <div class="modules-lect-button">
                    <a href="#" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Lecture2</a>
                    <button class="btn-md">Download</button>
                    <button class="btn-md" type="button" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Open</button>
                </div>
                <div class="modules-lect-button">
                    <a href="#" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Lecture3</a>
                    <button class="btn-md">Download</button>
                    <button class="btn-md" type="button" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Open</button>
                </div>
                <div class="modules-lect-button">
                    <a href="#" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Lecture4</a>
                    <button class="btn-md">Download</button>
                    <button class="btn-md" type="button" data-toggle="modal" data-target="#LectureModal"  data-backdrop="static" data-keyboard="false">Open</button>
                </div>
                <h4>Other Material</h4>
                <button class="btn-md">Download</button>
            </div>
        </div>

        <div class="col-md-5">
            <div class="well">
                <div class="panel panel-default">
                  <div class="panel-heading"><span data-toggle="modal" data-target="#FAQModal"  data-backdrop="static" data-keyboard="false">FAQ</span><span class="glyphicon glyphicon-open glypbuttons" data-toggle="modal" data-target="#FAQModal"  data-backdrop="static" data-keyboard="false"></span><span class="glyphicon glyphicon-menu-up glypbuttons FAQpanelhead"></span></div>
                  <div class="panel-body FAQpanelbody"  data-toggle="modal" data-target="#FAQModal"  data-backdrop="static" data-keyboard="false" style="display:none;">
                    <?php
                    $query = 'SELECT * FROM FAQ WHERE Module_ID= "'.$_SESSION["moduleID"].'"';
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    while ($row1 = mysqli_fetch_assoc($result)){
                      $question = $row1['Question'];
                      $answer = $row1['Answer'];
                      echo '<p>Q:'.$question.'</p>
                         <p>A:'.$answer.'</p>';
                   }
                    ?>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">Deadlines<span class="glyphicon glyphicon-menu-up glypbuttons Deadlinepanelhead"></span></div>
                  <div class="panel-body Deadlinepanelbody" style="display:none;">
                    <?php
                    $query = 'SELECT * FROM MODULE WHERE Module_ID="'.$_SESSION["moduleID"].'"';
                    $result = mysqli_query($db, $query) or die(mysqli_error($db));
                    while ($row = mysqli_fetch_assoc($result)){
                      $deadline = $row['Deadline'];
                      echo "<p>Coursework Deadline<span class='date-deadline'>".$deadline."</span></p>";
                    }
                      ?>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Modal -->
  <div class="modal fade" id="LectureModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">Lecture</h4>
        </div>
        <div class="modal-body">
          <div>
              <iframe src="" width="80%;" height="350px;"></iframe>
          </div>

          <div class="lectureBTN">
            <button><span class="glyphicon glyphicon-arrow-left"></span></button>
            <button class="btn-md">Download</button>
            <button><span class="glyphicon glyphicon-arrow-right"></span></button>
          </div>

            <div class="col-sm-6 ">
              <div class="panel panel-default lectureComments">
                 <div class="panel-heading">Comments</div>
                 <div class="panel-body">

                     <div class="media">
                      <div class="media-left">
                          <span class="media-object"><b>Useruser123</b></span>
                      </div>
                      <div class="media-body">
                        <p>Something something something something somerthin.</p>
                      </div>
                    </div>

                     <div class="media">
                      <div class="media-left">
                          <span class="media-object"><b>Useruser123</b></span>
                      </div>
                      <div class="media-body">
                        <p>Something something something something somerthin.</p>
                      </div>
                    </div>

                     <div class="media">
                      <div class="media-left">
                          <span class="media-object"><b>Useruser123</b></span>
                      </div>
                      <div class="media-body">
                        <p>Something something something something somerthin.</p>
                      </div>
                    </div>

                     <form class="form-inline">
                         <input type="text" class="form-control form-comments" placeholder="Enter comment">
                         <button type="submit" class="btn btn-sm">Send</button>
                     </form>

                </div>
              </div>
            </div>

            <div class="col-sm-6 ">
              <div class="panel panel-default lectureNotes">
                  <div class="panel-heading">Personal Notes</div>
                  <div class="panel-body">

                      <div ng-app="">
                        <label>Write your personal notes:</label>
                        <p><textarea type="text" class="textnotes" rows="3" ng-model="name"></textarea>
                        <button type="submit" class="btn btn-sm">Send</button>
                        <div ng-bind="name"></div>

                      </div>
                  </div>
              </div>
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>

    <!-- Modal 2-->
  <div class="modal fade" id="FAQModal" role="dialog">
    <div class="modal-dialog modal-lg">

      <!-- Modal content-->
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal">&times;</button>
          <h4 class="modal-title">FAQ</h4>
        </div>
        <div class="modal-body">
            <div class="well">
                
            </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
      </div>

    </div>
  </div>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.5/js/bootstrap.min.js"></script>

    <script>
    </script>

</body>

</html>
