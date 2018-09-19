<?php 
@include 'app/api/config.php';    
$id = '';
$a = '';
if(base_url != '/'){
    $interna_dados = str_replace(base_url, '', $_SERVER['REQUEST_URI']);
}else{          
    $interna_dados = $_SERVER['REQUEST_URI'];
}
$paginaAcessada = explode('/',$interna_dados);   

if(count($paginaAcessada) > 1){
    if($paginaAcessada[1] != ''){ 
        $conteudo = '';                   
        $id = $paginaAcessada[1];
        $a = $paginaAcessada[0];
    }
}     

switch ($a) {
    case 'produtos':
        if($id != ''){
            $url = url_api . 'produto/' . $id . '/?authenticator=' . token;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $metablog = curl_exec($ch);
            curl_close($ch);
            $resultado = json_decode($metablog);
            foreach ($resultado as $ci) {
                ?> <h1>
                <?php echo $ci->titulo_projeto; ?>
            </h1>
            <article>
                <?php echo $ci->descricao_projeto; ?> 
            </article>
            <img src="<?php echo url_upload; ?>imagens_<?php echo hash_upload; ?>/<?php echo $ci->imagens[0]->nome_imagem; ?>"> 
            <?php
            }
        }
    break;
    case 'projetos':
        if($id != ''){
            $url = url_api . 'produto/' . $id . '/?authenticator=' . token;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $metablog = curl_exec($ch);
            curl_close($ch);
            $resultado = json_decode($metablog);
            foreach ($resultado as $ci) {
                ?> <h1>
                <?php echo $ci->nome_produto; ?>
            </h1>
            <article>
                <?php echo $ci->descricao_produto; ?> 
            </article>
            <img src="<?php echo url_upload; ?>imagens_<?php echo hash_upload; ?>/<?php echo $ci->imagens[0]->nome_imagem; ?>"> 
            <?php
            }
        }
    break;
    case 'blog':
        if($id != ''){
            $url = url_api . 'post/' . $id . '/?authenticator=' . token;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $metablog = curl_exec($ch);
            curl_close($ch);
            $resultado = json_decode($metablog);
            foreach ($resultado as $ci) {
                ?> <h1>
                <?php echo $ci->titulo_post; ?>
            </h1>
            <article>
                <?php echo $ci->descricao_post; ?> 
            </article>
            <img src="<?php echo url_upload; ?>imagens_<?php echo hash_upload; ?>/<?php echo $ci->imagens[0]->nome_imagem; ?>"> 
            <?php
            }
        }
    break;
    default:
    break;
}   
?>