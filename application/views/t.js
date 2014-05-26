$(document).ready(function() {
    $('#fetchisbn').click(function() {
        if ($('#isbn').val().length == 10 || $('#isbn').val().length == 13) {
            $.ajax({
                url: "<?=base_url('index.php/ajax/isbn')?>"+'/'+$('#isbn').val(),
                type: 'get',
                error: function(XMLHttpRequest, textStatus, errorThrown) {
                    alert('status:' + XMLHttpRequest.status + ', status text: ' + XMLHttpRequest.statusText);
                    $('#fetchisbn').attr('display','none');
                    $('#errorisbn').attr('display','block');
                },
                success: function(data) {
                    console.log(data);
                    data = JSON.parse(data);
                    if (data['msg'] == 'book_not_found') {
                      alert('book not found');
                    } else {
                      bookname = data['title'];
                      author = data['author'];
                      press = data['publisher'];
                      $('#name').val(bookname);
                      $('#authors').val(author);
                      $('#press').val(press);
                      $('#info').removeAttr('style');
                    }
                }
            });
        }
    });
});
