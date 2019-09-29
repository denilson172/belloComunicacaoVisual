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

    //salva registro
    function DBCreateFK($tableEndereco, $tableCliente, array $dataEndereco, array $dataCliente){
        $tableEndereco = DB_PREFIX.'_'.$tableEndereco;
        $tableCliente = DB_PREFIX.'_'.$tableCliente;
        $dataEndereco = DBEscape($dataEndereco);
        $dataCliente = DBEscape($dataCliente);
        $fildsEndereco = implode(',',array_keys($dataEndereco));
        $fildsCliente = implode(',',array_keys($dataCliente));
        $valuesEndereco = "'".implode("', '",$dataEndereco)."'";    
        $valuesCliente = "'".implode("', '",$dataCliente);    
        //open connection=========================================================================================
        $link = DBConnect();
        //validation connection=========================================================================================
        if (mysqli_connect_errno()) {
            printf("A conexão falhou: %s\n", mysqli_connect_error());
            exit();
        }
        //query Endereco=========================================================================================
        $queryEndereco = "INSERT INTO {$tableEndereco} ( {$fildsEndereco} ) VALUES ( {$valuesEndereco} )";
        mysqli_query($link, $queryEndereco);
        $fk_Endereco =  (mysqli_insert_id($link)); //id fk
        //query Cliente=========================================================================================
        $queryCliente = "INSERT INTO {$tableCliente} ( {$fildsCliente} ) VALUES ( {$valuesCliente}{$fk_Endereco}' )";

        return DBExecute($queryCliente);

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

        //listar registros
   /* function DBReadFK($filds = 'id_', $table, $params = null, ){
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
        }*/
    
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