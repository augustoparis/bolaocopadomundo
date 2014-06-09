<?php class L {
const title = 'Bolão XPert';
const welcome = 'Bem Vindo!';
const button_new = 'Novo';
const button_edit = 'Editar';
const button_save = 'Salvar';
const button_delete = 'Deletar';
const button_clear = 'Limpar';
const button_ok = 'Ok';
const button_close = 'Fechar';
const button_finalized_bets = 'Encerrar Apostas';
const button_finalized = 'Encerrar Bolão';
const checkbox_active = 'Ativo';
const menu_option_1 = 'Início';
const menu_option_2 = 'Usuários';
const menu_option_3 = 'Jogos';
const menu_option_4 = 'Apostas';
const login_username = 'Usuário';
const login_password = 'Senha';
const games_title = 'Cadastro de Jogos';
const games_team1 = 'Time 1';
const games_team2 = 'Time 2';
const games_value = 'Valor da Aposta';
const games_date = 'Data';
const games_hour = 'Hora';
const games_status = 'Status';
const games_result1 = 'Time 1';
const games_result2 = 'Time 2';
const bets_title = 'Cadastro de Apostas';
const bets_game = 'Selecione o Jogo';
const bets_result1 = 'Time 1';
const bets_result2 = 'Time 2';
const bets_value = 'Valor da Aposta';
public static function __callStatic($string, $args) {
vprintf(constant("self::" . $string), $args);
}
}