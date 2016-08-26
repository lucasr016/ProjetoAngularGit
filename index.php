<!DOCTYPE html>
<html ng-app="loja">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <link rel="stylesheet" href="css/w3.css">
    <link rel="stylesheet" href="css/custom.css">

    <title>Carros Importados</title>

</head>

<body>

    <!-- cabecalho -->
    <header class="w3-container w3-indigo">
        <p class="w3-xxlarge">Carros importados</p>
    </header>
    <!-- /cabecalho -->

    <!-- principal -->
    <div class="w3-container w3-myfont">
      <div ng-controller="LojaControle as loja">

        <!-- listagem de produtos -->
        <div ng-repeat="produto in loja.produtos | orderBy:'preco' " style="width:100%; margin-top:5%">

          <!-- dados dos produtos -->
          <div class="w3-container w3-card-12">
            <img ng-src="img\{{produto.imagem}}" alt="Norway" style="width:100%; padding:5%;">
            <div class="w3-container w3-center">
              <produto-titulo>
              <!--<h1>{{produto.nome}}</h1>
              <h2>R$ {{produto.preco}}</h2>-->
              <!--<em class="pull-right">{{produto.descricao}}</em><br><br>-->
              <button ng-show="produto.podecomprar">Adicionar ao carrinho</button><br><br>
            </div>
            <!-- dados dos produtos -->

            <!-- abas do produto -->
            <div ng-controller="PainelProdutoCtrl as painel">

              <section>
                <ul class="w3-navbar">
                  <li ng-class="{ 'w3-blue':painel.isSet(1)}">
                    <a href ng-click="painel.setTab(1)" class="w3-hover-blue">Descrição</a>
                  </li>
                  <li ng-class="{ 'w3-blue':painel.isSet(2)}">
                    <a href ng-click="painel.setTab(2)" class="w3-hover-blue">Especificações</a>
                  </li>
                  <li ng-class="{ 'w3-blue':painel.isSet(3)}">
                    <a href ng-click="painel.setTab(3)" class="w3-hover-blue">Revisões</a>
                  </li>
                </ul>
              </section>
              <!--  abas do produto -->

              <!-- conteudo das abas do produto -->

              <!-- descricao -->
              <div class="w3-panel w3-leftbar w3-light-grey w3-border-blue" ng-show="painel.isSet(1)">
                <h4>Descrição</h4>
                <p>{{produto.descricao}}</p>
              </div>
              <!-- descricao -->

              <!-- especificacoes -->
              <div class="w3-panel w3-leftbar w3-light-grey w3-border-blue" ng-show="painel.isSet(2)">
                <h4>Especificações</h4>
                <blockquote>{{produto.especificacao}}</blockquote>
              </div>
              <!-- especificacoes -->

              <!-- revisoes -->
              <div class="w3-panel w3-leftbar w3-light-grey w3-border-blue" ng-show="painel.isSet(3)">
                <h4>Avaliações</h4>
                <blockquote ng-repeat="avaliacao in produto.avaliacoes" ng-show="produto.avaliacoes.length">
                  <b>Estrelas: {{avaliacao.estrelas}}</b>
                  {{avaliacao.comentario}}
                  <cite>Por: {{avaliacao.autor}}</cite>
                </blockquote>

                <form name="avaliacaoForm" class="w3-container w3-border-blue" style="width:100%;" ng-controller="AvaliacaoControle as AvaliacaoCtrl"
                                                                                                   ng-submit="avaliacaoForm.$valid && AvaliacaoCtrl.addRevisao(produto)"
                                                                                                   novalidate>

                  <blockquote>
                    <b>Estrelas: {{AvaliacaoCtrl.avaliacao.estrelas}}</b>
                    {{AvaliacaoCtrl.avaliacao.comentario}}
                    <cite>Por: {{AvaliacaoCtrl.avaliacao.autor}}</cite>
                  </blockquote>

                  <label class="w3-label w3-text-grey">Estrela(s):</label>
                  <select class="w3-select ng-dirty ng-invalid" ng-model="AvaliacaoCtrl.avaliacao.estrelas" required>
                    <option value="1">1 Estrela</option>
                    <option value="2">2 Estrelas</option>
                    <option value="3">3 Estrelas</option>
                    <option value="4">4 Estrelas</option>
                    <option value="5">5 Estrelas</option>
                  </select></br></br>

                  <label class="w3-label w3-text-grey">Comentário:</label>
                  <textarea class="w3-input  ng-dirty ng-invalid" ng-model="AvaliacaoCtrl.avaliacao.comentario" required></textarea></br>

                  <label class="w3-label w3-text-grey">Por:</label>
                  <input class="w3-input  ng-dirty ng-invalid" type="email"  placeholder="Autor..."  ng-model="AvaliacaoCtrl.avaliacao.autor" required /></br>

                  <input type="submit" value="Avaliar" class="w3-btn w3-blue"/></br></br>

                </form>
              </div>
              <!-- revisoes -->

            </div>
            <!-- conteudo das abas do produto -->
          </div>
        </div>
        <!-- listagem de produtos -->

      </div>
    </div><br>
    <!-- /principal -->

    <!-- rodape -->
    <footer class="w3-container w3-indigo w3-text-white-opacity">
        <h6>Developed by Lucas Rodrigues</h6>
    </footer>
    <!-- /rodape -->

    <script type="text/javascript" src="js/angular.js"></script>
    <script type="text/javascript" src="js/app.js"></script>
</body>

</html>
