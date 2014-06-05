<?php class L {
const title = 'Bolão XPert';
const welcome = 'Bem Vindo!';
const button_new = 'Novo';
const button_edit = 'Editar';
const button_save = 'Salvar';
const button_delete = 'Deletar';
const button_generate = 'Gerar';
const button_clear = 'Limpar';
const button_ok = 'Ok';
const button_close = 'Fechar';
const button_download = 'Download';
const menu_option_1 = 'Início';
const menu_option_2 = 'Games';
const menu_option_3 = 'Configuração';
const menu_option_4 = 'Servidor';
const menu_option_5 = 'Aplicativo';
const menu_option_6 = 'Descriptografia (beta)';
public static function __callStatic($string, $args) {
vprintf(constant("self::" . $string), $args);
}
}