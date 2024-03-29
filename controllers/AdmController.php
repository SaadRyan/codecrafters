<?php
require_once 'models/AdmModel.php';


class AdmController {
    private $admModel;

    public function __construct($pdo) {
        $this->admModel = new AdmModel($pdo);
    }

    public function criarAdm($nome, $senha) {
        $this->admModel->criarAdm($nome, $senha);
    }

    public function listarAdms() {
        return $this->admModel->listarAdms();
    }

    public function exibirListaAdms() {
        $adms = $this->admModel->listarAdms();
        include 'views/adms/lista.php';
    }

    public function atualizarAdm ($id, $nome, $senha) {
        $this->admModel->atualizarAdm($id, $nome, $senha);
    }
    public function excluirAdm ($id) {
        $this->admModel->excluirAdm($id);
    }
}

    
?>