<?php
session_start();
require_once 'class/Eleves.php';
require_once 'class/Bdd.php';
$bdd = new Bdd();
$compt = new Eleves(array());
$compteleves = $compt->ComptNonValide($bdd);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/dataTables.bootstrap5.min.css">
</head>
<body>
<div class="container">
    <div class="row">
        <table id="example" class="table table-striped" style="width:100%">
            <thead>
            <tr>
                <th>Numérot</th>
                <th>nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Géré</th>
            </tr>
            </thead>
            <tbody>
<?php foreach ($compteleves as $value){
    echo "<tr>
            <td>".$value['id_eleves']."</td>
            <td>".$value['nom']."</td>
            <td>".$value['prenom']."</td>
            <td>".$value['email']."</td>
            <td>
                <form action='traitement/action_admin/gestion' method='post'>
                     <button type='submit'  class='btn btn-outline-secondary' name='action' value=".$value['id_eleves']."_eleves"."><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-check-lg' viewBox='0 0 16 16'>
  <path d='M12.736 3.97a.733.733 0 0 1 1.047 0c.286.289.29.756.01 1.05L7.88 12.01a.733.733 0 0 1-1.065.02L3.217 8.384a.757.757 0 0 1 0-1.06.733.733 0 0 1 1.047 0l3.052 3.093 5.4-6.425a.247.247 0 0 1 .02-.022Z'/>
</svg></button>
                
                <button type='submit'  class='btn btn-outline-secondary' name='supprime' value=".$value['id_eleves']."_eleves"."><svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-trash' viewBox='0 0 16 16'>
  <path d='M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6z'/>
  <path fill-rule='evenodd' d='M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118zM2.5 3V2h11v1h-11z'/>
</svg></button>
                </form>
              
            </td>
            </tr>";};?>
            </tbody>
            <tfoot>
            <tr>
                <th>Numérot</th>
                <th>nom</th>
                <th>Prénom</th>
                <th>Email</th>
                <th>Géré</th>
            </tr>
            </tfoot>
        </table>
    </div>
</div>


<script src="https://code.jquery.com/jquery-3.5.1.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.12.1/js/dataTables.bootstrap5.min.js"></script>

<script src="assets/js/js.data.js"></script>
</body>
</html>