<?php $connexion= new PDO('mysql:host=localhost; dbname=test','root','');
       $id= $_GET['id_hotel'] ??'';
 
       if(isset ($_GET["modifier"])){
           
           
           $titre = $_GET["titre"];
           $adresse=$_GET["adresse"];
           $etoile=$_GET["nbre_etoile"];
    
           $sql  = $connexion ->prepare('UPDATE h set  titre =? , adresse=? , nbre_etoile = ? where id_hotel= ? ');
           $sql-> execute([$titre , $adresse , $etoile ,$id]);
           header('location: vecteurclass.php');
           

       }
       $sql = $connexion->prepare("SELECT * FROM h WHERE id_hotel = :id_hotel");
       $sql->execute([':id_hotel' => $id]);
       $data = $sql->fetchAll(PDO::FETCH_ASSOC);
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>modifier</title>
    <style>
        button{
            color: white;
            width: 150px;
            height: 50px;
            border: 0px;
            border-radius: 13px;
            margin-right:3px;
            background-color: pink;  
            margin-top:80px;
            margin-left:100px;
            font-size:larger;

        }
        form{
            display:flex;
            flex-direction:column;
            width:800px;
            border:5PX solid rgb(88, 24, 69);
            padding:90px;
            margin-left:100px;
            border-radius:20px;
        }
        label{
            font-size:larger;
            color:rgb(88, 24, 69);
            margin-left:90px;
            font-family:comic sans ms;
        }
        input{
            width:200px;
            height:20px;
            border:2px solid rgb(88, 24, 69);
            border-radius:10px;
            margin-left:90px;
            color:#9400C3;
        }
    </style>
</head>
<body>
<?php 
foreach ($data as $x): ?>
<form method="get">
    <h1 style="color:rgb(88, 24, 69);font-family:comic sans ms;"><u>MODIFICATION</u></h1>
        <label for="id">Numéro :</label>
        <input type="hidden" type="numero" name="id_hotel" value="<?php echo $x['id_hotel']?>"><br>
        <label for="titre">titre :</label>
        <input type="text" name="titre" value="<?php echo $x['titre']?>"><br>
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse" value="<?php echo $x['adresse']?>"><br>
        <label for="etoile">Etoile :</label>
        <input type="numero" name="nbre_etoile" value="<?php echo $x['nbre_etoile']?>">
        <button type="submit" name="modifier">modifier</button>
    </form>
    <?php endforeach; ?>

</body>
</html>