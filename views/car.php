
  <style>
    .container {
      width: 80%;
      margin: 20px auto;
      border: 1px solid rgb(229, 231, 235);
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
    }

    h2 {
      font-size: 24px;
      font-weight: bold;
      text-align: center;
    }

    p {
      font-size: 14px;
      margin-bottom: 30px;
      color:rgb(107, 114, 128);
      text-align: center;
    }

    table {
      width: 100%; 
      margin-top: 20px;
    }

    th, td {
      padding: 12px 8px;
      text-align: left;
      border-bottom: 1px solid rgb(229, 231, 235);
    }

    th {
      font-weight: bold;
    }

    a {
      font-size: 14px;
      cursor: pointer;
    }

    .edit {
      color:rgb(79, 70, 229);
      text-decoration: none;
      margin-right: 5px;
    }

    .delete {
      color: #ef4444;
    }

    .edit:hover, .delete:hover {
      text-decoration: underline;
    }

    

  </style>

  <div class="container">
    <h2>Car List</h2>
    <p>List mobil yang tersedia adalah mobil yang statusnya 1</p>
    <table>
        <tr>
          <th>Plat No</th>
          <th>Merk</th>
          <th>Color</th>
          <th>Price</th>
          <th>Status</th>
          <th></th>
        </tr>

    <?php foreach ($dataCar as $car) { ?>
        <tr>
          <td><?=($car['plat_no']) ?></td>
          <td><?= htmlspecialchars($car['merk']) ?></td>
          <td><?= htmlspecialchars($car['color']) ?></td>
          <td>Rp. <?= htmlspecialchars($car['price']) ?></td>
          <td><?= htmlspecialchars($car['status']) ?></td>
          <td>
            <a href="update?plat_no=<?=$car['plat_no']?>" class="edit">Edit</a>
        </tr>
        
    <?php } ?>
    </table>
  