<?php
//https://www.youtube.com/watch?v=Bfw6rHkUFzk

    //executa querys
    function DBExecute($query){
        $link = DBConnect();
        $result = @mysqli_query($link, $query) or die(mysqli_error($link));
        DBClose($link);
        return $result;
    }

    //salva registro
    function DBCreate($table, array $data){
        $table = DB_PREFIX.'_'.$table;
        $data = DBEscape($data);
        $filds = implode(',',array_keys($data));
        $values = "'".implode("', '",$data)."'";
        $query = "INSERT INTO {$table} ( {$filds} ) VALUES ( {$values} )";
        //echo DBRead('endereco',null,'id_endereco');
        //var_dump $id[];
        return DBExecute($query);
    }

    //salva registro com FK
    function DBCreateFK($table, array $data){
        $table = DB_PREFIX.'_'.$table;
        $data = DBEscape($data);
        $filds = implode(',',array_keys($data));
        $values = "'".implode("', '",$data)."'";
        $con = DBConnect();
        $query = mysqli_query ($con,"insert into {$table} ( {$filds} ) values ( {$values} )");

        //$id_inserido = mysqli_insert_id($con);
        echo (mysqli_insert_id(DBConnect()));
        return DBExecute($query);
    }

    //listar registros
    function DBRead($table, $params = null, $filds = '*'){
        $table = DB_PREFIX.'_'.$table;
        $params = ($params) ? " {$params}" : null;
        $query = "SELECT {$filds} FROM {$table}{$params}";
        $result = DBExecute($query);
    
        if(!mysqli_num_rows($result)) 
            return false;
        else{
            while ($res = mysqli_fetch_assoc($result)){
                $data[] = $res;

                return $data;//retorna um array com cada linha da tabela
            }
        }
    
    }

    //listar registros
    function DBReadId($table, $params = null, $filds = '*'){
        $table = DB_PREFIX.'_'.$table;
        $params = ($params) ? " {$params}" : null;
        $query = "SELECT {$filds} FROM {$table}{$params}";
        $result = DBExecute($query);
    
        if(!mysqli_num_rows($result)) 
            return false;
        else{
            while ($res = mysqli_fetch_assoc($result)){
                $data[] = $res;

                return $data;//retorna um array com cada linha da tabela
            }
        }
    
    }


?>