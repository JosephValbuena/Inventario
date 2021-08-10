<?php
    function base_url(){
        return BASE;
    }

    function media(){
        return BASE."/assets";
    }

    function dep($data){
        $format = print_r('<pre>');
        $format .=print_r($data);
        $format .=print_r('<pre>');
        return $format;
    }

    function strClean($strCadena){
        $string = preg_replace(['/\s+/','/^\s|\s$/'],[' ',''],$strCadena);
        $string = trim($string);
        $string = stripslashes($string);
        $string = str_replace("<script>","",$string);
        $string = str_replace("</script>","",$string);
        $string = str_replace("<script src>","",$string);
        $string = str_replace("<script type=>","",$string);
        $string = str_replace("SELECT * FROM","",$string);
        $string = str_replace("DELETE FROM","",$string);
        $string = str_replace("INSERT INTO","",$string);
        $string = str_replace("SELECT COUNT(*) FROM","",$string);
        $string = str_replace("DROP TABLE","",$string);
        $string = str_replace("OR '1'='1'","",$string);
        $string = str_replace('OR "1"="1"',"",$string);
        $string = str_replace('OR `1`=`1`',"",$string);
        $string = str_replace("is NULL; --","",$string);
        $string = str_replace("LIKE '","",$string);
        $string = str_replace('LIKE "',"",$string);
        $string = str_replace("LIKE `","",$string);
        $string = str_replace("OR 'a'='a","",$string);
        $string = str_replace('OR "a"="a',"",$string);
        $string = str_replace("OR `a`=`a","",$string);
        $string = str_replace("--","",$string);
        $string = str_replace("^","",$string);
        $string = str_replace("[","",$string);
        $string = str_replace("]","",$string);
        $string = str_replace("==","",$string);
        return $string;
    }

    function passGenerator($length = 10){
        $pass = "";
        $longitudPass=$length;
        $cadena = "ABCDEFGHIJKLMNOPQRSTUWXYZabcdefghijklmnopqrstuwxyz1234567890";
        $longitudCadena = strlen($cadena);

        for ($i=1; $i<=$longitudPass ; $i++) { 
            $pos = rand(0,$longitudCadena-1);
            $pass .=substr($cadena,$pos,1);
        }

        return $pass;
    }

    function token(){
        $r1 = bin2hex(random_bytes(5));
        $r2 = bin2hex(random_bytes(5));
        $r3 = bin2hex(random_bytes(5));
        $r4 = bin2hex(random_bytes(5));
        $token = $r1.'-'.$r2.'-'.$r3.'-'.$r4;
        return $token;
    }

    function formatMoney($cantidad){
        $cantidad = number_format($cantidad,2,SPD,SPM);
        return $cantidad;
    }

?>