<?php
use Dompdf\Dompdf;

require 'vendor/autoload.php';

$data = $_POST['data'];
$meses=array(
				'01' => "Janeiro",
				'02' => "Fevereiro",
				'03' => "Março",
				'04' => "Abril",
				'05' => "Maio",
				'06' => "Junho",
				'07' => "Julho",
				'08' => "Agosto",
				'09' => "Setembro",
				'10' => "Outubro",
				'11' => "Novembro",
				'12' => "Dezembro"
);

if(isset($_POST['sspEst']) && $_POST['sspEst']!='' && $_POST['sspEst']!='OUTROS'){
    $tipoSSP =  $_POST['sspEst'];
}elseif (isset($_POST['sspEst']) && $_POST['sspEst']!='' && $_POST['sspEst']=='OUTROS') {
    $tipoSSP = '';
}

$documento = isset($tipoSSP) ? $_POST['ssp'].' '.$tipoSSP : $_POST['rg'];

$tmp = sys_get_temp_dir();

$dompdf = new Dompdf([
    'logOutputFile' => '',
    // authorize DomPdf to download fonts and other Internet assets
    'isRemoteEnabled' => true,
    // all directories must exist and not end with /
    'fontDir' => $tmp,
    'fontCache' => $tmp,
    'tempDir' => $tmp,
    'chroot' => $tmp,
]);
if(isset($_POST['clinica']) && $_POST['clinica']!=''){
    $arq = '<!DOCTYPE html>
    <html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
        <style>
        h1,h2,h3 {        
            font-family: \'PT Serif\', serif;
            font-weight: 700;
        }
        p {
            text-align: justify;         
            font-family: \'PT Serif\', serif;
            font-weight: 400;
        }
        h1,h2{
            text-align: center;
        }
        h3{
            padding-top: 0.5em;
        }
        div {
            display: block;margin: 5em;
        }
        .especs{
            list-style: none;
            margin-bottom: 4em;
        }
        .especs p{
            margin:0;
        }
        .clas-terceira{
            list-style-type: upper-roman;
        }
        .div-data{
            margin: 0;
        }
        .p-data{
            text-align: center;
        }
        .ass {
            margin: 7.6em;
        }
        .ass p{
            font-family: \'PT Serif\', serif;
            font-weight: 700;
            text-align: center;
        }
        .content{
            margin-top: 2em;
            margin-bottom: 2em;
        }
        .c-sexta{
            margin:0;
            margin-top:9.8em;
        }

        </style>
    </head>
    <body>
        <h2>CONTRATO DE COMODATO</h2>
        <div class="content">
            <p>Por este instrumento particular, as <strong>Partes</strong>, de um lado, <strong>LEVE SAÚDE CLÍNICA MÉDICA LTDA.</strong>, inscrita no CNPJ sob o número 29.112. 790/0001-89, com sede na Rua Engenheiro Enaldo Cravo Peixoto, n°. 215, Loja B – Tijuca, Rio de Janeiro, RJ, doravante denominada <strong>COMODANTE</strong>, e do outro '.$_POST['nome'].' '.$_POST['sobrenome'].', portador (a) do de identidade nº. '.$documento.' e CPF nº '.$_POST['cpf'].', doravante denominado (a) <strong>COMODATÁRIO (A).</strong></p>
            <ul>
            <li><p>Considerando que o (a) <strong>COMODATÁRIO (A)</strong> é colaborador (a) da empresa <strong>COMODANTE;</strong></p></li>
            <li><p>Considerando que para viabilização do contrato acima referido a <strong>COMODANTE</strong> adquiriu Notebook e acessórios, resolvem celebrar o presente contrato, mediante as seguintes cláusulas e condições, que deverá ser observada e cumprida integralmente pelas partes.</p></li>
            </ul>
            <h3><strong><u>CLÁUSULA PRIMEIRA  -  OBJETO</u></strong></h3>
            <p>Este Contrato tem como objetivo a cessão, em regime de comodato, por parte da <strong>COMODANTE</strong> ao(a) <strong>COMODATÁRIO(A)</strong>, do NOTEBOOK '.$_POST['marcmodel'].' e seus acessórios (“Notebook”), descrito abaixo, cuja entrega ocorre no ato de assinatura deste Contrato.</p>
            <ul class="especs">
            <li><p><strong>Modelo:</strong> '.$_POST['modelo'].'</p></li>
            <li><p><strong>Nº SÉRIE: </strong>'.$_POST['serie'].'</p></li>
            <li><p><strong>Nº PATRIMÔNIO: </strong>'.$_POST['pat'].'</p></li>
            </ul>
            <h3><strong><u>CLÁUSULA SEGUNDA  -  PRAZO</u></strong></h3>
            <p>Este Contrato vigorará por tempo indeterminado, contado de sua assinatura, enquanto o (a) <strong>COMODATÁRIO (A)</strong> for colaborador (a) da <strong>COMODANTE</strong>, podendo ser denunciado, a qualquer tempo, por qualquer das partes, que deverá se manifestar por escrito, com antecedência mínima de 02 (dois) dias.</p>
            <p><u>Parágrafo Único</u> – Uma vez comunicada a rescisão do Contrato, o (a) <strong>COMODATÁRIO (A)</strong> se obriga a cessar de imediato, a utilização do Notebook, e na entrega, fazê-lo juntamente com seus acessórios.</p>
            <h3><strong><u>CLÁUSULA TERCEIRA  -  OBRIGAÇÕES DO COMODATÁRIO(A)</u></strong></h3>
            <p>Este Contrato tem como objetivo a cessão, em regime de comodato, por parte da <strong>COMODANTE</strong> ao(a) <strong>COMODATÁRIO(A)</strong>, do NOTEBOOK [Marca e Modelo] e seus acessórios (“Notebook”), descrito abaixo, cuja entrega ocorre no ato de assinatura deste Contrato.</p>
            <ol class="clas-terceira">
            <li><p>Devolver o Notebook e os acessórios nas mesmas condições em que os recebeu, ressalvado o desgaste natural, decorrente do uso normal e regular;</p></li>
            <li><p>Zelar pela integridade do Notebook e seus acessórios, identificados na cláusula primeira deste contrato, mantendo-os sob sua responsabilidade, e em perfeitas condições de funcionamento;</p></li>
            <li><p>Arcar com as despesas necessárias ao reparo do Notebook e/ou de seus acessórios, bem como eventuais reposições no caso de ocorrência de danos, provenientes do mau uso do Notebook, e/ou de seus acessórios, pelo (a) <strong>COMODATÁRIO (A)</strong>;</p></li>
            <li><p>Informar, imediatamente, à <strong>COMODANTE</strong> os casos de defeitos do Notebook e/ou acessórios, para que esta adote as medidas pertinentes;</p></li>
            <li><p>Comunicar, imediatamente, à <strong>COMODANTE</strong> os casos de extravio, furto ou roubo do Notebook e/ou acessórios, além de apresentar Boletim de Ocorrência Policial, no prazo de 24 (vinte e quatro) horas, para que a <strong>COMODANTE</strong> acione o seguro do equipamento;</p></li>
            <li><p>Devolver o Notebook e seus acessórios cedidos em comodato durante os períodos de férias e licenças, iguais ou superiores a 20 (vinte) dias, diretamente no setor de TI da <strong>COMODANTE</strong>;</p></li>
            </ol>
            <h3><strong><u>CLÁUSULA QUARTA  -  OBRIGAÇÕES DA COMODANTE</u></strong></h3>
            <p>Entregar ao(à) <strong>COMODATÁRIO(A)</strong> o Notebook, assim como o(s) acessório(s), em perfeito estado de uso e funcionamento.</p>
            <h3><b><u>CLÁUSULA QUINTA – DO RESSARCIMENTO EM CASO DE PERDA OU EXTRAVIO</u></b></h3>
            <p>O <strong>COMODATÁRIO(A)</strong> reconhece que a perda ou extravio do Notebook e seus acessórios ensejará o ressarcimento à <strong>COMODANTE</strong>, de 100% do preço de compra do equipamento.</p>
            <div class="c-sexta">
                <h3><strong><u>CLÁUSULA SEXTA  -  RESCISÃO</u></strong></h3>
                <p>A inobservância ou inadimplemento de qualquer das cláusulas ou condições deste Contrato, por parte do(a) <strong>COMODATÁRIO(A)</strong>, implicará em sua imediata rescisão, com a consequente devolução do Notebook, objeto do presente, sem prejuízo da cobrança de eventuais perdas e danos, por parte da <strong>COMODANTE</strong>.</p>
            </div>
            <h3><strong><u>CLÁUSULA SÉTIMA - NOVAÇÃO</u></strong></h3>
            <p>A tolerância por parte da <strong>COMODANTE</strong> ao descumprimento das obrigações contratuais pelo (a) <strong>COMODATÁRIO(A)</strong>, não importará renúncia ou novação dos direitos e não afetará o subsequente exercício de tal direito.</p>
            <h3><strong><u>CLÁUSULA OITAVA – DO USO ESPECÍFICO PARA O EXERCÍCIO DE SUAS FUNÇÕES</u></strong></h3>
            <p>O (A) <strong>COMODATÁRIO (A)</strong> tem conhecimento que o Notebook ora cedido é para uso exclusivo no exercício de suas funções, concordando que todas as despesas relativas aos danos causados ao equipamento, decorrentes da má utilização, poderão ser cobradas em sua integralidade.</p>
            <p>O (A) <strong>COMODATÁRIO (A)</strong> só deverá transportar o Notebook, para ambiente externo à Leve, quando demandado pelo seu gestor imediato, mediante solicitação expressa;</p>
            <p>Nas ocasiões em que o (a) <strong>COMODATÁRIO (A)</strong> desejar transportar o Notebook, para ambiente externo à Leve, sem demanda para a Leve, assume total responsabilidade sobre o bem comodatado.</p>
            <p><u>Parágrafo Único</u> – O Notebook será de uso exclusivo do (a) COMODATÁRIO (A), não devendo ceder a qualquer outra pessoa, ainda que familiar.</p>
            <h3><strong><u>CLÁUSULA NONA - DISPOSIÇÕES GERAIS</u></strong></h3>
            <p>O (A) <strong>COMODATÁRIO(A)</strong> reconhece e concorda que não se aplica o disposto no artigo 581 do Código Civil Brasileiro (L10.406/2002), tendo a <strong>COMODANTE</strong> a discricionariedade de rescindir este Contrato a qualquer momento.</p>
            <h3><strong><u>CLÁUSULA DÉCIMA - FORO</u></strong></h3>
            <p>As partes contratantes elegem como competente para qualquer ação decorrente deste Contrato, o Foro da Comarca Central da Capital do Estado do Rio de Janeiro, com exclusão de qualquer outro, por mais privilegiado que seja.</p>
            <p>E, por estarem assim justas e acordadas, firmam o presente, em 02 (duas) vias de igual teor e forma, para um só efeito, na presença de testemunhas abaixo assinaladas.</p>   
        </div>
        <div class="div-data">
            <p class="p-data">Rio de Janeiro, '.$data[8].$data[9].' de '.$meses[$data[5].$data[6]].' de '.$data[0].$data[1].$data[2].$data[3].'.</p>
        </div>
        <div class="ass">
            <p>LEVE SAÚDE OPERADORA DE PLANOS DE SAÚDE S.A.</br>COMODANTE</p>
        </div>
        <div class="ass">
            <p>COMODATÁRIO (A)</p>
        </div>
    </body>
    </html>
    ';
    $dompdf->loadHtml($arq);
    //$dompdf->loadHtml($html); //load an html

    $dompdf->render();

    $dompdf->stream('Contrato de Comodato Leve Saúde Operadora NOTEBOOK - '.$_POST['nome'].' '.$_POST['sobrenome'].'.pdf', [
        'compress' => true,
        'Attachment' => false,
    ]);

}else{
$arq = '<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=PT+Serif:wght@400;700&display=swap" rel="stylesheet">
    <style>
    h1,h2,h3 {        
        font-family: \'PT Serif\', serif;
        font-weight: 700;
    }
    p {
        text-align: justify;         
        font-family: \'PT Serif\', serif;
        font-weight: 400;
    }
    h1,h2{
        text-align: center;
    }
    h3{
        padding-top: 0.5em;
    }
    div {
        display: block;margin: 5em;
    }
    .especs{
        list-style: none;
        margin-bottom: 4em;
    }
    .especs p{
        margin:0;
    }
    .clas-terceira{
        list-style-type: upper-roman;
    }
    .div-data{
        margin: 0;
    }
    .p-data{
        text-align: center;
    }
    .ass {
        margin: 7.6em;
    }
    .ass p{
        font-family: \'PT Serif\', serif;
        font-weight: 700;
        text-align: center;
    }
    .content{
        margin-top: 2em;
        margin-bottom: 2em;
    }
    .c-sexta{
        margin:0;
        margin-top:9.8em;
    }

    </style>
</head>
<body>
    <h2>CONTRATO DE COMODATO</h2>
    <div class="content">
        <p>Por este instrumento particular, as <strong>Partes</strong>, de um lado, <strong>LEVE SAÚDE OPERADORA DE PLANOS DE SAÚDE S.A.</strong>, inscrita no CNPJ sob o número 36.503.186/0001-49, com sede na Rua Engenheiro Enaldo Cravo Peixoto, n°. 215, Loja B – Tijuca, Rio de Janeiro, RJ, doravante denominada <strong>COMODANTE</strong>, e do outro '.$_POST['nome'].' '.$_POST['sobrenome'].', portador (a) do de identidade nº. '.$documento.' e CPF nº '.$_POST['cpf'].', doravante denominado (a) <strong>COMODATÁRIO (A).</strong></p>
        <ul>
          <li><p>Considerando que o (a) <strong>COMODATÁRIO (A)</strong> é colaborador (a) da empresa <strong>COMODANTE;</strong></p></li>
          <li><p>Considerando que para viabilização do contrato acima referido a <strong>COMODANTE</strong> adquiriu Notebook e acessórios, resolvem celebrar o presente contrato, mediante as seguintes cláusulas e condições, que deverá ser observada e cumprida integralmente pelas partes.</p></li>
        </ul>
        <h3><strong><u>CLÁUSULA PRIMEIRA  -  OBJETO</u></strong></h3>
        <p>Este Contrato tem como objetivo a cessão, em regime de comodato, por parte da <strong>COMODANTE</strong> ao(a) <strong>COMODATÁRIO(A)</strong>, do NOTEBOOK '.$_POST['marcmodel'].' e seus acessórios (“Notebook”), descrito abaixo, cuja entrega ocorre no ato de assinatura deste Contrato.</p>
        <ul class="especs">
          <li><p><strong>Modelo:</strong> '.$_POST['modelo'].'</p></li>
          <li><p><strong>Nº SÉRIE: </strong>'.$_POST['serie'].'</p></li>
          <li><p><strong>Nº PATRIMÔNIO: </strong>'.$_POST['pat'].'</p></li>
        </ul>
        <h3><strong><u>CLÁUSULA SEGUNDA  -  PRAZO</u></strong></h3>
        <p>Este Contrato vigorará por tempo indeterminado, contado de sua assinatura, enquanto o (a) <strong>COMODATÁRIO (A)</strong> for colaborador (a) da <strong>COMODANTE</strong>, podendo ser denunciado, a qualquer tempo, por qualquer das partes, que deverá se manifestar por escrito, com antecedência mínima de 02 (dois) dias.</p>
        <p><u>Parágrafo Único</u> – Uma vez comunicada a rescisão do Contrato, o (a) <strong>COMODATÁRIO (A)</strong> se obriga a cessar de imediato, a utilização do Notebook, e na entrega, fazê-lo juntamente com seus acessórios.</p>
        <h3><strong><u>CLÁUSULA TERCEIRA  -  OBRIGAÇÕES DO COMODATÁRIO(A)</u></strong></h3>
        <p>Este Contrato tem como objetivo a cessão, em regime de comodato, por parte da <strong>COMODANTE</strong> ao(a) <strong>COMODATÁRIO(A)</strong>, do NOTEBOOK [Marca e Modelo] e seus acessórios (“Notebook”), descrito abaixo, cuja entrega ocorre no ato de assinatura deste Contrato.</p>
        <ol class="clas-terceira">
          <li><p>Devolver o Notebook e os acessórios nas mesmas condições em que os recebeu, ressalvado o desgaste natural, decorrente do uso normal e regular;</p></li>
          <li><p>Zelar pela integridade do Notebook e seus acessórios, identificados na cláusula primeira deste contrato, mantendo-os sob sua responsabilidade, e em perfeitas condições de funcionamento;</p></li>
          <li><p>Arcar com as despesas necessárias ao reparo do Notebook e/ou de seus acessórios, bem como eventuais reposições no caso de ocorrência de danos, provenientes do mau uso do Notebook, e/ou de seus acessórios, pelo (a) <strong>COMODATÁRIO (A)</strong>;</p></li>
          <li><p>Informar, imediatamente, à <strong>COMODANTE</strong> os casos de defeitos do Notebook e/ou acessórios, para que esta adote as medidas pertinentes;</p></li>
          <li><p>Comunicar, imediatamente, à <strong>COMODANTE</strong> os casos de extravio, furto ou roubo do Notebook e/ou acessórios, além de apresentar Boletim de Ocorrência Policial, no prazo de 24 (vinte e quatro) horas, para que a <strong>COMODANTE</strong> acione o seguro do equipamento;</p></li>
          <li><p>Devolver o Notebook e seus acessórios cedidos em comodato durante os períodos de férias e licenças, iguais ou superiores a 20 (vinte) dias, diretamente no setor de TI da <strong>COMODANTE</strong>;</p></li>
        </ol>
        <h3><strong><u>CLÁUSULA QUARTA  -  OBRIGAÇÕES DA COMODANTE</u></strong></h3>
        <p>Entregar ao(à) <strong>COMODATÁRIO(A)</strong> o Notebook, assim como o(s) acessório(s), em perfeito estado de uso e funcionamento.</p>
        <h3><b><u>CLÁUSULA QUINTA – DO RESSARCIMENTO EM CASO DE PERDA OU EXTRAVIO</u></b></h3>
        <p>O <strong>COMODATÁRIO(A)</strong> reconhece que a perda ou extravio do Notebook e seus acessórios ensejará o ressarcimento à <strong>COMODANTE</strong>, de 100% do preço de compra do equipamento.</p>
        <div class="c-sexta">
            <h3><strong><u>CLÁUSULA SEXTA  -  RESCISÃO</u></strong></h3>
            <p>A inobservância ou inadimplemento de qualquer das cláusulas ou condições deste Contrato, por parte do(a) <strong>COMODATÁRIO(A)</strong>, implicará em sua imediata rescisão, com a consequente devolução do Notebook, objeto do presente, sem prejuízo da cobrança de eventuais perdas e danos, por parte da <strong>COMODANTE</strong>.</p>
        </div>
        <h3><strong><u>CLÁUSULA SÉTIMA - NOVAÇÃO</u></strong></h3>
        <p>A tolerância por parte da <strong>COMODANTE</strong> ao descumprimento das obrigações contratuais pelo (a) <strong>COMODATÁRIO(A)</strong>, não importará renúncia ou novação dos direitos e não afetará o subsequente exercício de tal direito.</p>
        <h3><strong><u>CLÁUSULA OITAVA – DO USO ESPECÍFICO PARA O EXERCÍCIO DE SUAS FUNÇÕES</u></strong></h3>
        <p>O (A) <strong>COMODATÁRIO (A)</strong> tem conhecimento que o Notebook ora cedido é para uso exclusivo no exercício de suas funções, concordando que todas as despesas relativas aos danos causados ao equipamento, decorrentes da má utilização, poderão ser cobradas em sua integralidade.</p>
        <p>O (A) <strong>COMODATÁRIO (A)</strong> só deverá transportar o Notebook, para ambiente externo à Leve, quando demandado pelo seu gestor imediato, mediante solicitação expressa;</p>
        <p>Nas ocasiões em que o (a) <strong>COMODATÁRIO (A)</strong> desejar transportar o Notebook, para ambiente externo à Leve, sem demanda para a Leve, assume total responsabilidade sobre o bem comodatado.</p>
        <p><u>Parágrafo Único</u> – O Notebook será de uso exclusivo do (a) COMODATÁRIO (A), não devendo ceder a qualquer outra pessoa, ainda que familiar.</p>
        <h3><strong><u>CLÁUSULA NONA - DISPOSIÇÕES GERAIS</u></strong></h3>
        <p>O (A) <strong>COMODATÁRIO(A)</strong> reconhece e concorda que não se aplica o disposto no artigo 581 do Código Civil Brasileiro (L10.406/2002), tendo a <strong>COMODANTE</strong> a discricionariedade de rescindir este Contrato a qualquer momento.</p>
        <h3><strong><u>CLÁUSULA DÉCIMA - FORO</u></strong></h3>
        <p>As partes contratantes elegem como competente para qualquer ação decorrente deste Contrato, o Foro da Comarca Central da Capital do Estado do Rio de Janeiro, com exclusão de qualquer outro, por mais privilegiado que seja.</p>
        <p>E, por estarem assim justas e acordadas, firmam o presente, em 02 (duas) vias de igual teor e forma, para um só efeito, na presença de testemunhas abaixo assinaladas.</p>   
    </div>
    <div class="div-data">
        <p class="p-data">Rio de Janeiro, '.$data[8].$data[9].' de '.$meses[$data[5].$data[6]].' de '.$data[0].$data[1].$data[2].$data[3].'.</p>
    </div>
    <div class="ass">
        <p>LEVE SAÚDE OPERADORA DE PLANOS DE SAÚDE S.A.</br>COMODANTE</p>
    </div>
    <div class="ass">
        <p>COMODATÁRIO (A)</p>
    </div>
</body>
</html>
';
$dompdf->loadHtml($arq);
//$dompdf->loadHtml($html); //load an html

$dompdf->render();

$dompdf->stream('Contrato de Comodato Leve Saúde Operadora NOTEBOOK - '.$_POST['nome'].' '.$_POST['sobrenome'].'.pdf', [
    'compress' => true,
    'Attachment' => false,
]);
}