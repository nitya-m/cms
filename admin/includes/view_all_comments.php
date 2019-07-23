<table class="table table-hover table-bordered">
                        <thead>
                            <th>Id</th>
                            <th>Author</th>
                            <th>Comment</th>
                            <th>Email</th>
                            <th>Status</th>
                            <th>In Response to</th>
                            <th>Date</th>
                            <th>Approve</th>
                            <th>Unapprove</th>
                            <!-- <th>Edit</th>    -->
                            <th>Delete</th>
                        </thead>
                        <tbody>
                     <?php   
                     $query = "SELECT * from comments";
                     $select_posts = mysqli_query($connection, $query);

                     while($row = mysqli_fetch_assoc($select_posts)){
                         $comment_id = $row['comment_id'];
                         $comment_author = $row['comment_author'];
                         $comment_post_id = $row['comment_post_id'];
                         $comment_email = $row['comment_email'];
                         $comment_status = $row['comment_status'];
                         $comment_content = $row['comment_content'];
                        //  $comment_tags = $row['comment_tags'];
                        //  $comment_comment_count = $row['comment_count'];
                         $comment_date = $row['comment_date'];

                         echo "<tr>";
                            echo "<td>$comment_id</td>";
                            echo "<td>$comment_author</td>";
                            echo "<td>$comment_content</td>";


                    //  $query = "SELECT * FROM categories WHERE cat_id = {$post_category_id}";
                    //         $select_categories_id = mysqli_query($connection, $query);

                    //         while($row = mysqli_fetch_assoc($select_categories_id)){
                    //             $post_category_id = $row['cat_id'];
                    //             $cat_title = $row['cat_title'];
                    //             echo "<td>{$cat_title}</td>";

                    //         }

                            echo "<td>$comment_email</td>";    
                            echo "<td>$comment_status</td>";

                            $query = "SELECT * FROM posts WHERE post_id = $comment_post_id";
                            $select_post_id_query = mysqli_query($connection, $query);
                            while($row = mysqli_fetch_assoc($select_post_id_query)){
                                $post_id = $row['post_id'];
                                $post_title = $row['post_title'];
                                echo "<td><a class='btn btn-info' href = '../post.php?p_id=$post_id'>$post_title</a></td>";
                            }
                            // echo "<td>Some Text</td>";
                            echo "<td>$comment_date</td>";
                            echo "<td><a class='btn btn-success' role='button' href='comments.php?approve={$comment_id}'>APPROVE</a></td>";
                            echo "<td><a class='btn btn-warning' role='button' href='comments.php?unapprove={$comment_id}'>UNAPPROVE</td>";
                            // echo "<td><a class='btn btn-warning' role='button' href='posts.php?source=edit_post&p_id={$post_id}'>EDIT</a></td>";
                            echo "<td><a class='btn btn-danger' role='button' href='comments.php?delete={$comment_id}'>DELETE</td>";
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
    if(isset($_GET['approve'])){
        $the_comment_id = $_GET['approve'];

    $query = "UPDATE comments SET comment_status='approve' WHERE comment_id = {$the_comment_id};";
    $approve_query = mysqli_query($connection, $query);
    if($approve_query){
        header("Location: comments.php");
    }
    }

    if(isset($_GET['unapprove'])){
        $the_comment_id = $_GET['unapprove'];

    $query = "UPDATE comments SET comment_status='unapprove' WHERE comment_id = {$the_comment_id};";
    $unapprove_query = mysqli_query($connection, $query);
    if($unapprove_query){
        header("Location: comments.php");
    }
    }

    if(isset($_GET['delete'])){
        $the_comment_id = $_GET['delete'];

    $query = "DELETE from comments WHERE comment_id = {$the_comment_id};";
    $delete_query = mysqli_query($connection, $query);
    if($delete_query){
        header("Location: comments.php");
    }
    }

?>