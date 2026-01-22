$('#userForm').submit(function(e){
    e.preventDefault();
    alert('here');

    $.ajax({
        url: "{{ route('login.submit') }}",
        type: "POST",
        data: $(this).serialize(),
        success: function(response){
            $('#msg').html('<div class="alert alert-success">User added!</div>');
            $('#userForm')[0].reset();
        },
        error: function(xhr){
            $('#msg').html('<div class="alert alert-danger">' + xhr.responseJSON.message + '</div>');
        }
    });
});