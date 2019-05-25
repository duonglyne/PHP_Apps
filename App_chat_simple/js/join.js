
// send data
function Join(){
    // data in form
    $username = $('#username').val();
    $password = $('#password').val();
    // send data with ajax
    console.log($username);
    console.log($password);
    $.ajax({
        url: 'join.php',
        type: 'post',
        data: {
            username: $username,
            password: $password
        }, success : function(result){
            $('#formJoin .btn-submit').html('Start');
            $('#formJoin .alert').html(result);
        }
    });

}
// event click form

$('#formJoin .btn-submit').click(function () {
    $(this).html('Loading...');
    Join();
});