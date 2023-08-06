<?php
require_once("header_admin.php");
?>
<!-- nội dung -->
<div class="col-lg-9">
    <!--div Thêm tên -->
    <div class="title_item">DANH SÁCH LIÊN HỆ</div>
    <div class="scroll">
<!-- <div class="admin_item-content" style=" height:1000px; width:100%; "> -->
        <div class="container" style="margin-top:10px;">
                <table class="table table-striped table-bordered">
                    <thead>            
                            <tr>
                                <th>ID</th>
                                <th>Tên người gửi</th>
                                <th>Email</th>
                                <th>Chủ đề</th>
                                <th>Nội dung</th>
                                <th>Xóa</th>
                            </td>
                            </tr>                    
                    </thead>
                    <tbody>
                    <?php
                            $sql="SELECT * FROM `tbl_contact` WHERE 1";
                            $ketQuaTruyVan = $conn->query($sql);
                            if($ketQuaTruyVan -> num_rows>0)
                            {
                                while($contact = $ketQuaTruyVan -> fetch_assoc())
                                {
                        ?>
                            <tr>
                                <td>
                                    <?php echo $contact['contact_id'];?>
                                </td>
                                <td>
                                    <?php echo $contact['name'];?>
                                </td>
                                <td>
                                <?php echo $contact['email'];?>
                                    
                                </td>
                                <td>
                                    <?php echo $contact['title'];?>
                                </td>
                                <td>
                                    <?php echo $contact['content'];?>
                                </td>

                                <td>    
                                <a class="btn btn-danger" href="./contact_xoa.php?contact_id=<?php echo $contact['contact_id'];?>">Xóa</a>
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
<?php
require_once("footer_admin.php")
?>