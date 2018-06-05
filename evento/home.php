<?php
include_once 'conexao.php';
$result_events = 'SELECT id, title, color, start, end FROM events';
$resultado_events = mysqli_query($conn, $result_events);
?>
<!DOCTYPE html>
<html lang="pt-br">
	<head>
		<meta charset='utf-8' />
			<link href='css/fullcalendar.min.css' rel='stylesheet' />
			<link href='css/fullcalendar.print.min.css' rel='stylesheet' media='print' />
			<link href='css/personalizado.css' rel='stylesheet' />
			<script src='js/moment.min.js'></script>
			<script src='js/jquery.min.js'></script>
			<script src='js/fullcalendar.min.js'></script>
			<script src='locale/pt-br.js'></script>
            <link href='css/bootstrap.min.css' rel='stylesheet'>
            <script src='js/personalizado.js'></script>
            <script src='js/bootstrap.min.js'></script>
            <!--<script src="js/jquery-3.3.1.slim.min.js">Defeito</script>-->
            <script src="js/popper.min.js"></script>
		<script>
			$(document).ready(function() {
				$('#calendar').fullCalendar({
					header: {
						left: 'prev,next today',
						center: 'title',
						right: 'month,agendaWeek,agendaDay'
					},
					defaultDate: Date(),
					navLinks: true, // can click day/week names to navigate views
					editable: true,
					eventLimit: true, // allow "more" link when too many events
					events: [
						<?php
                            while ($row_events = mysqli_fetch_array($resultado_events)) {
                                ?>
								{
								id: '<?php echo $row_events['id']; ?>',
								title: '<?php echo $row_events['title']; ?>',
								start: '<?php echo $row_events['start']; ?>',
								end: '<?php echo $row_events['end']; ?>',
								color: '<?php echo $row_events['color']; ?>',
								},<?php
                            }
                        ?>
					]
				});
			});
		</script>
	</head>
	<body>

		<div id='calendar'></div>

	</body>
</html>
