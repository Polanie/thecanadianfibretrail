<?php  require_once("../../core/includes.php");

    if( !empty($_GET) ){ // Check url has id in it

        $pr = new Premium;
        $premium = $p->get_by_id($_GET['id']);

        if( !empty($_POST) ){ // Check if form was submitted
            $p->edit($_GET['id']);
            header("Location: /");
            exit();
        }

    }else{
        header("Location: /");
        exit();
    }


    // unique html head vars
    $title = 'Edit Premium Features';
    require_once("../../elements/html_head.php");
    require_once("../../elements/nav.php");



?>

    <div class="container">
            <div class="row">
                <div class="col-md-8">
                    <div class="card border-success mt-3">
                        <div class="card-header">
                            <h4>Edit Premium Features:</h4>
                        </div><!-- .card-header -->
                        <div class="card-body">
                            <form method="post" enctype="multipart/form-data">
                                <div class="form-group">
                                    <textarea class="form-control" type="text" name="dropin" placeholder="Drop in Knit and Chats:" value="<?=$project['dropin']?>" required></textarea>
                                </div>
                                <div class="form-group">
                                    <textarea class="form-control" name="events_classes" placeholder="Events and Classes:" required><?=$project['events_classes']?></textarea>
                                </div>

                                <input class="btn btn-primary" type="submit" value="Submit">

                            </form>

                        </div><!-- .card-body -->

                    </div><!-- .card -->



                </div><!-- .col-md-8 -->

            </div><!-- .row -->

    </div><!-- .container -->

<?php require_once("../../elements/footer.php");
