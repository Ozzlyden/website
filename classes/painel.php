<?php
class Painel
{
    // Variaveis globais cargos
    public static $cargos = [
        '0' => 'Normal',
        '1' => 'Sub Administrador',
        '2' => 'Administrador'];

    public static function logado()
    {
        // VERIFICACAO DE LOGIN
        return isset($_SESSION['login']) ? true : false;   // $_SESSION armazena dados no navegador do usuario
    }

    public static function loggout()
    {
        // VERFICACAO DE LOGGOUT
        session_destroy(); // Destruir os dados da sessao
        setcookie('lembrar',true,time()-1,'/');     // Destruir o cook
        header('Location: ' . INCLUDE_PATH_PAINEL);
    }

    public static function carregarPagina()
    {
        if (isset($_GET['url'])) {
            $url = explode('/', $_GET['url']);
            if (file_exists('pages/' . $url[0] . '.php')) {
                include('pages/' . $url[0] . '.php');
            } else {
                //Pagina nao existe
                header('Location: ' . INCLUDE_PATH_PAINEL);
            }
        } else {

            include('pages/home.php');
        }
    }

    // LISTAR USUARIOS ONLINE
    public static function listarUsuariosOnline(){
        self::limparUsuariosOnline();
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.online`");
        $sql->execute();
        return $sql->fetchAll();
    }

    // TOTAL DE VISITAS AO SITE
    public static function listarVisitas(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas`");
        $sql->execute();
        return $sql->fetchAll();
    }

    // TOTAL DE VISITAS AO SITE HOJE
    public static function listarVisitasHoje(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.visitas` WHERE dia = ?");
        $sql->execute(array(date("Y-m-d")));
        return $sql->fetchAll();
    }

    // LISTAR USUARIOS PAINEL
    public static function listarUsuariosPainel(){
        $sql = MySql::conectar()->prepare("SELECT * FROM `tb_admin.usuarios`");
        $sql->execute();
        return $sql->fetchAll();
    }

    // lIMPAR USUARIOS INATIVOS 
    public static function limparUsuariosOnline(){
        $date = date('Y-m-d H:i:s');
        $sql = MySql::conectar()->exec("DELETE FROM  `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
    }

    // ALERTAS
    public static function alert($tipo,$mensagem){
        if($tipo == 'sucesso'){
            echo '<div class="box-alert sucesso"><i class="fa-solid fa-check"></i>'.$mensagem.'</div>';

        }else if($tipo == 'erro'){
            echo '<div class="box-alert erro"><i class="fa-solid fa-triangle-exclamation"></i>'.$mensagem.'</div>';
        }
    }

    // VERFICACAO DE IMAGEM PARA UPLOAD
    public static function imagemValida($imagem){
        if($imagem['type'] == 'image/jpeg' ||
            $imagem['type'] == 'image/jpg' ||
            $imagem['type'] == 'image/png'){

                // Verificacao de tamanho da imagem
                $tamanho = intval($imagem['size']/1024);
                if($tamanho < 300){
                    return true;
                }else{
                    return false;
                }

            }else{
                return false;
            }
    }

    // VERIFICAR QUALQUER TIPO DE ARQUIVO
    public static function uploadFile($file){
        // Indexar quando repete o mesmo nome
        $formatoArquivo = explode('.',$file['name']);
        $imagemNome = uniqid().'.'.$formatoArquivo[count($formatoArquivo) - 1];

        if(move_uploaded_file($file['tmp_name'],BASE_DIR_PAINEL.'/uploads/'.$imagemNome)){
            return $imagemNome;
        }else{
            return false;
        }
    }

    public static function deleteFile($file){
        @unlink('uploads/'.$file);
    }

    // ADICIONAR DADOS NO BD (tb_site.depoimentos)
    public static function insert($arr){
        $certo = true;
        $nome_tabela = $arr['nome_tabela'];
        $query = "INSERT INTO `$nome_tabela` VALUES (null";
        foreach ($arr as $key => $value){
            $nome = $key;
            $valor = $value;

            if($nome == 'acao' || $nome == 'nome_tabela'){
                continue;
            }

            if($value == ''){
                $certo = false;
                break;
            }
            $query.=",?";
            $parametros[] = $value;
        }

        $query.=")";

        if($certo == true){
            $sql = MySql::conectar()->prepare($query);
            $sql->execute($parametros);
        }

        return $certo;
    }

    // INSERIR NOVOS DADOS
    public static function update($arr){
        $certo = true;
        $first = false;
        $nome_tabela = $arr['nome_tabela'];
        $query = "UPDATE `$nome_tabela` SET ";
        foreach ($arr as $key => $value){
            $nome = $key;
            $valor = $value;

            if($nome == 'acao' || $nome == 'nome_tabela' || $nome == 'id'){
                continue;
            }

            if($value == ''){
                $certo = false;
                break;
            }
            if($first == false){
                $first = true;
                $query.="$nome=?";
            }else{
                $query.=",$nome=?";
            }
            $parametros[] = $value;
        }

        if($certo == true){
            $parametros[] = $arr['id'];
            $sql = MySql::conectar()->prepare($query.'WHERE id=?');
            $sql->execute($parametros);
        }

        return $certo;
    }

    // LISTAR TABELA E SISTEMA DE PAGINACAO
    public static function selectAll($tabela,$start = null,$end = null){

        if($start == null && $end == null){
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela`");
        }else{
            $sql = MySql::conectar()->prepare("SELECT * FROM `$tabela` LIMIT $start,$end");
        }
        $sql->execute();
        return $sql->fetchAll();
    }

    // SELECIOAR ALGO ESPECIFICO
    public static function select($table, $query, $arr){
        $sql = MySql::conectar()->prepare("SELECT * FROM `$table` WHERE $query");
        $sql->execute($arr);
        return $sql->fetch();
    }

    // DELETAR DEPOIMENTO
    public static function deletar($tabela, $id=false){
        if($id == false){
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela`");
        }else{
            $sql = MySql::conectar()->prepare("DELETE FROM `$tabela` WHERE id = $id");
        }
        $sql->execute();
    }

    // REDIRECIONAMENTO DE PAGINA
    public static function redirect($url){
        echo '<script>location.href="'.$url.'"</script>';
        die();
    }

}
