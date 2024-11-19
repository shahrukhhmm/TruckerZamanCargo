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
            width:1123px ;
            /* height:794px ; */
            height:847px ;
            margin: 0 auto;
            background: white;
            position: relative;
        }

        table {
            border-collapse: collapse;
        }

        th {
            color: #ffbb00;
            padding: 3px 5px;
            font-size: 16px
        }
        td{
            padding: 3px 5px;
            text-align: center;
        }
        /* @font-face {
            font-family: "Amiri", serif;
            font-weight: 400;
            font-style: normal;
        } */

        /* .arabic-text {
            font-family: "Amiri", serif;
            font-weight: 400;
            font-style: normal;
        } */

    </style>

</head>

<body bgcolor="#A0A0A0" vlink="blue" link="blue" >

    <div class="page" style="background-image: linear-gradient(
    rgba(255, 255, 255, 0.9),rgba(255, 255, 255, 0.9)),url('{{asset("images/logo/logo.png")}}'); background-position:center ;background-repeat:no-repeat;background-size:400px">


        <p class="ft15" style="position: absolute; top:38px;left: 10px;font-size:18px">
            Office Contact: <b style="letter-spacing: 2px; color:#ffbb00">0335-3333057</b>
        </p>
        <p class="ft15" style="position: absolute; top:58px;left: 10px;font-size:18px">
            Waheed Zaman: <b style="letter-spacing: 2px;color:#ffbb00">0300 9834028</b>
        </p>
        <p class="ft15" style="position: absolute; top:75px;left: 10px;font-size:18px">
            Sher Zaman: <b style="letter-spacing: 2px;color:#ffbb00">0315 3333057</b>
        </p>
        <p class="ft15" style="position: absolute; top:95px;left: 10px;font-size:18px">
            Ptcl Number: <b style="letter-spacing: 2px;color:#ffbb00">0515534910</b>
        </p>

        <div style="position: absolute; top:25px;left:39%; width:120px">
            <img src="{{asset('/images/logo/logo.png')}}" alt="Not Found" width="100%">
        </div>
        <div style="position: absolute; top:50px;left:49%;font-weight:bold;font-size:28px; color: red">
            ZAMAN CARGO
        </div>
        <div style="position: absolute; top:85px;left:49%;font-weight:bold;font-size:28px">
           ( زمان کارگو
           )</div>


        <div style="position: absolute; top:30px;right:20px; width:100px">
            <img src="{{asset('/images/logo/pakChina.jfif')}}" alt="Not Found" width="100%">
        </div>



        {{-- <h3 style="color: gray; position: absolute; top:50px;right:20px;">Contact No.</h3>
        <h4 style="color: gray; position: absolute; top:80px;right:20px;">008613065935989</h4>
        <h4 style="color: gray; position: absolute; top:100px;right:20px;">0313-5749668</h4> --}}


        <div style="position: absolute; top: 138px; left: 0px;right: 0; border-bottom: .5px solid rgb(178, 178, 178);">

            <!-- <hr> -->
        </div>

        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:137px;left:30px;">Customer Name : {{@$deal->customer->name}}</p>

        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:155px;left:30px;">Customer Contact : {{@$deal->customer->contact}}</p>

        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:175px;left:30px;">Shipping mark : {{@$deal->shipping_mark}}</p>
        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:193px;left:30px;">Date of Loading: {{@$deal->date_of_loading}}</p>


        {{-- right --}}



        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:137px;right:30px;">Date : {{@$deal->date}}</p>

        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:155px;right:30px;">Container Number : {{@$deal->container_number}}</p>

        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:175px;right:30px;">Place: {{@$deal->customer->location}}</p>
        <p class="ft13 arabic-text bold" style=" position: absolute;font-size:18px; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; top:193px;right:30px;">Date of shipping: {{@$deal->date_of_shipping}}</p>



        <table class="ft13" style="position: absolute; top:218px;right: 30px; left: 30px; border: 2px solid black; width: 94%;" border="2px solid black">

            <tr>
                <th>
                    Item Name
                </th>
                <th>
                    CTN

                </th>
                <th>
                    PCS/CTN
                </th>
                <th>
                    Total PCS
                </th>
                <th>
                    Weight
                </th>
                <th>
                    Total Weight
                </th>
                <th>
                    CBM
                </th>
                <th>
                    Total CBM
                </th>
                <th>
                    Rate
                </th>
                <th>
                    Amount
                </th>

            </tr>


            @foreach ($dealsData as $index => $data)
                <tr>


                    <td>
                        {{@$data['item_name']}}
                    </td>

                    <td>
                        {{@$data['ctn']}}
                    </td>

                    <td>
                        {{@$data['quantity']}}
                    </td>

                    <td>
                        {{@$data['total_quantity']}}
                    </td>

                    <td>
                        {{@$data['weight']}}
                    </td>

                    <td>
                        {{@$data['total_weight']}}
                    </td>

                    <td>
                        {{@$data['cbm']}}
                    </td>

                    <td>
                        {{@$data['total_cbm']}}
                    </td>

                    <td>
                        {{@$data['rate']}}
                    </td>

                    <td>
                        {{@$data['amount']}}
                    </td>
                </tr>
            @endforeach


            <tr>

                <th colspan="1"></th>
                <th colspan="1">{{ @$totalCtn }}</th>
                <th colspan="7">Total Amount</th>
                <th>{{@$deal->total_amount}}</th>
            </tr>

        </table>


        <p style="position: absolute; bottom: 245px; right: 50px; font-weight: bold; font-size: 18px;color: #ffbb00" dir="rtl">
            نوٹ:
          </p>



        <p style="position: absolute; bottom: 210px; right: 50px; font-weight: bold; font-size: 15px; color:red" dir="rtl">
            * تمام کسٹمر کو مطلع کیا جاتا ہے کہ جو مال بھی چائینہ میں لوڈ ہوگا اور اگر اس کے بعد FBR کسٹم میں نیا رولنگ یا ڈیوٹی جاری ہوا تو کمپنی کسٹمر کو نیو ڈیوٹی کے مطابق دوسری بلٹی دیں گے اور پہلا ریٹ ختم تصور ہوگا۔
        </p>

        <p style="position: absolute; bottom:195px; right: 50px; font-size: 13px" dir="rtl">
            * کسٹمر کو چاہئے کہ مال وصول کرتے وقت اچھی طرح چیک کریں ورنہ بعد میں کوئی شکایت نہیں سنی جائے گی۔
        </p>

        <p style="position: absolute; bottom: 182px; right: 50px; font-size: 13px" dir="rtl">
            * کسٹمر کو چاہئیے کہ اپنا لے جانے سے پہلے گودام میں مال کو پورا کریں، بعد میں مال کی کمی پیشی کی شکایت قبول نہیں ہوگی۔
        </p>

        <p style="position: absolute; bottom: 150px; right: 50px; font-size: 13px" dir="rtl">
            * مثلا جہاز ڈوب جانا، آگ لگ جانا، روڈ پر ایکسڈنٹ ہونا یا بارش سے مال خراب ہونے کی کمپنی کی کسی قسم کی ذمہ داری نہیں ہوگی۔

            قدرتی حادثات، چائینہ کسٹم میں مال کی ضبطگی، راستہ بند ہونے یا کسٹم کلئیر لیٹ ہونے کی صورت میں کمپنی ذمہ دار نہ ہوگی۔
        </p>

        <p style="position: absolute; bottom: 135px; right: 50px; font-size: 13px" dir="rtl">
            * مال کی غلط تفصیل لکھوانے کی صورت میں نقصان کی ذمہ داری کسٹمر پر عائد ہوگی۔
        </p>

        <p style="position: absolute; bottom: 120px; right: 50px; font-size: 13px" dir="rtl">
            * چائینہ حدود میں بین یا برانڈ مال اور کسی قسم کا نقصان یا تاخیر کی کمپنی ذمہ دار نہ ہوگی۔
        </p>

        <p style="position: absolute; bottom: 105px; right: 50px; font-size: 13px" dir="rtl">
            * کسٹم میں برانڈ مال ضبط ہونے کی صورت میں کسٹمر کو کرایہ پورا ادا کرنا ہوگا۔
        </p>

        <p style="position: absolute; bottom: 90px; right: 50px; font-size: 13px" dir="rtl">
            * مائع اشیاء مثلا مربہ جات، گلیوو وغیرہ بہنے یا لیک ہونے کی صورت میں کمپنی کسی قسم کے نقصان کی ذمہ دار نہ ہوگی۔
        </p>


        <div style="position: absolute; bottom:90px;left:30px; width:100px; border-bottom:2px solid black;">
            <img src="{{asset('/images/logo/signature_zaman.png')}}" alt="Not Found" width="100%">
        </div>


        <div style="position: absolute; bottom: 85px; left: 0px;right: 0; border-bottom: 2px solid rgb(178, 178, 178);">

            <!-- <hr> -->
        </div>


        <div style="position: absolute; bottom:3px;left:10px; width:75px">
            <img src="{{asset('/images/logo/whataspp qr zaman cargo.png')}}" alt="Not Found" width="100%">
        </div>




        <p class="ft15" style="position: absolute; bottom:40px;right: 31%;">
            فورتھ فلور  پنڈی کاروان پلازہ اکبری مارکیٹ گنج منڈی راولپنڈی
        </p>
        <p class="ft15" style="position: absolute; bottom:20px;right: 25%;">
            4th floor, pindi karwan plaza, Akbari Market , Ganjmandi Rawalpindi.
        </p>


        <div style="position: absolute; bottom:3px;right:10px;width:75px">
            <img src="{{asset('/images/logo/wechat qr zaman cargo.png')}}" alt="Not Found" width="100%">
        </div>
    </div>

</body>

</html>
