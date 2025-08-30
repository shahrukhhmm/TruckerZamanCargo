<!DOCTYPE html>
<html lang="en">
<meta charset="UTF-8">

<head>
    <title></title>

    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />



    <style type="text/css">
        /* @font-face {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 400;
            src: url('/Lato/Lato-Regular.ttf') format('truetype');
        }

        @font-face {
            font-family: 'Lato';
            font-style: normal;
            font-weight: 700;
            src: url('/Lato/Lato-Bold.ttf') format('truetype');
        } */


        * {
            font-family: 'Gill Sans', 'Gill Sans MT', Calibri, 'Trebuchet MS', sans-serif;
            /* font-family: 'Lato'; */
            letter-spacing: .8px;
            margin: 0;
            padding: 0;
            font-family: 'DejaVu Sans', sans-serif;
        }

        p {
            margin: 0;
            padding: 0;
        }
        .bold{
            font-weight: bold;
        }

        .ft10 {
            font-size: 10px;
            color: #000000;
        }

        .ft11 {
            font-size: 11px;
            color: #000000;
        }

        .ft12 {
            font-size: 12px;
            color: #000000;
        }

        .ft13 {
            font-size: 16px;
            color: #000000;
        }

        .ft14 {
            font-size: 14px;
            color: #000000;
        }

        .ft15 {
            font-size: 16px;
            /* line-height: 12px; */
            color: #000000;
        }

        .ft25 {
            font-size: 23px;
            /* line-height: 12px; */
            color: #000000;
        }

        .page {
            width:794px ;
            /* height: 100%; */
            margin: 0 auto;
            background: white;
            position: relative;
        }

        table {
            border-collapse: collapse;
        }

        th {
            color: #ffbb00;
            padding: 5px;
            font-size: 16px
        }
        td{
            padding: 5px;
            text-align: center;
        }

    </style>

</head>

<body bgcolor="white" style="height: 100vh" vlink="blue" link="blue" >

    <div class="page" style="background-image: linear-gradient(
    rgba(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)),url('{{asset("images/logo/logo.png")}}'); background-position:center ;background-repeat:no-repeat;background-size:400px">
       <p class="ft15" style="position: absolute; top:33px;left: 10px;font-size:14px">
        Office Contact: <b style="letter-spacing: 2px; color:#ffbb00">0335-3333057</b>
    </p>
    <p class="ft15" style="position: absolute; top:48px;left: 10px;font-size:14px">
        Waheed Zaman: <b style="letter-spacing: 2px;color:#ffbb00">0300 9834028</b>
    </p>
    <p class="ft15" style="position: absolute; top:64px;left: 10px;font-size:14px">
        Sher Zaman: <b style="letter-spacing: 2px;color:#ffbb00">0315 3333057</b>
    </p>
    <p class="ft15" style="position: absolute; top:80px;left: 10px;font-size:14px">
        Ptcl Number: <b style="letter-spacing: 2px;color:#ffbb00">0515534910</b>
    </p>


    <div style="position: absolute; top:25px;left:39%; width:80px">
        <img src="{{asset('/images/logo/logo.png')}}" alt="Not Found" width="100%">
    </div>
    <div style="position: absolute; top:40px;left:49%;font-weight:bold;font-size:20px; color: red">
        ZAMAN CARGO
    </div>
    <div style="position: absolute; top:63px;left:49%;font-weight:bold;font-size:20px">
    ( زمان کارگو
    )</div>


    <div style="position: absolute; top:30px;right:20px; width:70px">
        <img src="{{asset('/images/logo/pakChina.jfif')}}" alt="Not Found" width="100%">
    </div>



    <div style="position: absolute; top: 105px; left: 0px;right: 0; border-bottom: .5px solid rgb(178, 178, 178);">

        <!-- <hr> -->
    </div>

    <p class="ft13 arabic-text bold" style=" position: absolute; top:130px;left:30px;">Total Receivable : {{@$totalReceivable}}</p>
    <p class="ft13 arabic-text bold" style=" position: absolute; top:130px;right:30px;">Total Payable : {{@$totalPayable}}</p>

        <table class="ft13" style="position: absolute; top:150px;right: 30px; left: 30px; border: 2px solid black; width: 94%;" border="2px solid black">

            <tr>
                <th> Name</th>
                <th> Contact</th>
                <th>Total Paid</th>
                <th>Total Received</th>
                <th>Balance</th>

            </tr>



            @foreach ($balanceSheet as $t)

                <tr>

                    <td>
                        {{@$t['client']}}
                    </td>

                    <td>
                        {{@$t['phone']}}
                    </td>

                    <td>
                        {{@$t['total_paid']}}
                    </td>
                    <td>
                        - {{@$t['total_used']}}
                    </td>
                    <td>
                        {{@$t['balance']}}
                    </td>

                </tr>
            @endforeach

        </table>

    </div>
    {{-- <div class="footer" style="position: relative; width:794px ;margin:0 auto">


        <div style="position: absolute; bottom: 100px; left: 0px;right: 0; border-bottom: 2px solid rgb(178, 178, 178);">

            <!-- <hr> -->
        </div>


        <div style="position: absolute; bottom:3px;left:10px; width:90px">
            <img src="{{asset('/images/logo/whataspp qr zaman cargo.png')}}" alt="Not Found" width="100%">
        </div>




        <p class="ft15" style="position: absolute; bottom:52px;right: 27%;">
            فلور فورتھ پنڈی کاروان پلازہ اکبری مارکیٹ گنج منڈی راولپنڈی
        </p>
        <p class="ft15" style="position: absolute; bottom:30px;right: 18%;">
            4th floor, pindi karwan plaza, Akbari Market , Ganjmandi Rawalpindi.
        </p>


        <div style="position: absolute; bottom:3px;right:10px;width:90px">
            <img src="{{asset('/images/logo/wechat qr zaman cargo.png')}}" alt="Not Found" width="100%">
        </div>
    </div> --}}

</body>

</html>
