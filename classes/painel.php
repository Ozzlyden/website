<?php
class Painel
{

    public static function logado()
    {
        // VERIFICACAO DE LOGIN
        return isset($_SESSION['login']) ? true : false;   // $_SESSION armazena dados no navegador do usuario
    }

    public static function loggout()
    {
        // VERFICACAO DE LOGGOUT
        session_destroy(); // Destruir os dados da sessao
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

    // lIMPAR USUARIOS INATIVOS 
    public static function limparUsuariosOnline(){
        $date = date('Y-m-d H:i:s');
        $sql = MySql::conectar()->exec("DELETE FROM  `tb_admin.online` WHERE ultima_acao < '$date' - INTERVAL 1 MINUTE");
    }
}
