<?php $_SESSION['csrf_token'] = bin2hex(random_bytes(32)); ?>
<style>
   .container{
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
    table {
      width: 100%; 
      margin-top: 20px;
      margin-bottom: 20px;
    }

    th, td {
      padding: 12px 8px;
      text-align: left;
      border-bottom: 1px solid rgb(229, 231, 235);
    }

    th {
      font-weight: bold;
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



<div class="container">
    <table>
        <tr>
          <th>Rental ID</th>
          <th>Plat No</th>
          <th>Rent Date</th>
          <th>Return Date</th>
          <th>Price</th>
          <th>Amount</th>
        </tr>

        <tr>
          <td><?= $dataRental['rental_id'] ?></td>
          <td><?= $dataRental['plat_no'] ?></td>
          <td><?= $dataRental['rent_date'] ?></td>
          <td><?= $dataRental['return_date'] ?></td>
          <td>Rp. <?= $dataRental['price'] ?></td>
          <td>Rp. <?= $dataRental['amount']?></td>
        </tr>
        
    </table><br>
    
    <form action="/pembayaran" method="post" enctype="multipart/form-data">
    <input name="csrf_token" value="<?= $_SESSION['csrf_token']?>" hidden>
    <input type="text" name="rental_id" value="<?= $dataRental['rental_id']?>" hidden>
    <div>
        <label for="payment_date">Payment Date</label>
        <input type="datetime-local" id="payment_date" name="payment_date">
    </div>
    <div>
        <label for="payment_method">Payment Method</label>
        <select id="payment_method" name="payment_method">
        <option value="pilih_methode"></option>
        <option value="bank_transfer">Bank Transfer</option>
        <option value="cash">Cash</option>
        <option value="e-Wallet">E-Wallet/QRIS</option>
        </select>
    <img id="preview">
    </div>
    <input type="file" onchange="setPreview()" name="photo" accept="image/png,image/jpg,image/jpeg" id="photo">
    <button type="submit" name="updateData"> Submit </button>
    </form>
</div>
<script>
        function setPreview(){
            const inputFoto = document.getElementById('photo');
            const previewFoto = document.getElementById('preview');
            const [file] = inputFoto.files;
            previewFoto.src = URL.createObjectURL(file);
        }
    </script>

    