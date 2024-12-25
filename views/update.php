<?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); ?>
<style>
    .container {
      width: 60%;
      margin: 20px auto;
      border: 1px solid rgb(229, 231, 235);
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    a{
      background-color: rgb(83, 94, 251) ;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
      float: right;
    }
    h1{
        font-weight: bold;
        font-size: 25px;
        text-align: center;
    }
    input{
        border: 1px solid black;
        margin: 10px 0px;
    }

    .delete {
      background-color: red;
      color: white;
      padding: 10px 20px;
      margin-bottom: 30px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }

    .update{
      background-color: black;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }


</style>

    <div class="container">
    <h1>Update Data Mobil</h1>
    <a href="addCar" class="addcar">Add Car</a>
    <br>
    <form action="/update" method="post">
    <input name="csrf_token" value="<?= $_SESSION['csrf_token']?>" hidden>
        <input type="text" name="plat_no" value="<?= ($dataCar['plat_no'])?>">
        <br>
        <label>Status:</label><br>
        <input type="radio" name="status" value="1" <?php if($dataCar['status'] == 1)echo "checked"?>> Tersedia 
        <br>
        <input type="radio" name="status" value="0" <?php if ($dataCar['status'] == 0) echo"checked" ?>> Tidak Tersedia <br>
        <br>
        <button class="update" type="submit" name="updateData">Update</button><br>
    </form><br>
   
    <div>
        <form action="/delete" method="post" onsubmit="return confirm('Yakin ingin menghapus data')">
            <input type="text" name="plat_no" value="<?php echo $dataCar['plat_no'] ?>" hidden>
            <button type="submit" name="deleteData" class="delete">Delete</button>
        <br>
        </form>
    </div>
    </div>

   

        
        
        
   
