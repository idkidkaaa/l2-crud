<?php include 'foo.php'; ?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css">
    
  </head>
  <body>
     
     <div class = "container">
        <div class = "row">
            <div class = "col-12">
                <button class = "btn btn-success mt-2" data-toggle = "modal" data-target = "#create"><i class = "fa fa-plus"></i></button>
                <table class = "table table-striped table-hover mt-2">
                    <thead class = "thead-dark">
                        <th>id</th>
                        <th>name</th>
                        <th>message</th>
                        <th>like</th>
                        <th>dislike</th>
                    </thead>
                    <tbody>
                        <?php foreach (array_reverse($result) as $res) { ?>
                        
                        <tr>
                            <td><?php echo $res->id; ?></td>
                            <td><?php echo $res->name; ?></td>
                            <td><?php echo $res->mesg; ?>
                            <br>
                            <a href="?id=<?php echo $res->id; ?>" class = "btn btn-success" data-toggle = "modal" data-target = "#edit<?php echo $res->id; ?>"><i class = "fa fa-edit"></i>
                            <a href="?id=<?php echo $res->id; ?>" class = "btn btn-danger" data-toggle = "modal" data-target = "#delete<?php echo $res->id; ?>"><i class = "fa fa-trash"></i></td>
                            <td>likes: <?php echo $res->lk; ?>
                                <br>
                                <a href="http://localhost/lab2/setlike.php?id=<?php echo $res->id; ?>" class = "btn btn-success"><i class = "fa fa-thumbs-up"></i>
                            </td>
                            <td>dislikes: <?php echo $res->dlk; ?>
                                <br>
                                <a href="http://localhost/lab2/setdislike.php?id=<?php echo $res->id; ?>" class = "btn btn-danger"><i class = "fa fa-thumbs-down"></i>
                            </td>
                        </tr>
                        
                        <!-- Modal edit -->
                        
                        <div class="modal fade" id="edit<?php echo $res->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Edit comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-body">
                                <form action = "?id=<?php echo $res->id; ?>" method = "post">
                                    <div class = "form-group">
                                        <small>Name</small>
                                        <input type = "text" class = "form-control" name = "name" value = "<?php echo $res->name; ?>">
                                    </div>
                                    <div class = "form-group">
                                        <small>Message</small>
                                        <input type = "text" class = "form-control" name = "message" value = "<?php echo $res->mesg; ?>">
                                    </div>
                              </div>
                              <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary" name = "edit">Edit comment</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Modal edit -->
                        
                        <!-- Modal delete -->
                        
                        <div class="modal fade" id="delete<?php echo $res->id; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                          <div class="modal-dialog" role="document">
                            <div class="modal-content">
                              <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Delete comment</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                  <span aria-hidden="true">&times;</span>
                                </button>
                              </div>
                              <div class="modal-footer">
                              <form action = "?id=<?php echo $res->id; ?>" method = "post">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-danger" name = "delete">Delete comment</button>
                              </form>
                              </div>
                            </div>
                          </div>
                        </div>
                        
                        <!-- Modal delete -->
                        
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>



    <!-- Modal create -->
    <div class="modal fade" id="create" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">Add comment</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <form action = "" method = "post">
                <div class = "form-group">
                    <small>Name</small>
                    <input type = "text" class = "form-control" name = "name">
                </div>
                <div class = "form-group">
                    <small>Message</small>
                    <input type = "text" class = "form-control" name = "message">
                </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary" name = "add">Add comment</button>
          </form>
          </div>
        </div>
      </div>
    </div>
    
    <!-- Modal create -->
     
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.4.1/dist/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>
</button>
