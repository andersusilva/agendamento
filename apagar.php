<?php
session_start();
include('languages/padrao.inc.php');
?>
<HTML>
<HEAD>

	<TITLE><?php echo $L_TITULO; ?></TITLE>

	<LINK href="img/main.css" type=text/css rel=stylesheet>
	<SCRIPT language=Javascript src="img/jsfunctions.js" type=text/javascript></SCRIPT>

</HEAD>

<BODY bgColor=white leftMargin="0" topMargin="0" marginheight="0" marginwidth="0">

	<br>

	<!-- INICIO -->

      <TABLE cellSpacing=0 cellPadding=0 width=600 border=0>
        <TBODY>
        <TR>
          <TD>
            <IMG height=34 alt="" src="img/logo2.png" width=315><BR>
          </TD>
          <TD align=right width="100%" background="img/bg15.gif">
	    <IMG height=34 alt="" src="img/tr7.gif" width=136><BR>
          </TD>
        </TR>
        </TBODY>
      </TABLE>

	<!-- /INICIO -->

	<!-- MEIO -->

      <TABLE cellSpacing=0 cellPadding=0 width=600 border=0>
        <TBODY>
        <TR vAlign=top>
          <TD background="img/bg17.gif">
            <IMG height=1 alt="" src="img/spacer.gif" width=37><BR>
          </TD>
          <TD align=middle width="100%" background="img/bg38.gif">
            <IMG height=7 src="img/spacer.gif" width=1><BR>

	<!-- CONTEÚDO -->


		<?php
				include('apagar2.php');
		?>


	<!-- /CONTEÚDO -->

 	    <IMG height=7 src="img/spacer.gif" width=1>
          </TD>
          <TD background="img/bg18.gif"><IMG height=66 alt="" src="img/tr10.gif" width=37>
            <BR>
          </TD>
        </TR>
        </TBODY>
      </TABLE>

	<!-- /MEIO -->

	<!-- FIM -->

      <TABLE cellSpacing=0 cellPadding=0 width=600 border=0>
        <TBODY>
        <TR>
          <TD><IMG height=35 src="img/tr8.gif" width=37><BR></TD>
          <TD align=right width="100%" background="img/bg16.gif"><IMG height=35 alt="" src="img/tr9.gif" width=37 border=0><BR></TD>
        </TR>
        </TBODY>
      </TABLE>

	<!-- /FIM -->

