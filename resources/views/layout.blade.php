
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Starter Template for Bootstrap</title>

    {!! Html::style('css/app.css') !!}

    <!-- Bootstrap core CSS -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.min.css" rel="stylesheet" />


    <!-- Custom styles for this template -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <style>
        body {
            margin-top: 60px;
        }
    </style>
    @yield('styles')
</head>

<body>

<nav class="navbar navbar-inverse navbar-fixed-top">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">Cars</a>
        </div>
        <div id="navbar" class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
                <li class="active"><a href="{{ route('features') }}">Features</a></li>
                <li><a href="{{ route('selects') }}">Selects</a></li>
                <li><a href="{{ route('autocomplete') }}">AutoComplete(Api)</a></li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>
</nav>

<div class="container">

    @yield('content')


</div><!-- /.container -->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
{!! Html::script('js/app.js') !!}
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $('#search select').select2();
        $.fn.populateSelect = function (values) {
            var options = '';
            $.each(values, function (key,row) {
                options += '<option value ="'+ row.value +'">'+ row.text +'</option>';
            });
            $(this).html(options);
        }
        $('#make_id').change(function () {
            $('#model_id').empty().change();

            var make_id = $(this).val();

            if (make_id == '') {
                $('#makeyear_id').empty().change();
            } else {
                $.getJSON('/makeyears/'+make_id, null, function(values) {
                    $('#makeyear_id').populateSelect(values);
                });
            }
        });

        $('#makeyear_id').change(function() {
            var year = $(this).val();

            if (year == ''){
                $('#model_id').empty().change();
            } else {
                $.getJSON('/models/'+year, null, function(values) {
                   $('#model_id').populateSelect(values);
                });
            }
        })

    });
</script>
@yield('scripts')
</body>
</html>
