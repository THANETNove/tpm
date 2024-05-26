<?php 
    function redirect($url)
    {
    echo "<script> window.location.assign('".$url."');</script>";
    }
    function JAlert($message)
    {
        echo "<script> alert('".$message."');</script>";
    }
    function goBack(){
        echo "<script> { window.history.back() } </script>"; 
    }
?>