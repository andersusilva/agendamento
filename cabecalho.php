<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Agendamento de Salas - UDF</title>
    <link rel="icon" href="favicon.ico">

    <!-- Bootstrap core CSS -->
    <link href="view/css/bootstrap.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap theme -->
    <link href="view/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css">
    <!-- Bootstrap custom -->
    <link href="view/css/bootstrap-custom.css" rel="stylesheet" type="text/css">
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="view/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <script type="text/javascript" src="view/js/jquery-1.12.3.min.js"></script>
    <script type="text/javascript" src="view/js/bootstrap.min.js"></script>
    
</head>
<!-- Modal -->
<div class="modal fade" id="modalLoading" tabindex="-1" role="dialog" aria-labelledby="modalLoadingLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="modalLoadingLabel">Carregando</h4>
            </div>
            <div class="modal-body">
                Aguardo enquanto as informações são geradas.
            </div>
            <div class="modal-footer"></div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->
<!-- Modal -->
<div class="modal fade" id="modalError" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" data-backdrop="static" data-keyboard="false">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header modal-header-danger">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <h4 class="modal-title" id="myModalLabel">Erro</h4>
            </div>
            <div class="modal-body">
                Por favor tente novamente mais tarde.
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Fechar</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->