<?php
//https://www.youtube.com/watch?v=Bfw6rHkUFzk

require_once __DIR__ . '/../Model/projetoModel.php';

    //executa querys
    function DBExecute($query){
        $link = DBConnect();
        $result = @mysqli_query($link, $query) or die(mysqli_error($link));
        DBClose($link);
        return $result;
    }

    //salva registro
    /*function DBCreate($table, array $data){
        $table = DB_PREFIX.'_'.$table;
        $data = DBEscape($data);
        $filds = implode(',',array_keys($data));
        $values = "'".implode("', '",$data)."'";
        $query = "INSERT INTO {$table} ( {$filds} ) VALUES ( {$values} )";
        //echo DBRead('endereco',null,'id_endereco');
        //var_dump $id[];
        return DBExecute($query);
    }*/

    //salva registro
    function DBCreateFK(
        $tableEndereco,
        $tableCliente,
        $tableLogo,
        $tableProjeto,
        array $dataEndereco,
        array $dataCliente,
        array $dataLogo,
        array $dataProjeto
        ){
        //inserindo prefixo do BD
        $tableEndereco = DB_PREFIX.'_'.$tableEndereco;
        $tableCliente = DB_PREFIX.'_'.$tableCliente;
        $tableLogo = DB_PREFIX.'_'.$tableLogo;
        $tableProjeto = DB_PREFIX.'_'.$tableProjeto;
        //evitando SQL Inject
        $dataEndereco = DBEscape($dataEndereco);
        $dataCliente = DBEscape($dataCliente);
        $dataLogo = DBEscape($dataLogo);
        $dataProjeto = DBEscape($dataProjeto);
        //pegando elementos do array
        $fildsEndereco = implode(',',array_keys($dataEndereco));
        $fildsCliente = implode(',',array_keys($dataCliente));
        $fildsLogo = implode(',',array_keys($dataLogo));
        $fildsProjeto = implode(',',array_keys($dataProjeto));
        //formatando os values das querys
        $valuesEndereco = "'".implode("', '",$dataEndereco)."'";    
        $valuesCliente = "'".implode("', '",$dataCliente);    
        $valuesLogo = "'".implode("', '",$dataLogo)."'";
        //var_dump ($dataProjeto);
        $valuesProjeto = "'".implode("', '",$dataProjeto);
        //open connection=========================================================================================
        $link = DBConnect();
        //validation connection=========================================================================================
        if (mysqli_connect_errno()) {
            printf("A conexão falhou: %s\n", mysqli_connect_error());
            exit();
        }
        //ENDERECO - QUERY=========================================================================================
        $queryEndereco = "INSERT INTO {$tableEndereco} ( {$fildsEndereco} ) VALUES ( {$valuesEndereco} )";
        mysqli_query($link, $queryEndereco);
        $fk_Endereco =  (mysqli_insert_id($link)); //id fk
        //CLIENTE - QUERY=========================================================================================
        $queryCliente = "INSERT INTO {$tableCliente} ( {$fildsCliente} ) VALUES ( {$valuesCliente}{$fk_Endereco}' )";
        mysqli_query($link, $queryCliente);
        $fk_Cliente =  (mysqli_insert_id($link)); //id fk
        //LOGO - QUERY================================================================================================
        $queryLogo = "INSERT INTO {$tableLogo} ( {$fildsLogo} ) VALUES ( {$valuesLogo} )";
        mysqli_query($link, $queryLogo);
        $fk_Logo =  (mysqli_insert_id($link)); //id fk
        //CLIENTE - QUERY=========================================================================================
        $queryProjeto = "INSERT INTO {$tableProjeto} ( {$fildsProjeto},id_logo,id_cliente ) VALUES ( {$valuesProjeto}','{$fk_Logo}','{$fk_Cliente}' )";

        return DBExecute($queryProjeto);
        DBClose($link);
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
            }
            return $data;//retorna um array com cada linha da tabela
        }
    }

    //PROJETO - listar registros
    

     //listar registros
     /*function DBReadProjeto($table, $params = null, $filds = '*'){
        $table = DB_PREFIX.'_'.$table;
        $params = ($params) ? " {$params}" : null;
        $query = "SELECT {$filds} FROM {$table}{$params}";
        $result = DBExecute($query);
    
        if(!mysqli_num_rows($result)) 
            return false;
        else{
            $res = mysqli_fetch_assoc($result);
                for($i=0; $i < count($res); $i++){
                    $projeto[$i] = new ProjetoModel();

                    $projeto[$i]->setIdProjeto($res[$i]['id_projeto']);
                    $projeto[$i]->setPlanoProjeto($res[$i]['plano_projeto']);
                    $projeto[$i]->setStatusProjeto($res[$i]['status_projeto']);
                    $projeto[$i]->setNomeProjeto($res[$i]['nome_projeto']);
                    $projeto[$i]->setIdLogo($res[$i]['id_logo']);
                    $projeto[$i]->setIdCliente($res[$i]['id_cliente']);
                }
                return $projeto; 
            
            //return $data;//retorna um array com cada linha da tabela
        }
    }*/

    //validar login
    function DBLogin($table, $email, $senha){
        $table = DB_PREFIX.'_'.$table;
        $query = "SELECT * FROM {$table} WHERE email_login='$email' AND senha_login='$senha' LIMIT 1";
        $result = DBExecute($query);
        $row = mysqli_fetch_assoc($result);
        if (empty($row)) {
            $_SESSION['errorlogin'] = "Erro: Usuario ou senha invalido";
            header("location:../Views/Login/login.php");
        }
        else {
            $_SESSION['email'] = $row['email_login'];//Adaptar para os campos da tabela login
            $_SESSION['senha'] = $row['senha_login'];//Adaptar para os campos da tabela login

            header("location: ../Controller/projetoController.php");
            //header("location: ../Views/adm/projetos/projetos.php");//colocar redirecionamento
        }	
        return session_start();
    }


?>