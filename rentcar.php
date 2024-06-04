<?php


   try {
    $sql = "SELECT `id`, `title`, `image`, `content`, `model`, `type`, `consumption`, `price` FROM `cars` WHERE `published` = 1 limit 6";
    $stmtcar = $conn ->prepare($sql);
    $stmtcar->execute();
    $carresult = $stmtcar->fetchAll();

  } catch (PDOException $e) {
    $msg = $e->getmessage();
    $alertType = "alert-danger";
  }
  
  // print_r($stmt->fetchAll());
  // die();
?>

<div class="container-fluid py-5">
        <div class="container pt-5 pb-3">
            <h1 class="display-1 text-primary text-center">03</h1>
            <h1 class="display-4 text-uppercase text-center mb-5">Find Your Car</h1>
            <div class="row">
            <?php 
            foreach($carresult as $row){
                $id = $row['id'];
                $cartitle = $row['title'];
                $image = $row['image'];
                $model = $row['model'];
                $type = $row['type'] ? 'Auto' : 'manual';
                $consumption = $row['consumption'];
                $price = $row['price'];


            ?>

                <div class="col-lg-4 col-md-6 mb-2">
                </div>
                <div class="col-lg-4 col-md-6 mb-2">
                    <div class="rent-item mb-4">
                        <img class="img-fluid mb-4" src="img/<?php echo $image ?>" alt="">
                                                     
                        <h4 class="text-uppercase mb-4"><?php echo $cartitle ?></h4>
                        <div class="d-flex justify-content-center mb-4">
                            <div class="px-2">
                                <i class="fa fa-car text-primary mr-1"></i>
                                <span><?php echo $model ?></span>
                            </div>
                            <div class="px-2 border-left border-right">
                                <i class="fa fa-cogs text-primary mr-1"></i>
                                <span><?php echo $type ?></span>
                            </div>
                            <div class="px-2">
                                <i class="fa fa-road text-primary mr-1"></i>
                                <span> <?php echo $consumption ?>it/k</span>
                            </div>
                        </div>
                        <a class="btn btn-primary px-3" href=""><?php echo $price ?> </a>
                    </div>
                </div>
                <?php
            }
            ?>
            </div>
        </div>
    </div>