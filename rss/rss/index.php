<?php
include_once 'include/Tribun.php';

$tribunObj = new Tribun();
$rssData = $tribunObj->GetRss();
$xml = json_decode(json_encode(simplexml_load_string($rssData, null, LIBXML_NOCDATA)), true);
//print_r($xml);
//echo json_encode($xml);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Kaneko Hato</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="assets/bootstrap/bootstrap.min.css">
    <script src="assets/bootstrap/jquery.min.js"></script>
    <script src="assets/bootstrap/popper.min.js"></script>
    <script src="assets/bootstrap/bootstrap.min.js"></script>
</head>

<body>

    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
        <!-- Brand/logo -->
        <a class="navbar-brand" href="#">RSS TRIBUN</a>

        <!-- Links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="#">TribunNews</a>
            </li>
        </ul>
    </nav>

    <div class="container mt-4">
        <div class="row">
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-12">
                        <div class="row">
                            <?php
                            foreach ($xml['channel']['item'] as $row) {
                                // echo '<div class="col-md-4">
                                //     <div class="card" style="width:400px">
                                //         <img class="card-img-top" src="img_avatar1.png" alt="Card image" style="width:100%">
                                //         <div class="card-body">
                                //         <h4 class="card-title"><a target="_blank" href="' . $row->link . '">' . $row->title . '</a></h4>
                                //         <p class="card-text">Some example text some example text. John Doe is an architect and engineer</p>
                                //         <a href="#" class="btn btn-primary">See Profile</a>
                                //         </div>
                                //     </div>
                                // </div>';
                                echo '<div class="col-sm-4">
                                <div class="card mb-4">
                                  <div class="card-body">
                                    <img class="card-img-top mb-3" src="'.$row['enclosure']['@attributes']['url'].'" alt="Card image" style="width:100%">
                                    <h5 class="card-title"><a target="_blank" href="' . $row['link'] . '">' . $row['title'] . '</a></h5>
                                  </div>
                                </div>
                              </div>';
                            }
                            ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</body>

</html>