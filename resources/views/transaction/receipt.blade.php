<style type="text/css">
    body{
        margin:0px;
        padding: 0px;
    }
    h3
    {
        font-size:small;
        color: black;
    }
    h4
    {
        font-style: bold;
        font-size: 30px;
        color: seagreen;
        text-shadow: 10px;
    }
    #info
    {
        color:seagreen;
        font-size: 20px;
    }
    .section1
    {
        width: 20%;
        float: left;
    }
    .section2
    {
        width: 60%;
        margin:20%;
        padding: 10px;
        align-content: center;
        border-left:solid seagreen 3px;
        border-bottom: solid seagreen 3px;
        border-radius:25px;
    }
    .section3
    {
        width: 20%;
        float: right;
    }
</style>
<div class="container">
     <hr> <br><hr> 
        <div class="section1"></div>
        <div class="section2">
            <div class="form-control" id="reciept">
                <div class="form-control flex-sm-row"> 
                    <h4 class="text-info">All In One | Bill Payment</h4>
                </div><br>
                <div class="form-control">
                <p>By : <b class="text-info" id="info">{{ $data['name']}}</b></p><hr>
                <p>To : <b class="text-info" id="info">{{ $data['to']}}</b></p><hr>
                <p>On : <b class="text-info" id="info">{{ $data['date']}}</b></p><hr>
                <p>Amount : <b class="text-info" id="info">{{ $data['amount']}}</b></p><hr>
                
                </div><br>
                <div class="form-control">
                    <p>Reciept No: <b class="text-info" id="info">{{ $data['receipt']}}</b></p><hr>
                </div>
                <div>
                    <p>Signature : ||#||###&&$@#</p>
                </div>
                <br>
            </div><br><hr><br> 
            <h3 class="text-info">Date : {{$data['now']}}</h3>
        </div>
        <div class="section3"></div> 
    
     
</div>
 