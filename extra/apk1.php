    <!-- Bootstrap Core CSS -->
    <link href="../css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="../css/blog-home.css" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>

<!-- <body>
<div class="container">
    <h1>Click Game</h1>
    <div class="well">
        <input class="form" type="number" name="number" id="number">
        <button class="btn btn-primary" >Get</button>
    </div>
    <div class="container">
        <table class="table-bordered" id="table">
            <tbody class="tbody">
                <tr>

                </tr>
            </tbody>
        </table>
    </div>
</div>

</body>
<script>
    $(document).on('click','.btn-primary',(e) => {
        let n = $("#number").val();
        let row = $("tr");
        for(let i = 0 ; i<n ; i++){
            row.append("<td> <button>change</button></td>");
        }
        let tbody = $("tbody");
        let clonetr = row.clone();
        for(let j = 0 ; j<n ; j++){
            tbody.append(clonetr);
        }
        // console.log(clonetr.html());
    });
</script> -->
<body>
    <div class="container">
        <h1 style="position: relative;margin-top: 0px;margin-left: 500px;">Click Game</h1>
        <div class="well">
            <center>
            <input class="form bordered-primary" type="number" name="number" id="number">
            <button class="btn-primary">Get</button>
            <br><br><br>
            <table class="table-bordered" id="table">
                <tbody class="tbody">
                </tbody>
            </table>
            </center>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            $('.btn-primary').click(function(e) {
                e.preventDefault();
                let n = $("#number").val();
                let tbody = $(".tbody");
                tbody.empty();
                for (let i = 0; i < n; i++) {
                    let row = $("<tr>");
                    for (let j = 0; j < n; j++) {
                        row.append("<td><button class='btn btn-secondary' style='width: 100px;height: 50px;margin: auto;background-color:'></button></td>");
                    }
                    tbody.append(row);
                }
            });
            $(document).on("click",".btn-secondary",function(e) {
                e.preventDefault();
                $(".btn-secondary").css("background-color", "");
                $(this).css("background-color", "coral");
            })
        });
    </script>
</body>
