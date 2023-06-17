<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/js/bootstrap-multiselect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-multiselect/0.9.13/css/bootstrap-multiselect.css">
</script>
</head>
<body>


<div class="container-fluid"style="text-align: center;margin-bottom:200px;">
<h1>Demo Multiselect Box In PHP</h1>
<div class="row">
<div class="col-md-12" >

<form id="myForm" method="POST">
<input name="current_select_values" type="hidden" value="" id="current_select_values">
<div class="col-md-12" >
 <select size="5" name="current_select[]" multiple="multiple" id="current_select">
 <option value="current1">current1</option>
 <option value="current2">current2</option>
 <option value="current3">current3</option>
 <option value="current4">current4</option>
 <option value="current5">current5</option>
 </select>
 </div><div class="col-md-12" style="margin-top:20px;" >
 <input type="submit" value="Submit" ></div>
</form></div></div></div>


<?php print_r ($_POST['current_select']); ?>


<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-49752503-1"></script>
 <script>
        $(document).ready(function() {       
          $('#current_select').multiselect({		
            nonSelectedText: 'Select Current'				
          });
        });

        $(function () {

        
        $('#current_select').multiselect({ 
        buttonText: function(options, select) {
        var labels = [];
        console.log(options);
        options.each(function() {
        labels.push($(this).val());
        });
        $("#current_select_values").val(labels.join(',') + '');
        return labels.join(', ') + '';
        //}
        }
        
        });
        });
</script>

</body>
</html>
