<script type="text/javascript">
    window.onload = function() {

        //Checker si le bouton showEditForm est cliqué
        $("button[name=showEditForm]").click(function() {

            if($('form.editForm').length <= 0){
                $.ajax({
                    method: "GET",
                    url: "<?= URL_ROOT ?>/profile/edit",
                    dataType: "JSON"
                })
                    .done(function(response) {
                        $("div.editSection").append('<div class="editForm">' +
                            '<input type="text" value="' + response.firstname + '" placeholder="' + response.firstname + '" name="firstname">' +
                            '<input type="text" value="' + response.lastname + '" placeholder="' + response.lastname + '" name="lastname">' +
                            '<input type="email" value="' + response.email + '" placeholder="' + response.email + '" name="email">' +
                            '<button name="submitEditForm" type="submit">Editer mon profil</button>' +
                        '</div>');

                        $("button[name=submitEditForm]").click(function() {
                            $.ajax({
                                method: "POST",
                                url: "<?= URL_ROOT ?>/profile/edit",
                                dataType: "JSON",
                                data: { firstname: $('input[name=firstname]').val(), lastname: $('input[name=lastname]').val(), email: $('input[name=email]').val() }
                            })
                                .done(function(response) {
                                    $("h1.profileFirstName").html($('input[name=firstname]').val())
                                    $("h1.profileLastName").html($('input[name=lastname]').val())
                                    $("h1.profileEmail").html($('input[name=email]').val())
                                })
                        })
                    });

            } else {
                $('form.editForm').remove();
            }

        })



    };
</script>