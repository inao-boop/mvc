<?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); ?>
  <style>
    form, h2{
      width: 60%;
      margin: 20px auto;
      border: 1px solid rgb(229, 231, 235);
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }
    
    label {
      display: block;
      margin-bottom: 0px;
      font-weight: bold;
    }
    input, textarea, select {
      width: 100%;
      padding: 8px 20px;
      margin: 5px 0px 50px;
      border: 1px solid gray;
      border-radius: 4px;
    }
    img{
      width: 10%;
    }
    button {
      background-color: rgb(83, 94, 251) ;
      color: white;
      padding: 10px 20px;
      border: none;
      border-radius: 4px;
      cursor: pointer;
    }
    button:hover {
      background-color:rgb(35, 29, 84);
    }
  </style>

  <h2>Silakan lakukan pemesanan dengan melengkapi form dibawah ini.</h2>
  <form action="/rental" method="POST" enctype="multipart/form-data">
  <input name="csrf_token" value="<?= $_SESSION['csrf_token']?>" hidden>
    <div class="form-group">
      <label for="plat_no">Plat Number</label>
      <input type="text" name="plat_no" value="<?=($dataRental['plat_no']) ?>" >      
    </div>
    <div>
      <label for="merk">Merk</label>
      <input type="text" name="merk" value="<?= htmlspecialchars($dataRental['merk'])?>">
    </div>
    <div>
      <label for="merk">Color</label>
      <input type="text" name="color" value="<?= htmlspecialchars($dataRental['color'])?>">
    </div>
    <div>
      <label for="merk">Price</label>
      <input type="number" name="price" value="<?= htmlspecialchars($dataRental['price'])?>">
    </div>
    <div>
      <label for="status">Status</label>
      <input type="text" name="status" value="<?=($dataRental['status'])?>">
    </div>     
    <div>
      <label for="rent_date">Rent Date</label>
      <input type="date" id="rent_date" name="rent_date">
    </div>
    <div>
      <label for="return_date">Return Date</label>
      <input type="date" id="return_date" name="return_date"> 
    </div>
      <button type="submit" name="viewUpdate">Next</button>
  </form>

   


