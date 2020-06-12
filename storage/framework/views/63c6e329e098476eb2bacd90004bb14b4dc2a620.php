<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Ajax Autocomplete textbox in Laravel using JQuery</title>

    <script
  src="https://code.jquery.com/jquery-3.5.1.js"
  integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
  crossorigin="anonymous"></script>


    
    
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>
    <style type="text/css">
        .box{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>

    <br>
    <div class="container box">
        <h3 align="center">Ajax Autocomplete Textbox in Laravel using JQuery</h3>

        <div class="form-group">
            <input type="text" name="name" id="name" class="form-control input-lg" placeholder="Enter Game Name" />
            <div id="countryList" style="position: absolute"></div>
        </div>
        <?php echo e(csrf_field()); ?>

    </div>

    <div >
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
        hola
    </div>
    
</body>
</html>


<script>
    $(document).ready(function(){

        $('#name').keyup(function(){
            var query = $(this).val();
            if(query != '')
            {
                var _token = $('input[name="_token"]').val();

                $.ajax({
                    url:"<?php echo e(route('prueba.fetch')); ?>",
                    method:"POST",
                    data:{query:query, _token:_token},
                    success:function(data)
                    {
                        $('#countryList').fadeIn();
                        $('#countryList').html(data);
                        
                    }
                })
            }
        });


        $(document).on('click', 'li', function(){
            $('#name').val($(this).text());
            $('#countryList').fadeOut();
        });

    });
</script><?php /**PATH C:\xampp\htdocs\PlayGaming\resources\views/prueba.blade.php ENDPATH**/ ?>