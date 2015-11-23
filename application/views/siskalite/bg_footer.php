<hr/>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
            </div>
            <div class="col-md-6 text-right">
                <p>&copy; Copyright <?php echo date('Y'); ?> - DPD IMM Jawa Tengah. Oleh <a href="http://immsetengahabad.xyz">IMM Setengah Abad.</a></p>
            </div>
        </div>
    </div>
</footer>
<script type="text/javascript">
    $(function(){
        $(".showpassword").each(function(index,input) {
            var $input = $(input);
            $("<p class='opt'/>").append(
                $("<input type='checkbox' class='showpasswordcheckbox' id='showPassword' />").click(function() {
                    var change = $(this).is(":checked") ? "text" : "password";
                    var rep = $("<input placeholder='Password' type='" + change + "' />")
                        .attr("id", $input.attr("id"))
                        .attr("name", $input.attr("name"))
                        .attr('class', $input.attr('class'))
                        .val($input.val())
                        .insertBefore($input);
                    $input.remove();
                    $input = rep;
                })
            ).append($("<label for='showPassword'/>").text(" Tampilkan Password")).insertAfter($input.parent());
        });

        $('#showPassword').click(function(){
            if($("#showPassword").is(":checked")) {
                $('.fa-lock').addClass('fa-unlock');
                $('.fa-unlock').removeClass('fa-lock');
            } else {
                $('.fa-unlock').addClass('fa-lock');
                $('.icon-lock').removeClass('icon-unlock');
            }
        });
    });
</script>
<script type="text/javascript">
    document.getElementById("lebar").innerHTML = screen.width;
    document.getElementById("tinggi").innerHTML = screen.height;
</script>
</body>
</html>
