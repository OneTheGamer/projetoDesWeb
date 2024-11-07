$('#confirmModal').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget);
    var itemId = button.data('id');
    var modal = $(this);
    modal.find('#confirmarExcluir').attr('href', 'excluir.php?id=' + itemId);
});