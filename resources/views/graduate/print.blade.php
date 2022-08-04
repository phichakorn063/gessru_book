<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
    <link rel="icon" href="{{ asset('/admin/dist/img/cover-ssru.jpg') }}">
    <title>Print</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Srisakdi:wght@700&display=swap');
    </style>
    <style>
        body {
            background: rgb(204, 204, 204);
            font-family: "CRU-Rajabhat",sans-serif;
        }

        /* 
        page {
            background: white;
            display: block;
            margin: 0 auto;
            margin-bottom: 0.5cm;
            box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
        }

        page[size="A4"] {
            width: 21cm;
            height: 29.7cm;
        } */

        .backg {
            height: 232px;
            width: 344px;
            background-image: url("/storage/{{$branch->background}}");
            background-size: 344px 232px;
        }

        @media print {

            body,
            page {
                background: white;
                display: block;
                margin: 0 auto;
                margin-bottom: 0.5cm;
                box-shadow: 0 0 0.5cm rgba(0, 0, 0, 0.5);
                -webkit-print-color-adjust: exact;

            }

            page[size="A4"] {
                width: 21cm;
                height: 29.7cm;
            }


        }
    </style>
</head>

<body>
    @foreach($pages as $num=>$page)
    <page size="A4">
        <div class="container-fluid">
            <div class="row">
                @foreach($graduates->skip(10*$page)->take(10) as $graduate)
                <div class="col-6">
                    <div class="card mt-5 backg ">
                        <div class="row">
                            <div class="col-8">
                            </div>
                            <div class="col-4">
                                <img class="text-center"  src="{{$graduate->photo}}" style="width: 87px; height: auto; margin-top: 75px;" alt="...">
                                <h6 class="text-center" style="font-size: 7pt; color:blue; margin-top: 9px;">{{$graduate->name}}</h6>
                                <h6 class="text-center" style="font-size: 7pt; color:blue;">{{$graduate->numberGraduate}}</h6>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
    </page>
    <p style="page-break-after: always;">&nbsp;</p>
    @endforeach
    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: jQuery and Bootstrap Bundle (includes Popper) -->
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-fQybjgWLrvvRgtW6bFlB7jaZrFsaBXjsOMm/tB9LTS58ONXgqbR9W8oWht/amnpF" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.min.js" integrity="sha384-VHvPCCyXqtD5DqJeNxl2dtTyhF78xXNXdkwX1CZeRusQfRKp+tA7hAShOK/B/fQ2" crossorigin="anonymous"></script>
    -->
</body>
<script>
    $(function() {
        window.focus();
        window.print();
    });
</script>

</html>