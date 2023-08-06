<?php
require_once("header_admin.php");
$blog_id = $_POST['btn-blog_id'];
?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <h6> DANH SÁCH BLOG</h6>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->
        <div class="container" style="margin-top:10px;">
            <button class="btn btn-success" id="btn-add" style="margin-bottom:10px;">Danh sách Blog</button>
                <table class="table table-striped table-bordered">
                <thead>            
                            <tr>
                                <th>ID</th>
                                <th width="15%">Tiêu đề</th>
                                <th>Ảnh</th>
                                <th width="15%">Tác giả</th>
                                <th>Nội dung</th>
                                <th>Ngày đăng</th>
                                <th>Thao tác</th>
                            </td>
                            </tr>                    
                    </thead>
                    <tbody>
                    <?php
                            $sql="SELECT * FROM tbl_blog join tbl_admin on tbl_blog.admin_id = tbl_admin.admin_id";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                while($blog = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $blog['blog_id'];?>
                                </td>
                                <td>
                                    <?php echo $blog['blog_name'];?>
                                </td>
                                <td>
                                    <img src="<?php echo $blog['blog_img'];?>" alt=""> 
                                </td>
                                <td>
                                    <?php echo $blog['name'];?>
                                </td>
                                <td>
                                    <?php echo $blog['blog_content'];?>
                                </td>
                                <td>
                                    <?php echo $blog['date_post'];?>
                                </td>
                                <td>
                                    <form action="" method="POST" id="btn-form_update" >
                                        <button type="submit" class="btn btn-info" name="btn-blog_id" id="btn-update_items" value="<?=$blog['blog_id']?>">Sửa</button>  
                                    </form> 
                                </td>
                                <td>    
                                <a class="btn btn-danger" href="">Xóa</a>
                                </td>
                            </tr>
                            <?php
                                }
                            }
                        ?>
                    </tbody> 

                </table>
        </div>
    </div>
            </div>
        </div>       
      </div>
    </section>
</main>
<div id="modal-update_items" class="modal" style="display:block" >

        <div class="modal-content" >     
            <?php
                    $sql="SELECT * FROM tbl_blog join tbl_admin on tbl_blog.admin_id = tbl_admin.admin_id
                    WHERE blog_id=".$blog_id;
                    $ketQuaTruyVan = $conn->query($sql);
                    if($ketQuaTruyVan -> num_rows>0)
                    {
                        while($blog = $ketQuaTruyVan -> fetch_assoc())
                        {  
                            $blog_name = $blog['blog_name'];
                            $blog_content = $blog['blog_content'];
                            $admin_name = $blog['name'];
                            $blog_img = $blog['blog_img'];
                            $admin_id = $blog['admin_id'];
                            $date_post = $blog['date_post'];                    
                    }
                 }
            ?>     
            <form action="update_blog_sql.php" method="post">
                <div class="modal-header">
                        <h2>Cập nhật blog</h2>
                        <span class="close" id ="close_update_items"  onclick="Redirect()">&times;</span>
                    </div>
                    <div class="modal-body">    
                        <input type="hidden" name="blog_id" id="" value="<?=$blog_id?>">
                         <div class="form-group">
                            <label>Tên blog</label>
                            <br>
                            <input type="text" name="blog_name" class="form-control" value="<?php echo $blog_name?>">   
                        </div>
                        <div class="form-group">
                            <label>Tên tác giả</label>
                            <br>
                            <input type="text"  class="form-control" value="<?php echo $admin_name?>">   
                            <input type="hidden" name="admin_id" class="form-control" value="<?php echo $admin_id?>">   
                        </div>
                        <div class="form-group">
                            <label>Ảnh</label>
                            <br>
                            <input type="text" name="blog_img"  class="form-control" value="<?php echo $blog_img?>">   
                        </div>
                        <div class="form-group">
                            <label for="">Nội dung</label>
                            <textarea name="blog_content" id="blog_content"class="form-control" value="" ><?php echo $blog_content?></textarea>
                            <script>CKEDITOR.replace('blog_content');</script>
                        </div>
                        <div class="form-group">
                            <label for="">Ngày đăng</label>
                            <input type="date" name="date_post" value="<?php echo $date_post?>"> 
                        </div>
                    </div>
                   <div class="modal-footer">
                   <button type="button" id="btn-close_update_items" class="btn btn-secondary" data-dismiss="modal"  onclick="Redirect()">Đóng</button>
                   <button type="submit" name="registerbtn" class="btn btn-primary">Lưu</button>
                   </div>         
                </form>
            </div>
        </div>
<?php
require_once("footer_admin.php")
?>
<script>
   function Redirect() 
   {
               window.location="./blog_list.php";
    }
   
</script>