  
<?php
include('../includes/data.php');
  
      //  $id_delete = $_GET['delete'];
      //  echo $id_delete;
       if(isset($_GET['agree_delete_admin'])){
         $id_delete = $_GET['agree_delete_admin'];
         
         // $delete_product = mysqli_query($connect,"DELETE FROM products WHERE id = '$id_delete'");
         $delete_admin=mysqli_query($connect,"DELETE FROM `users` WHERE id = $id_delete");
       
         if($delete_admin){
          echo '<script language="javascript">';
          echo 'alert("Xóa thành công!")';
          echo '</script>';
          header("Location:../public/admin_manager.php");
       }
       else{
         echo '<script language="javascript">';
         echo 'alert("Không thành công!")';
         echo '</script>';
        //  header("Location:../public/admin_manager.php");
       }
      }
   
    include('../includes/header.php');
?>
    <!-- Modal -->
    <!-- <div  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLongTitle">Xóa quản trị viên</h5>
                    <a href="../public/tables.php">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                        </button>
                     </a>
                </div>
                <div class="modal-body">
                    
                    
                        <div class="form-group col-md-8">
                            <label for="recipient-name" class="col-form-label">Bạn có chắc chắn muốn xóa?</label>
                           
                        </div>
                        
                        <div class="modal-footer">
                        <form action="delete_admin.php?delete=<?php echo $_GET['delete_admin'] ?>"method="GET" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-secondary"  name="agree_delete_admin" value = "<?php echo $_GET['delete_admin']?>">Có</button>
                            <a href="../public/admin_manager.php">
                              <button type="button" value="Lưu thay đổi"class="btn btn-primary"data-dismiss="modal" >Hủy</button>
                           </a>
                        </form>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
