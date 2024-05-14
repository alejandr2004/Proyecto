<?php
    require_once "../conexion.php";

    if($_SERVER['REQUEST_METHOD'] == 'POST'){
        $ename=$_POST['ename'];
        $job=$_POST['job'];
        $hiredate=$_POST['hiredate'];
        $sal=$_POST['sal'];
        $deptno=$_POST['deptno'];
        $comm=$_POST['comm'];
        $empno =$_POST['empno'];

        $sql = $conexion->prepare("INSERT INTO emp (empno ,ename, job, hiredate, sal, deptno, comm) VALUES (:empno, :ename, :job, :hiredate, :sal, :deptno, :comm);");
        
        $sql->execute(
            array(
                'empno' => $empno,
                'ename' => $ename,
                'job' => $job,
                'hiredate' => $hiredate,
                'sal' => $sal,
                'deptno' => $deptno,
                'comm' => $comm,
                 
            
            )
            );
        header('Location: ../index.php');
    }
    ?>