<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

    <title>Azioni Carrefour, dati da Teleborsa.it</title>
    <style>
        body {
            margin:0;
            padding:0;
            font-family:sans-serif;
            background:#fbfbfb;
        }
        .card {
            position:absolute;
            top:50%;
            left:50%;
            transform:translate(-50%,-50%);
            width:300px;
            min-height:400px;
            background:#fff;
            box-shadow:0 20px 50px rgba(0,0,0,.1);
            border-radius:10px;
            transition:0.5s;
        }
        .card:hover {
            box-shadow:0 30px 70px rgba(0,0,0,.2);
        }
        .card .box {
            position:absolute;
            top:50%;
            left:0;
            transform:translateY(-50%);
            text-align:center;
            padding:20px;
            box-sizing:border-box;
            width:100%;
        }
        .card .box .img {
            width:120px;
            height:120px;
            margin:0 auto;
            border-radius:50%;
            overflow:hidden;
        }
        .card .box .img img {
            width:100%;
            height:100%;
        }
        .card .box h2 {
            font-size:30px;
            color:#262626;
            margin:20px auto;
        }
        .card .box h2 span {
            font-size:20px;
            background:#e91e63;
            color:#fff;
            display:inline-block;
            padding:4px 10px;
            border-radius:15px;
        }
        .card .box p {
            font-size:18px;
            color:#262626;
        }
        .card .box span {
            display:inline-flex;
        }
        .card .box ul {
            margin:0;
            padding:0;
        }
        .card .box ul li {
            list-style:none;
            float:left;
        }
        .card .box ul li {
            display:block;
            color:#33CC00;
            margin:0 10px;
            font-size:20px;
            transition:0.5s;
            text-align:center;
        }

    </style>
  </head>
  <body>

    <div class="card">
    <div class="box">
        <div class="img">
            <img src="https://upload.wikimedia.org/wikipedia/en/1/12/Carrefour_logo_no_tag.svg">
        </div>
        @if(strpos($nodeValuesHeaderTop[0], "+") === 0)
          <h2 id="myStock">Azioni Carrefour<br><span style="background:green">{{ $nodeValuesHeaderTop[0] . "  " . $nodeValuesHeaderTop[1] }}</span></h2>
        @elseif(strpos($nodeValuesHeaderTop[0], "INV") === 0)
          <h2 id="myStock">Azioni Carrefour<br><span style="background:#cdcd00">{{ $nodeValuesHeaderTop[0] . "  " . $nodeValuesHeaderTop[1] }}</span></h2>
        @else
          <h2 id="myStock">Azioni Carrefour<br><span style="background:red">{{ $nodeValuesHeaderTop[0] . "  " . $nodeValuesHeaderTop[1] }}</span></h2>
        @endif
        <p> dati da <a href="https://www.teleborsa.it/azioni-estero/carrefour-pca-fr0000120172-MTkuUENB">Teleborsa.it</a> via DOM Crawler, no web service.</p>
        <p id="myStock"> {{$nodeValuesHeaderBottom[0]}}</p>
    </div>
    </div>

    <!-- Optional JavaScript -->
    <script type="text/javascript">

      $(document).ready(function() {
          console.log('updated');
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
            $('#myStock').html(response);
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
