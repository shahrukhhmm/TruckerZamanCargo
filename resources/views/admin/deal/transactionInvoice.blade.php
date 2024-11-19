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
            font-size: 13px;
            color: #000000;
        }

        .ft14 {
            font-size: 14px;
            color: #000000;
        }

        .ft15 {
            font-size: 15px;
            /* line-height: 12px; */
            color: #000000;
        }

        .ft25 {
            font-size: 23px;
            /* line-height: 12px; */
            color: #000000;
        }

        .page {
            width: 794px;
            height: 1123px;
            margin: 0 auto;
            background: white;
            position: relative;
        }

        table {
            border-collapse: collapse;
        }

        th {
            color: #ff0000;
            padding: 5px;
            font-size: 16px
        }
        td{
            padding: 5px;
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

        {{-- <h3 style="color: gray; position: absolute; top:40px;left:20px;">Rwp. No.</h3>
        <h4 style="color: gray; position: absolute; top:70px;left:20px;">0313-5749668</h4>
        <h4 style="color: gray; position: absolute; top:95px;left:20px;">0313-5749668</h4> --}}


        <p class="ft15" style="position: absolute; top:35px;left: 10px;font-size:18px">
            <b style="letter-spacing: 1px; color:rgb(0, 0, 0)">CONTACTS</b>
        </p>
        <p class="ft15" style="position: absolute; top:60px;left: 10px;font-size:15px">
            Office Contact: <br><b style="letter-spacing: 1px; color:red">0335-3333057</b>
        </p>
        <p class="ft15" style="position: absolute; top:100px;left: 10px;font-size:15px">
            Waheed Zaman: <br><b style="letter-spacing: 1px;color:red">0300 9834028</b>
        </p>

        <div style="position: absolute; top:25px;left:35%; width:120px">
            <img src="{{asset('/images/logo/logo.png')}}" alt="Not Found" width="100%">
        </div>
        <div style="position: absolute; top:50px;left:49%;font-weight:bold;font-size:28px; color: red">
            ZAMAN CARGO
        </div>
        <div style="position: absolute; top:85px;left:49%;font-weight:bold;font-size:28px">
           ( زمان کارگو
           )</div>


        <div style="position: absolute; top:40px;right:20px; width:80px">
            <img src="{{asset('/images/logo/pakChina.jfif')}}" alt="Not Found" width="100%">
        </div>



        {{-- <h3 style="color: gray; position: absolute; top:50px;right:20px;">Contact No.</h3>
        <h4 style="color: gray; position: absolute; top:80px;right:20px;">008613065935989</h4>
        <h4 style="color: gray; position: absolute; top:100px;right:20px;">0313-5749668</h4> --}}


        <div style="position: absolute; top: 145px; left: 0px;right: 0; border-bottom: .5px solid rgb(178, 178, 178);">

            <!-- <hr> -->
        </div>



        <p class="ft13 arabic-text" style=" position: absolute; top:180px;left:30px;">Date: {{@$deal->date}} </p>

        <p class="ft13 arabic-text" style=" position: absolute; top:200px;left:30px;">Customer Name : {{@$deal->customer->name}}</p>





        <table class="ft13" style="position: absolute; top:240px;right: 30px; left: 30px; border: 2px solid black; width: 94%;" border="2px solid black">

            <tr>


                <th>
                    Item Name
                </th>
                <th>
                    Amount
                </th>
                <th>
                    Date
                </th>

            </tr>



            @foreach ($trans as $t)

                <tr>

                    <td>
                        {{@$t->deal->item_name}}
                    </td>

                    <td>
                        {{@$t->amount}}
                    </td>
                    <td>
                        {{@$t->date}}
                    </td>

                </tr>
            @endforeach

        </table>



        <p style="position: absolute; bottom: 305px; right: 50px; font-weight: bold; font-size: 17px;color: red" dir="rtl">
            نوٹ:
          </p>



        <p style="position: absolute; bottom: 270px; right: 50px; font-weight: bold; font-size: 15px" dir="rtl">
            * تمام کسٹمر کو مطلع کیا جاتا ہے کہ جو مال بھی چائینہ میں لوڈ ہوگا اور اگر اس کے بعد FBR کسٹم میں نیا رولنگ یا ڈیوٹی جاری ہوا تو کمپنی کسٹمر کو نیو ڈیوٹی کے مطابق دوسری بلٹی دیں گے اور پہلا ریٹ ختم تصور ہوگا۔
        </p>

        <p style="position: absolute; bottom: 240px; right: 50px; font-size: 13px" dir="rtl">
            * کسٹمر کو چاہئے کہ مال وصول کرتے وقت اچھی طرح چیک کریں ورنہ بعد میں کوئی شکایت نہیں سنی جائے گی۔
        </p>

        <p style="position: absolute; bottom: 223px; right: 50px; font-size: 13px" dir="rtl">
            * کسٹمر کو چاہئیے کہ اپنا لے جانے سے پہلے گودام میں مال کو پورا کریں، بعد میں مال کی کمی پیشی کی شکایت قبول نہیں ہوگی۔
        </p>

        <p style="position: absolute; bottom: 188px; right: 50px; font-size: 13px" dir="rtl">
            * مثلا جہاز ڈوب جانا، آگ لگ جانا، روڈ پر ایکسڈنٹ ہونا یا بارش سے مال خراب ہونے کی کمپنی کی کسی قسم کی ذمہ داری نہیں ہوگی۔

            قدرتی حادثات، چائینہ کسٹم میں مال کی ضبطگی، راستہ بند ہونے یا کسٹم کلئیر لیٹ ہونے کی صورت میں کمپنی ذمہ دار نہ ہوگی۔
        </p>

        <p style="position: absolute; bottom: 170px; right: 50px; font-size: 13px" dir="rtl">
            * مال کی غلط تفصیل لکھوانے کی صورت میں نقصان کی ذمہ داری کسٹمر پر عائد ہوگی۔
        </p>

        <p style="position: absolute; bottom: 150px; right: 50px; font-size: 13px" dir="rtl">
            * چائینہ حدود میں بین یا برانڈ مال اور کسی قسم کا نقصان یا تاخیر کی کمپنی ذمہ دار نہ ہوگی۔
        </p>

        <p style="position: absolute; bottom: 130px; right: 50px; font-size: 13px" dir="rtl">
            * کسٹم میں برانڈ مال ضبط ہونے کی صورت میں کسٹمر کو کرایہ پورا ادا کرنا ہوگا۔
        </p>

        <p style="position: absolute; bottom: 110px; right: 50px; font-size: 13px" dir="rtl">
            * مائع اشیاء مثلا مربہ جات، گلیوو وغیرہ بہنے یا لیک ہونے کی صورت میں کمپنی کسی قسم کے نقصان کی ذمہ دار نہ ہوگی۔
        </p>



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
    </div>

</body>

</html>
