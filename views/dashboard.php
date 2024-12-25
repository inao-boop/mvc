
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

    .actions {
      display: flex;
      margin: 20px 50px 20px; 
      gap: 10px; 
      justify-content: flex-end;
      color: blue;
    }

    .logout, .edit {
        text-decoration: none; 
        padding: 8px 16px; 
        border-radius: 4px;
    }

    .logout {
        margin: 50px 20px; 
        background-color: #ef4444;
        color: white;
    }


    .edit:hover, .delete:hover {
      text-decoration: underline;
    }

    h1{
      width: 80%;
      margin: 20px auto;
      border: 1px solid rgb(229, 231, 235);
      border-radius: 8px;
      padding: 20px;
      box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
      font-weight: bolder;
      font-size: 30px;
    }

    .sewa{
      background-color: black;
      color: white;
      display: block;
      margin: 10px 10px;
      text-align: center;
      border: 1px solid rgb(229, 231, 235);
      border-radius: 4px;
      width: auto;
    }

  </style>

    
    <h1>Hallo Selamat Datang, <?= $_SESSION['name'] ?>!</h1>

    
    <div class="container">
    <h2>Car List</h2>
    <p>List mobil yang tersedia adalah mobil yang statusnya 1.</p>
    <div class="actions"><a href="/car" class="edit">Edit</a></div>
    <table>
        <tr>
          <th>Plat No</th>
          <th>Merk</th>
          <th>Color</th>
          <th>Price</th>
          <th>Status</th>
          <th></th>
          <th></th>
        </tr>

    <?php foreach ($dataCar as $car) { ?>
        <tr>
        <td><?= $car['plat_no']?></td>
          <td><?= htmlspecialchars($car['merk']) ?></td>
          <td><?= htmlspecialchars($car['color']) ?></td>
          <td>Rp. <?= htmlspecialchars($car['price']) ?></td>
          <td><?= ($car['status']) ?></td>
          <td>
            <?php if($car['status']){ ?>
              <a href="rental?plat_no=<?=$car['plat_no']?>" class="sewa">Sewa</a>
            <?php } ?>
            
          </td>
    <?php } ?>
    </table><br>
      
      <a href="/logout" class="logout">Logout</a>
  
    
    
    </div>