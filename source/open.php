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
/*
    if (trim($szelesseg) == '') {
        $errors[] = 'A sz�less�g k�telez�';
    } 
    else if (filter_var($szelesseg, FILTER_VALIDATE_INT) === false) {
        $errors[] = 'A sz�less�g nem sz�m';
    }
    else {
        $data['szelesseg'] = (int)$szelesseg;
    }

    if (trim($hosszusag) == '') {
        $errors[] = 'A hossz�s�g k�telez�';
    } 
    else if (filter_var($hosszusag, FILTER_VALIDATE_INT) === false) {
        $errors[] = 'A hossz�s�g nem sz�m';
    }
    else {
        $data['hosszusag'] = (int)$hosszusag;
    }

    $data['aktiv'] = isset($post['aktiv']);

    if (trim($projekt) == '') {
        $errors[] = 'A projekt k�telez�';
    }   
    else {
        $data['projekt'] = $projekt;
    }

    if (trim($feladat) == '') {
        $errors[] = 'A feladat k�telez�';
    }   
    else {
        $data['feladat'] = $feladat;
    }
*/
    return count($errors) === 0;
}
//beh�vja az adott adatokat a v�toz�kba
//emiatt �rja ki a pulzus�t stb ha r�kattintok
// $errors = [];
// if ($_POST) {
//     if (validate($_POST, $data, $errors)) {
//         vegrehajtas($kapcsolat,
//             'UPDATE `teszt` SET 
//                 aktiv = :aktiv, projekt = :projekt, feladat = :feladat, 
//                 szelesseg = :szelesseg, hosszusag = :hosszusag 
//              WHERE id = :id',
//             $data
//         );
//         header('Location: lista.php');
//         exit();
//     }
//}


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