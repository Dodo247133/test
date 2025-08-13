
<?php
$courses = [
  ["id" => "DS101", "name" => "Python for Data Science", "credits" => 3],
  ["id" => "WD110", "name" => "Web Dev Starter", "credits" => 3],
  ["id" => "AZ201", "name" => "Azure Cloud Basics", "credits" => 2]
];

$students = [
  ["id" => "S001", "name" => "Aarav Patel"],
  ["id" => "S002", "name" => "Diya Sharma"]
];

function h($s){ return htmlspecialchars($s, ENT_QUOTES, 'UTF-8'); }
?>
<!doctype html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Student Portal</title>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@picocss/pico@2/css/pico.min.css">
</head>
<body>
<main class="container">
  <h1>🎓 Student Portal (Demo)</h1>

  <section>
    <h2>Courses</h2>
    <table>
      <thead><tr><th>ID</th><th>Name</th><th>Credits</th></tr></thead>
      <tbody>
      <?php foreach($courses as $c): ?>
        <tr><td><?=h($c["id"])?></td><td><?=h($c["name"])?></td><td><?=h($c["credits"])?></td></tr>
      <?php endforeach; ?>
      </tbody>
    </table>
  </section>

  <section>
    <h2>Mark Attendance</h2>
    <form method="post">
      <label>Student
        <select name="student">
          <?php foreach($students as $s): ?>
          <option value="<?=h($s["id"])?>"><?=h($s["name"])?> (<?=h($s["id"])?>)</option>
          <?php endforeach; ?>
        </select>
      </label>
      <label>Course
        <select name="course">
          <?php foreach($courses as $c): ?>
          <option value="<?=h($c["id"])?>"><?=h($c["name"])?> (<?=h($c["id"])?>)</option>
          <?php endforeach; ?>
        </select>
      </label>
      <button type="submit">Submit</button>
    </form>
    <?php if($_SERVER["REQUEST_METHOD"]==="POST"): ?>
      <article>
        <strong>Recorded (demo only):</strong>
        Student <?=h($_POST["student"]??"")?> present in <?=h($_POST["course"]??"")?> at <?=date("Y-m-d H:i:s")?>.
      </article>
    <?php endif; ?>
  </section>
</main>
</body>
</html>
