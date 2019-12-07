<!-- Essential javascripts for application to work-->
    <script src="js/jquery-3.2.1.min.js"></script>
    <script src="js/popper.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="js/plugins/chart.js"></script>
    <script type="text/javascript"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

<!--Script do modal-->
    <script type="text/javascript">
	  $('#exampleModal').on('show.bs.modal', function (event) {
	  		var button = $(event.relatedTarget) // Button that triggered the modal
			var recipient = button.data('whatever') // Extract info from data-* attributes
			var recipientjustificativa = button.data('whateverjustificativa')
			var recipientanexo = button.data('whateveranexo')
			var recipientstatus = button.data('whateverstatus')
			// If necessary, you could initiate an AJAX request here (and then do the updating in a callback).
			// Update the modal's content. We'll use jQuery here, but you could use a data binding library or other methods instead.
			var modal = $(this)
			modal.find('.modal-title').text('Editar solicitação ' + recipient)
			modal.find('#id').val(recipient)
			modal.find('#recipient-justificativa').val(recipientjustificativa)
			modal.find('#recipient-anexo').val(recipientanexo)
			modal.find('#recipient-status').val(recipientstatus)
		})
    </script>

    <script type="text/javascript">
    	$("[name='toggle']").click(function(){
		   var cont = $("[name='toggle']:checked").length;
		   $("#aplica").prop("disabled", cont ? false : true);
		});
    </script>