<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>

    <title>Azioni UniCredit, dati da Teleborsa.it</title>
  </head>
  <body>

    <h1 id="mydollars">Azioni UniCredit, dati da Teleborsa.it via Crawler
      <span style="color:red">{{ $nodeValues[0] }}</span>
    </h1>


    <!-- Optional JavaScript -->
    <script type="text/javascript">
    $(document).ready(function() {
        console.log('ciao');
        setTimeout(getCrawler, 30000);
    });

    function getCrawler(){
        $.ajax({
        headers : {
           'csrftoken' : '{{ csrf_token() }}'
        },
        url: "{{ route('front.crawler') }}",
        type: "get", //send it through get method
        success: function(response) {
          $('#mydollars').html(response);
        },
        error: function(xhr) {
          console.log(xhr);
        }
      });

    }
    </script>
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->

    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
</html>
