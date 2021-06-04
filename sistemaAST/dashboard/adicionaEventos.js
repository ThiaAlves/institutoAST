$('#button').click(function(){
    var textAdd = $('#inpudAdd').val();
    $('#inpudAdd').val('').focus();
    $('.boxLista').append('<br><div class="item container" style="border:solid 1px #000;"><br>' + '- ' + textAdd + '</div><br>');
});


$(document).on('click', '.item', function(){
    $(this).remove();
});