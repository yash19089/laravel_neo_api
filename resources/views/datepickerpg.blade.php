{{-- @extends('master') --}}
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}} ">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">

    <title>Document</title>
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="mt-5">


                <h3>Select Dates To Get Astroid By Date</h3>

                <br><br>

                <form method="post" action="/collectdate">
                    {{-- <form action="{{route('collectdate')}}" method="post"> --}}
                    {{ csrf_field() }}

                    FromDate <input type="text" class=" ml-3" name="fromDate" id="fromDate">
                    Todate <input type="text" class=" ml-3" name="toDate" id="toDate">
                    {{-- <input type="button" value="filter" name="filter" id="filter" class="ml-3 btn btn-info" /> --}}
                    <input type="submit" value="filter" name="filter" id="filter">
                </form>
            </div>
        </div>





    </div>
    <script src="{{asset('js/app.js')}} "></script>
    <script src="//code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>

    <script>
        $(document).ready(function() {
                $.datepicker.setDefaults({
                    dateFormat:'yy-mm-dd',
                    changeMonth: true,
                      changeYear: true,
                      yearRange: "2012:2020"
                });
                $("#fromDate").datepicker();
                $("#toDate").datepicker();
                $("#filter").click(function(){
                //var a=10; alert(a);
                // alert($("#fromDate").val());exit;
                var fromDate = $('#fromDate').val();
                // alert(from_date);exit;
                var toDate = $('#toDate').val();
                // alert(to_date);exit;
    
                    //alert("ok");exit;
                if(fromDate != '' && toDate != ''){
                    // alert("ok");exit;
                    $.ajax({
                        url: 'filter.php',
                        method: 'POST',
                        data: {fromDate:fromDate,toDate:toDate},
                        success:function(data)
                        {
                            //alert('ok');
                            $('#order_table').html(data);
                        }
                    
                    });
                    
                }else{
                    alert("Please Select Date");
                }
            });
        });
    </script>
</body>

</html>