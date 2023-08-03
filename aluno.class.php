<?php
class Aluno{
    public function login($ra, $nome){
        global $pdo;
       
        $sql = " SELECT * FROM aluno WHERE  ra = :ra and nome = :nome";
        $sql = $pdo->prepare($sql);
        $sql->bindValue("ra", ($ra));
        $sql->bindValue("nome", $nome);
        $sql->execute();

        if($sql->rowCount() > 0){
            $dado = $sql->fetch();


            $_SESSION['iduser']= $dado['id'];

            return true;
        }else{
            return false;
        }

    }
}
?>