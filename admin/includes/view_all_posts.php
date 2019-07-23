<table class="table table-hover table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Title</th>
                            <th>Category</th>
                            <th>Status</th>
                            <th>Image</th>
                            <th>Tags</th>
                            <th>Comments</th>
                            <th>Date</th>
                            <th>Edit</th>   
                            <th>Delete</th>
                        </thead>
                        <tbody>
                     <?php   
                     $query = "SELECT * from posts";
                     $select_posts = mysqli_query($connection, $query);

                     while($row = mysqli_fetch_assoc($select_posts)){
                         $post_id = $row['post_id'];
                         $post_author = $row['post_author'];
                         $post_title = $row['post_title'];
                         $post_category_id = $row['post_category_id'];
                         $post_status = $row['post_status'];
                         $post_image = $row['post_image'];
                         $post_tags = $row['post_tags'];
                         $post_comment_count = $row['post_comment_count'];
                         $post_date = $row['post_date'];

                         echo "<tr>";
                            echo "<td>$post_id</td>";
                            echo "<td>$post_author</td>";
                            echo "<td>$post_title</td>";
                     $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                            $select_categories_id = mysqli_query($connection, $query);

                            while($row = mysqli_fetch_assoc($select_categories_id)){
                                $post_category_id = $row['cat_id'];
                                $cat_title = $row['cat_title'];
                                echo "<td>{$cat_title}</td>";

                            }

                           
                            echo "<td>$post_status</td>";
                            echo "<td><img width='100' src='../images/$post_image'></td>";
                            echo "<td>$post_tags</td>";
                            echo "<td>$post_comment_count</td>";
                            echo "<td>$post_date</td>";
                            echo "<td><a class='btn btn-warning' role='button' href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</td>";
                            echo "<td><a class='btn btn-danger' role='button' href='posts.php?delete={$post_id}'>DELETE</td>";
                         echo "</tr>";
                         
                     }
                     
                     ?>
                            <!-- <td>10</td>
                            <td>Nitya Modha</td>
                            <td>Generic Title</td>
                            <td>PHP</td>
                            <td>Status</td>
                            <td>Image</td>
                            <td>tags</td>
                            <td>Comments</td>
                            <td>Date</td> -->
                        
                    </tbody>
                    </table>
<?php    
    if(isset($_GET['delete'])){
        $the_post_id = $_GET['delete'];

    $query = "DELETE from posts WHERE post_id = {$the_post_id};";
    $delete_query = mysqli_query($connection, $query);
    if($delete_query){
        header("location: posts.php");
    }
    }

?>