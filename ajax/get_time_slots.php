<?php

require "../util/connection.php";

if (!isset($_GET["mid"]))
  die();

try {
  $query = $db->prepare(
    ' SELECT  -- Hall info
              halls.letter AS hallLetter,
              -- Branch info
              branches.name as branchName,
              -- timeSlot info
              timeSlots.id,
              DATE_FORMAT(`time`, "%Y-%m-%d") AS `date`,
              DATE_FORMAT(`time`, "%H:%i") as `time`
      FROM    `timeSlots`, `branches`, `halls`
      WHERE   branches.id = branchId    -- Join on branch
      AND     halls.id = hallId         -- Join on hall
      AND     movieId = ?'
  );
  $query->execute([
    $_GET['mid']
  ]);

  echo json_encode(
    $query->fetchAll(PDO::FETCH_ASSOC)
  );
} catch (PDOException $e) {
  die($e->getMessage());
}
