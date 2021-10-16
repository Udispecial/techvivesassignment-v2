<?php require_once("config/init.php"); ?>

<?php
$result = false;
if ($_SERVER["REQUEST_METHOD"] === "POST") {
  $_POST["date_created"] = date('Y-m-d H:i:s');
  // remove submit button name
  unset($_POST["submit"]);
  $result = insertData($_POST, "users");
}

?>



<?php require_once("includes/header.php") ?>
<main>
  <div class="container">
    <div class="form-header">
      <h2>Registration form</h2>
    </div>
    <form action="" method="post" class="form">
      <?php
      if ($result) {
      ?>
        <div style="padding:8px; background:green;color:#fff; font-size:1.3rem; border-radius:3px; margin-bottom:6px;">New user regisitered succesfully</div>

      <?php } ?>
      <div class="form-control">
        <label for="fname">First Name</label>
        <input type="text" required value="" placeholder="Enter your first name" name="fname" id="fname" />
      </div>
      <div class="form-control">
        <label for="surname">Surname</label>
        <input type="text" required value="" placeholder="Enter your surname" name="surname" id="surname" />
      </div>
      <div class="form-control">
        <label for="dob">Date of birth</label>
        <input type="date" required value="" name="dob" />
      </div>

      <div class="form-control">
        <label for="phone">Phone Number</label>
        <input type="number" required value="" placeholder="Enter your phone number" name="phone" id="dob" />
      </div>
      <div class="form-control">
        <label for="email">Email</label>
        <input type="text" requiredvalue="" placeholder="Enter your email" name="email" id="email" />
      </div>
      <div class="form-control">
        <label for="gender">Gender</label>
        <select required name="gender" id="gender">
          <option value="">Select your gender</option>
          <option value="male">Male</option>
          <option value="female">Female</option>
        </select>
      </div>
      <div class="form-control">
        <input type="submit" value="Submit" name="submit" />
      </div>
    </form>
  </div>
</main>
<?php require_once("includes/footer.php"); ?>