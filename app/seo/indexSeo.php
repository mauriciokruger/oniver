<?php 
error_reporting(0);
ini_set("display_errors", 0 );
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
$dominio = 'http://'.$_SERVER['HTTP_HOST'];
if($id != ''){
    switch ($a) {
        case 'produtos':
            $url = url_api . 'projeto/' . $id . '/?authenticator=' . token;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $metablog = curl_exec($ch);
            curl_close($ch);
            $resultado = json_decode($metablog);
            foreach ($resultado as $blogm) {
                ?>
                <title><?php echo $resposta[0]->titulo_config ?> - <?php echo $blogm->titulo_projeto; ?></title>
                <meta property="twitter:card" content="summary" />
                <meta property="twitter:site" content="<?php echo $resposta[0]->titulo_config ?>" />
                <meta property="twitter:title" content="<?php echo $blogm->titulo_projeto; ?>" />
                <meta property="twitter:description" content="<?php echo $blogm->lead_projeto; ?>" />
                <?php
                    $imagem = $blogm->imagens[0]->nome_imagem;
                ?>
                <meta property="twitter:image" content="<?php echo url_upload ?>imagens_<?php echo hash_upload; ?>/<?php echo $imagem; ?>" />
                <meta property="twitter:url" content="<?php echo $dominio; ?><?php echo base_url; ?><?php echo $a; ?>/<?php echo $blogm->slug_projeto; ?>" />
                <meta property="og:url" content="<?php echo $dominio; ?><?php echo base_url; ?><?php echo $a; ?>/<?php echo $blogm->slug_projeto; ?>" />
                <meta property="og:title" content="<?php echo $blogm->titulo_projeto; ?>" />
                <meta property="og:description" content="<?php echo $blogm->lead_projeto; ?>" />
                <meta property="og:image" content="<?php echo url_upload ?>imagens_<?php echo hash_upload; ?>/<?php echo $imagem; ?>" />
                <meta property="og:type" content="article" />
                <meta property="og:site_name" content="<?php echo $resposta[0]->titulo_config ?>" />
                <meta name="location" content="Concórdia, SC"/>
                <meta name="keywords" content="<?php echo $blogm->lead_projeto; ?>" />
                <meta name="Distribution" content="Global"/>
                <meta name="description" content="<?php echo $blogm->lead_projeto; ?>"/>
                <?php
            }
        break;
        case 'projetos':
            $url = url_api . 'produto/' . $id . '/?authenticator=' . token;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $metablog = curl_exec($ch);
            curl_close($ch);
            $resultado = json_decode($metablog);
            foreach ($resultado as $blogm) {
                ?>
                <title><?php echo $resposta[0]->titulo_config ?> - <?php echo $blogm->nome_produto; ?></title>
                <meta property="twitter:card" content="summary" />
                <meta property="twitter:site" content="<?php echo $resposta[0]->titulo_config ?>" />
                <meta property="twitter:title" content="<?php echo $blogm->nome_produto; ?>" />
                <meta property="twitter:description" content="<?php echo $blogm->lead_produto; ?>" />
                <?php
                    $imagem = $blogm->imagens[0]->nome_imagem;
                ?>
                <meta property="twitter:image" content="<?php echo url_upload ?>imagens_<?php echo hash_upload; ?>/<?php echo $imagem; ?>" />
                <meta property="twitter:url" content="<?php echo $dominio; ?><?php echo base_url; ?><?php echo $a; ?>/<?php echo $blogm->slug_produto; ?>" />
                <meta property="og:url" content="<?php echo $dominio; ?><?php echo base_url; ?><?php echo $a; ?>/<?php echo $blogm->slug_produto; ?>" />
                <meta property="og:title" content="<?php echo $blogm->nome_produto; ?>" />
                <meta property="og:description" content="<?php echo $blogm->lead_produto; ?>" />
                <meta property="og:image" content="<?php echo url_upload ?>imagens_<?php echo hash_upload; ?>/<?php echo $imagem; ?>" />
                <meta property="og:type" content="article" />
                <meta property="og:site_name" content="<?php echo $resposta[0]->titulo_config ?>" />
                <meta name="location" content="Concórdia, SC"/>
                <meta name="keywords" content="<?php echo $blogm->lead_produto; ?>" />
                <meta name="Distribution" content="Global"/>
                <meta name="description" content="<?php echo $blogm->lead_produto; ?>"/>
                <?php
            }
        break;
        case 'blog':
            $url = url_api . 'post/' . $id . '/?authenticator=' . token;
            $ch = curl_init($url);
            curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "GET");
            curl_setopt($ch, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4);
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            $metablog = curl_exec($ch);
            curl_close($ch);
            $resultado = json_decode($metablog);
            foreach ($resultado as $blogm) {
                ?>
                <title><?php echo $resposta[0]->titulo_config ?> - <?php echo $blogm->titulo_post; ?></title>
                <meta property="twitter:card" content="summary" />
                <meta property="twitter:site" content="<?php echo $resposta[0]->titulo_config ?>" />
                <meta property="twitter:title" content="<?php echo $blogm->titulo_post; ?>" />
                <meta property="twitter:description" content="<?php echo $blogm->lead_post; ?>" />
                <?php
                    $imagem = $blogm->imagens[0]->nome_imagem;
                ?>
                <meta property="twitter:image" content="<?php echo url_upload ?>imagens_<?php echo hash_upload; ?>/<?php echo $imagem; ?>" />
                <meta property="twitter:url" content="<?php echo $dominio; ?><?php echo base_url; ?><?php echo $a; ?>/<?php echo $blogm->slug_post; ?>" />
                <meta property="og:url" content="<?php echo $dominio; ?><?php echo base_url; ?><?php echo $a; ?>/<?php echo $blogm->slug_post; ?>" />
                <meta property="og:title" content="<?php echo $blogm->titulo_post; ?>" />
                <meta property="og:description" content="<?php echo $blogm->lead_post; ?>" />
                <meta property="og:image" content="<?php echo url_upload ?>imagens_<?php echo hash_upload; ?>/<?php echo $imagem; ?>" />
                <meta property="og:type" content="article" />
                <meta property="og:site_name" content="<?php echo $resposta[0]->titulo_config ?>" />
                <meta name="location" content="Concórdia, SC"/>
                <meta name="keywords" content="<?php echo $blogm->lead_post; ?>" />
                <meta name="Distribution" content="Global"/>
                <meta name="description" content="<?php echo $blogm->lead_post; ?>"/>
                <?php
            }
        break;
    default:
    ?>
<title><?php echo $resposta[0]->titulo_config ?></title>
<meta name="keywords" content="<?php echo $resposta[0]->keywords_config ?>" />
<meta name="description" content="<?php echo $resposta[0]->description_config ?>"/>
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="article"/>
<meta property="og:title" content="<?php echo $resposta[0]->titulo_config ?>">
<meta property="og:site_name" content="<?php echo $resposta[0]->titulo_config ?>"/>
<meta property="og:description" content="<?php echo $resposta[0]->description_config ?>"/>
<meta property="og:image" content="<?php echo $dominio; ?><?php echo base_url; ?>midia/logo_topo.png"/>  
        <?php
        break;
    }   
}else{
    ?>
    <title><?php echo $resposta[0]->titulo_config ?></title>
<meta name="keywords" content="<?php echo $resposta[0]->keywords_config ?>" />
<meta name="description" content="<?php echo $resposta[0]->description_config ?>"/>
<meta property="og:locale" content="pt_BR">
<meta property="og:type" content="article"/>
<meta property="og:title" content="<?php echo $resposta[0]->titulo_config ?>">
<meta property="og:site_name" content="<?php echo $resposta[0]->titulo_config ?>"/>
<meta property="og:description" content="<?php echo $resposta[0]->description_config ?>"/>
<meta property="og:image" content="<?php echo $dominio; ?><?php echo base_url; ?>midia/logo_topo.png"/>  
<?php
}
?>