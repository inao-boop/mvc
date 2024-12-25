<style>
   .container{
      width: 80%;
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
    h1{
        font-weight: bold;
        font-size: 20px;
        text-align: center;
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
    <h1>Terima Kasih Telah Melakukan Sewa!</h1>
    <table>
        <tr>
          <th>Rental ID</th>
          <th>Plat No</th>
          <th>Rent Date</th>
          <th>Return Date</th>
          <th>Price</th>
          <th>Amount</th>
          <th>Payment Date</th>
          <th>Payment Method</th>
          <th>Payment Photo</th>
        </tr>


        <tr>
          <td><?= $dataRental['rental_id'] ?></td>
          <td><?= $dataRental['plat_no'] ?></td>
          <td><?= $dataRental['rent_date'] ?></td>
          <td><?= $dataRental['return_date'] ?></td>
          <td>Rp. <?= $dataRental['price'] ?></td>
          <td>Rp. <?= $dataRental['amount']?></td>
          <td><?=$dataRental['payment_date']?></td>
          <td><?= $dataRental['payment_method']?></td>
          <td><img src="<?=  $dataRental['payment_photo']?>" alt="photo_payment"></td>
        </tr>
    </table><br>
</div>