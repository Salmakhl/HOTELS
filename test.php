<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
    
    <form action="" method="get">
    <h1 style="color:rgb(88, 24, 69);font-family:comic sans ms;"><u>INSERTION</u></h1>
        <label for="id">Numero :</label>
        <input type="numero" name="id_hotels"><br>
        <label for="titre">Titre :</label>
        <input type="text" name="titre"><br>
        <label for="adresse">Adresse :</label>
        <input type="text" name="adresse"><br>
        <label for="etoile">Etoile :</label>
        <input type="numero" name="nbre_etoile">
        <button type="submit">ajouter</button>
    </form>
<?php  
        

        $connexion= new PDO('mysql:host=localhost; dbname=test','root','');

       if (isset($_GET["id_hotels"] )&& isset($_GET["titre"]) && isset($_GET["adresse"]) && isset($_GET["nbre_etoile"])){
        $hotel = $_GET["id_hotels"];
        $titre = $_GET["titre"];
        $adresse=$_GET["adresse"];
        $etoile=$_GET["nbre_etoile"];

        if(!empty($hotel) && !empty($titre) && !empty($adresse) && empty($nbre_etoile)){
            $sql =  $connexion -> prepare ("insert into h values (?,?,?,?)");
            $ajoutre = $sql -> execute ([$hotel , $titre , $adresse, $etoile]);
            header('location:vecteurclass.php');
        }
       }
    
    ?> 
</body>
</html>