 
        <!-- Page Content -->
        <div id="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header"> <?php echo $title; //muestra el titulo del form al inicio ?></h1>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
                <!-- /.row -->
                 <div class="row">
                    <div class="col-lg-12">
                        <?php foreach ($news as $news_item): ?>
                            <div class="panel panel-primary">
                             <div class="panel-heading">
                                <?php echo $news_item['title']; ?>
                             </div>
                             <div class="panel-body">
                                 <p> <?php echo $news_item['text']; ?> </p>
                             </div>
                             <div class="panel-footer">
                                 <p><a href="<?php echo site_url('index.php/news/'.$news_item['slug']); ?>">View article</a></p>
                             </div>
                          </div>
                        <?php endforeach; ?>
                    </div>
                    <!-- /.col-lg-12 -->
                </div>
            </div>
            <!-- /.container-fluid -->
        </div>
        <!-- /#page-wrapper -->

   <!-- </div>
    <!-- /#wrapper -->