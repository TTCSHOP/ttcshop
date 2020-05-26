  
<?php
include('../includes/data.php');
  
      //  $id_delete = $_GET['delete'];
      //  echo $id_delete;
       if(isset($_GET['agree'])){
         $id_delete = $_GET['agree'];
         $delete_ad=mysqli_query($connect,"DELETE FROM `advertisement` WHERE  `advertisement`.`id` = $id_delete");
         if($delete_ad){
          echo '<script language="javascript">';
          echo 'alert("Xóa thành công!")';
          echo '</script>';
          header("Location:../public/tables.php");
       }
       else{
         echo '<script language="javascript">';
         echo 'alert("Không thành công!")';
         echo '</script>';
         header("Location:../public/tables.php");
       }
      }
   
    include('../includes/header.php');
?>
    <!-- Modal -->
    <!-- <div  tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true"> -->
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header bg-info">
                    <h5 class="modal-title " id="exampleModalLongTitle">Xóa sản phẩm</h5>
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
                        <form action="delete_ad.php?<?php echo $_GET['delete']?>" method="GET" enctype="multipart/form-data">
                            <button type="submit" class="btn btn-secondary"  name="agree" value = "<?php echo $_GET['delete']?>">Có</button>
                            <a href="../public/advertisement.php">
                              <button type="button" value="Lưu thay đổi"class="btn btn-primary"data-dismiss="modal" >Hủy</button>
                           </a>
                        </form>
                        </div>
                    
                </div>
            </div>
        </div>
    </div>
