<?php
include('database.php');

function validate($post, &$data, &$errors) {
    $id = $post['id'];
    $Category = $post['Category'];
    $Description = $post['Description'];
    $Name = $post['Name'];
    $Price = $post['Price'];
    $Spicy = $post['Spicy'];
    $Vegatarian = $post['Vegetarian'];

    if (filter_var($id, FILTER_VALIDATE_INT) === false) {
        $errors[] = 'Az id nem szam';
    }
    else {
        $data['id'] = $id;
    }

    return count($errors) === 0;
}



include('database.php');

$id = $_GET['id'];
$food = lekerdezes($kapcsolat,
    'select * from $MenuItems where id = :id',
    [':id' => $id]
)[0];
?>

<link rel="stylesheet" href="./styles/index.css">
<h1><?= $ugynok['nev'] ?></h1>
<div id="hibak">
    <?php var_dump($errors); ?>
</div>
<form action="" method="post">
    <input type="hidden" name="id" value="<?= $ugynok['id'] ?>">
  <div class="form-group">
    <label>Sz�less�g</label>
    <input type="text" class="form-control" name="szelesseg" value="<?= $ugynok['szelesseg'] ?>">
  </div>
  <div class="form-group">
    <label>Hossz�s�g</label>
    <input type="text" class="form-control" name="hosszusag" value="<?= $ugynok['hosszusag'] ?>">
  </div>
  <div class="form-check">
    <input type="checkbox" class="form-check-input" name="aktiv" 
        <?= $ugynok['aktiv'] ? 'checked' : '' ?>
    >
    <label class="form-check-label">Akt�v</label>
  </div>
  <div class="form-group">
    <label>Projekt</label>
    <input type="text" class="form-control" name="projekt" value="<?= $ugynok['projekt'] ?>">
  </div>
  <div class="form-group">
    <label>Feladat</label>
    <input type="text" class="form-control" name="feladat" value="<?= $ugynok['feladat'] ?>">
  </div>

  <button type="submit" class="btn btn-primary">Submit</button>
</form>