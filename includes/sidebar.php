<div class="col-md-4">
            <!-- Do not DELETE!!! -->
            <!-- <?php

            if(isset($_POST['submit'])){
                $search = $_POST['search'];
                $query = "SELECT * from posts where post_tags LIKE '%$search%';";
                $search_query = mysqli_query($connection, $query);
                if(!$search_query){
                    die("Query Failed" . mysqli_error($connection));
                }    
                 
                $count = mysqli_num_rows($search_query);
                if($count == 0){
                    echo ("<h1>NO RESULT</h1>");
                }else{
                    echo ("<h1>SOME  RESULT</h1>");
                }
                
            }
                
            ?> -->

                <!-- Blog Search Well -->
                <div class="well">
                    <h4>Blog Search</h4>
                    <form action="search.php" method="post">
                    <div class="input-group">
                        <input name="search" type="text" class="form-control">
                        <span class="input-group-btn">
                            <button name="submit" class="btn btn-default" type="submit">
                                <span class="glyphicon glyphicon-search"></span>
                        </button>
                        </span>
                    </div>
                   </form>
                    <!-- /.input-group -->
                </div>

                <!-- Blog Categories Well -->
                <div class="well">

                <?php
                        $query = "SELECT * FROM categories;";
                        $select_categories_sidebar = mysqli_query($connection, $query);
                    ?>


                    <h4>Blog Categories</h4>
                    <div class="row">
                        <div class="col-lg-12">
                            <ul class="list-unstyled">
                            <?php
                                    while ($row = mysqli_fetch_assoc($select_categories_sidebar)){
                                        $cat_title = $row['cat_title'];
                                        $cat_id = $row['cat_id'];
                                        echo("<li><a href='category.php?category=$cat_id'>{$cat_title}</a></li>");
                                    }

                            ?>
                            </ul>
                        </div>
                        <!-- /.col-lg-6 -->
                        <!-- This is minimized  -->
                        <!-- <div class="col-lg-6">
                            <ul class="list-unstyled">
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                                <li><a href="#">Category Name</a>
                                </li>
                            </ul>
                        </div> -->
                        <!-- /.col-lg-6 -->
                    </div>
                    <!-- /.row -->
                </div>

                <!-- Side Widget Well -->
                  <?php include "widget.php" ?>                      
                <!-- This will go into widget -->
                <!-- <div class="well">
                    <h4>Side Widget Well</h4>
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Inventore, perspiciatis adipisci accusamus laudantium odit aliquam repellat tempore quos aspernatur vero.</p>
                </div> -->

            </div>
