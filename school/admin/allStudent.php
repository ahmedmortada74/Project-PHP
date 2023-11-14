<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Student Table</title>
  <style>
    .table {
      background-color: #f5f5f5;
      border: 2px solid #d1d1d1;
    }

    .table thead {
      background-color: #333;
      color: #fff;
    }

    .table th {
      border: 5px solid #ccc;
    }

    .table td {
      border: 2px solid #ccc;
    }
  </style>
</head>
<body>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">ID</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Birth Date</th>
        <th scope="col">Courses</th>
        <th scope="col">Status</th>
        <th scope="col">Action1</th>
        <!-- <th scope="col">Action2</th> -->
      </tr>
    </thead>
    <tbody>
      <?php
      // require_once "template/nav.php";
      require_once "crud/connection.php";
      require_once "../Student.php";
      $select = $connection->prepare('SELECT * FROM students');
      $select->execute();
      $students = $select->fetchAll(PDO::FETCH_CLASS, 'Student');

      foreach ($students as $student) {
      ?>
      <tr>
        <th scope="row"><?= $student->id; ?></th>
        <td><?= $student->student_name; ?></td>
        <td><?= $student->student_img; ?></td>
        <td><?= $student->birth_date; ?></td>
        <td><?= $student->courses; ?></td>
        <td><?= $student->student_status; ?></td>
        <td>
          <a href="crud/delete.php?id=<?= $student->id ?>" class="btn btn-danger">
            <i class="bi bi-trash"></i> Delete
          </a>
          <a href="edit.php?id=<?= $student->id ?>" class="btn btn-primary">
            <i class="bi bi-pencil"></i> Update
          </a>
        </td>
      </tr>
      <?php
      }
      ?>
    </tbody>
  </table>

  <?php
  require_once "template/footer.php";
  ?>
</body>
</html>