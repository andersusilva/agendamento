
		<form method="POST" action="veri_adm.php">
		<TABLE aling="center" WIDTH="326"  CELLPADDING="0" CELLSPACING="0" >
			<TR>
				<TD ALIGN="center" VALIGN="middle">
					<TABLE aling="center" CELLPADDING="0" WIDTH="100%" HEIGHT="100%" BACKGROUND="">
						<TR>
							<TD ALIGN="center" COLSPAN="0">
								<br>SEU LOGO<br><br>
								<B><font face="arial,verdana" size="3"><br>ADMINISTRA��O</font></B><br><br>
							</TD>
						</TR>
						<TR>
							<td ALIGN="center" VALIGN="middle">
								<table cellpadding=3 cellspacing=0 BACKGROUND="">
									<tr>
										<td>
											<B><FONT FACE="Arial,Helvetica,sans-serif" SIZE="-1"><?php echo $L_USUARIO; ?> </FONT></B>
										</td>
										<td>
											<input border="0" size="10" class="bordas" type="txt" name="matricula" STYLE="font-size: 9pt;" TABINDEX="1">
										</td>
									</tr>
									<tr>
										<td>
											<B><FONT FACE="Arial,Helvetica,sans-serif" SIZE="-1"><?php echo $L_SENHA; ?> </FONT></B>
										</td>
										<td>
											<input border="0" size="10" class="bordas" type="password" name="senha" STYLE="font-size: 9pt;" TABINDEX="1">
										</td>
									</tr>
								</table>
								<table width="190" cellpadding=0 cellspacing=0 BACKGROUND="">
									<tr>
										<td align="left">
											<A HREF="index.php" TABINDEX="2">
												 <IMG SRC="img/cancel.gif" ALIGN="left" WIDTH="22" HEIGHT="23" ALT="Cancelar" BORDER=0 hspace=10 vspace=4> 
											</A>
										</td>
										<td align="right">
											<INPUT TYPE=image src="img/enter.gif" WIDTH="26" HEIGHT="23" border=0 hspace=7 vspace=4 alt="Entrar &gt;&gt;&gt;" TABINDEX="1">
										</td>
									</tr>
								</table>
							</td>
						</tr>
					</table>
				</TD>
			</TR>
		</TABLE>
		</form>
