<?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); ?>

<style>
    .container {
      width: 40%;
      margin: 20px auto;
      border: 1px solid rgb(229, 231, 235);
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    label {
      margin-bottom: 5px; 
      font-weight: bold;
    }
    input{
        border: 1px solid black;
        border-radius: 5px;
        margin: 10px 0px 10px;
    }
    h1{
        font-weight: bold;
        font-size: 20px;
        text-align: center;
    }

    button {
      background-color: rgb(83, 94, 251) ;
      color: white;
      margin-top: 10px;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color:rgb(35, 29, 84);
    }
</style>

    <div class="container">
    <h1>Add Data Mobil</h1>
    <br>
    <form action="/addCar" method="post">
    <input name="csrf_token" value="<?= $_SESSION['csrf_token']?>" hidden>
        <label>Plat Number</label><br>
        <input type="text" name="plat_no">
        <br>
        <label>Merk</label><br>
        <input type="text" name="merk">
        <br>
        <label>Color</label><br>
        <input type="text" name="color">
        <br>
        <label>Price</label><br>
        <input type="number" name="price">
        <br>
        <label>Status:</label><br>
        <input type="radio" name="status" value="1"> Tersedia 
        <br>
        <input type="radio" name="status" value="0"> Tidak Tersedia
        <br>
        
        <button type="submit" name="addData"> Add </button>
    </form>

    </div>

        
        
        
   
