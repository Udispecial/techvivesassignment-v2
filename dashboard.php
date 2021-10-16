<?php require_once("config/init.php"); ?>

<?php
$result = selectAll("users");

?>

<?php require_once("includes/header.php") ?>
<section class="db-container">
  <aside class="sidebar">
    <ul class="sidebar-content">
      <li>
        <a href="#"><i class="fa fa-users"></i> Users</a>
      </li>
      <li>
        <a href="#"> <i class="fa fa-money"></i> Revenues</a>
      </li>
    </ul>
  </aside>
  <section class="main-content">
    <h2>All Registered Users</h2>
    <div style="overflow-x: auto" class="contents">
      <table>
        <thead>
          <tr>
            <th>S/N</th>
            <th>First Name</th>
            <th>Surname</th>
            <th>Phone Number</th>
            <th>Email</th>
            <th>DOB</th>
            <th>Gender</th>
            <th colspan="2">Actions</th>
          </tr>
        </thead>
        <tbody>

          <?php while ($row = mysqli_fetch_assoc($result)) { ?>
            <tr>
              <td><?php echo $row["id"] ?></td>
              <td><?php echo $row["fname"] ?></td>
              <td><?php echo $row["surname"] ?></td>
              <td><?php echo $row["phone"] ?></td>
              <td><?php echo $row["email"] ?></td>
              <td><?php echo $row["dob"] ?></td>
              <td><?php echo $row["gender"] ?></td>
              <td>
                <a href="" class="edit-btn"><i class="fa fa-edit"></i></a>
              </td>
              <td>
                <a href="" class="delete-btn"><i class="fa fa-trash"></i></a>
              </td>
            </tr>
          <?php } ?>
        </tbody>
      </table>
    </div>
  </section>
</section>
<?php require_once("includes/footer.php"); ?>